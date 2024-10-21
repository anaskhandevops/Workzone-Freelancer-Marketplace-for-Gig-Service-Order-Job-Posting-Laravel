<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;

use App\Models\Review;
use App\Models\Wishlist;
use App\Helpers\MailHelper;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Modules\JobPost\Entities\JobPost;
use Modules\Listing\Entities\Listing;
use Auth, Str, Image, File, Hash, Mail;

use Modules\JobPost\Entities\JobRequest;
use Modules\LiveChat\App\Models\Message;
use Modules\GeneralSetting\Entities\EmailTemplate;
use Modules\GlobalSetting\App\Models\GlobalSetting;
use Modules\PaymentWithdraw\App\Models\SellerWithdraw;
use Modules\Subscription\Entities\SubscriptionHistory;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function user_list(){

        $users = User::where('status', 'enable')->where('is_seller', 0)->latest()->get();

        $title = trans('translate.Buyer List');

        return view('admin.user.user_list', ['users' => $users, 'title' => $title]);
    }

    public function pending_user(){

        $users = User::where('status', 'disable')->latest()->get();

        $title = trans('translate.Pending Buyer');

        return view('admin.user.user_list', ['users' => $users, 'title' => $title]);
    }

    public function user_show($id){

        $user = User::findOrFail($id);

        $total_job = JobPost::where('user_id', $user->id)->count();

        $total_hired = JobRequest::where('user_id', $user->id)->where('status', 'approved')->count();

        $total_order = Order::where('buyer_id', $user->id)->count();

        $success_order = Order::where('completed_by_buyer', 'complete')->where('buyer_id', $user->id)->count();


        $orders = Order::with('listing', 'seller')->where('buyer_id', $user->id)->latest()->get();

        return view('admin.user.user_show', [
            'user' => $user,
            'total_job' => $total_job,
            'total_hired' => $total_hired,
            'total_order' => $total_order,
            'success_order' => $success_order,
            'orders' => $orders,
        ]);

    }

    public function update(Request $request ,$id){

        $user = User::findOrFail($id);

        $rules = [
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required|max:220',
        ];
        $customMessages = [
            'name.required' => trans('translate.Name is required'),
            'phone.required' => trans('translate.Phone is required'),
            'address.required' => trans('translate.Address is required')
        ];
        $this->validate($request, $rules,$customMessages);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->designation = $request->designation;
        $user->status = $request->status ? 'enable' : 'disable';
        $user->is_top_seller = $request->is_top_seller ? 'enable' : 'disable';
        $user->save();

        $notify_message= trans('translate.User updated successful');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }

    public function user_destroy($id){

        $total_listing = Listing::where('seller_id', $id)->count();

        $total_jobpost = JobPost::where('user_id', $id)->count();

        if($total_listing > 0 || $total_jobpost > 0){
            $notify_message = trans('translate.You can not delete this user, multiple listing or jobpost available under this user');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('admin.user-list')->with($notify_message);
        }

        $user = User::find($id);
        $user_image = $user->image;

        if($user_image){
            if(File::exists(public_path().'/'.$user_image))unlink(public_path().'/'.$user_image);
        }

        Review::where('buyer_id',$id)->delete();
        Review::where('seller_id',$id)->delete();

        JobRequest::where('user_id',$id)->delete();
        JobRequest::where('seller_id',$id)->delete();

        $json_module_data = file_get_contents(base_path('modules_statuses.json'));
        $module_status = json_decode($json_module_data);

        if(isset($module_status->LiveChat) && $module_status->LiveChat){
            Message::where('seller_id',$id)->delete();
            Message::where('buyer_id',$id)->delete();
        }

        $user->delete();

        $notify_message = trans('translate.Delete Successfully');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.user-list')->with($notify_message);

    }

    public function user_status($id){
        $user = User::findOrFail($id);
        if($user->status == 'enable'){
            $user->status = 'disable';
            $user->save();
            $message = trans('translate.Status Changed Successfully');
        }else{
            $user->status = 'enable';
            $user->save();
            $message = trans('translate.Status Changed Successfully');
        }
        return response()->json($message);
    }


    public function seller_list(){

        $users = User::where('status', 'enable')->where('is_seller', 1)->latest()->get();

        $title = trans('translate.Seller List');

        return view('admin.seller.seller_list', ['users' => $users, 'title' => $title]);
    }

    public function pending_seller(){

        $users = User::where('status', 'disable')->where('is_seller', 1)->latest()->get();

        $title = trans('translate.Pending Seller');

        return view('admin.seller.seller_list', ['users' => $users, 'title' => $title]);
    }


    public function seller_show($id){

        $user = User::findOrFail($id);

        $total_hired = JobRequest::where('seller_id', $user->id)->where('status', 'approved')->count();

        $total_order = Order::where('seller_id', $user->id)->count();

        $success_order = Order::where('completed_by_buyer', 'complete')->where('seller_id', $user->id)->count();

        $orders = Order::with('listing', 'seller')->where('seller_id', $user->id)->latest()->get();

        $withdraw_list = SellerWithdraw::where('seller_id', $user->id)->get();

        $total_income = Order::where('seller_id', $user->id)->where('payment_status', 'success')->where('completed_by_buyer', 'complete')->sum('total_amount');

        $commission_type = GlobalSetting::where('key', 'commission_type')->value('value');
        $commission_per_sale = GlobalSetting::where('key', 'commission_per_sale')->value('value');

        $total_commission = 0.00;
        $net_income = $total_income;
        if($commission_type == 'commission'){
            $total_commission = ($commission_per_sale / 100) * $total_income;
            $net_income = $total_income - $total_commission;
        }

        $total_withdraw_amount = $withdraw_list->sum('total_amount');

        $current_balance = $net_income - $total_withdraw_amount;

        $pending_withdraw = SellerWithdraw::where('seller_id', $user->id)->where('status', 'pending')->sum('total_amount');
        
        return view('admin.seller.seller_show', [
            'user' => $user,
            'total_hired' => $total_hired,
            'total_order' => $total_order,
            'success_order' => $success_order,
            'orders' => $orders,
            'total_income' => $total_income,
            'total_commission' => $total_commission,
            'net_income' => $net_income,
            'current_balance' => $current_balance,
            'total_withdraw_amount' => $total_withdraw_amount,
            'pending_withdraw' => $pending_withdraw,
        ]);

    }

    public function user_feez($id){
        $user = User::findOrFail($id);

        if($user->feez_status == 1){
            $user->feez_status = 0;
            $user->save();
            if($user->is_seller == 1){
                Listing::where('seller_id', $id)->update(['status' => 'enable']);
            }
            $notify_message = trans('translate.Unfreeze This Profile Successfully');
        }else{
            $user->feez_status = 1;
            $user->save();
            if($user->is_seller == 1){
                Listing::where('seller_id', $id)->update(['status' => 'disable']);
            }

            $notify_message = trans('translate.Freeze This Profile Successfully');
        }
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }
}
