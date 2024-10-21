<?php

namespace App\Http\Controllers\Seller;

use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Auth, File, Image, Str, Hash;
use App\Http\Controllers\Controller;
use Modules\Listing\Entities\Listing;
use Modules\JobPost\Entities\JobRequest;
use Modules\LiveChat\App\Models\Message;
use App\Http\Requests\PasswordChangeRequest;
use Modules\Listing\Entities\ListingGallery;
use App\Http\Requests\EditBuyerProfileRequest;
use Modules\Listing\App\Models\ListingPackage;
use Modules\Listing\Entities\ListingTranslation;

class ProfileController extends Controller
{
    public function dashboard(){

        $user = Auth::guard('web')->user();

        $orders = Order::with('listing', 'seller')->where('seller_id', $user->id)->latest()->take(10)->get();

        $active_orders = Order::with('listing', 'seller')->where('seller_id', $user->id)->where(['approved_by_seller' => 'approved', 'order_status' => 'approved_by_seller'])->latest()->count();

        $complete_orders = Order::where('seller_id', $user->id)->where(function ($query) {
            $query->where('order_status', 'complete_by_buyer')
                  ->orWhere('completed_by_buyer', 'complete');
        })->latest()->count();

        $cancel_orders = Order::where('seller_id', $user->id)->where(function ($query) {
            $query->where('order_status', 'cancel_by_seller')
                  ->orWhere('order_status', 'cancel_by_buyer');
        })->latest()->count();

        $rejected_orders = Order::where('seller_id', $user->id)->where(['approved_by_seller' => 'rejected'])->where('order_status' , '!=', 'cancel_by_buyer')->latest()->count();

        return view('seller.dashboard', [
            'active_orders' => $active_orders,
            'complete_orders' => $complete_orders,
            'cancel_orders' => $cancel_orders,
            'rejected_orders' => $rejected_orders,
            'orders' => $orders,
        ]);

    }

    public function edit_profile(){

        $user = Auth::guard('web')->user();

        return view('seller.edit_profile', ['user' => $user]);
    }

    public function update_profile(EditBuyerProfileRequest $request){

        $user = Auth::guard('web')->user();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->designation = $request->designation;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->language = $request->language;
        $user->university_name = $request->university_name;
        $user->university_location = $request->university_location;
        $user->university_time_period = $request->university_time_period;
        $user->school_name = $request->school_name;
        $user->school_location = $request->school_location;
        $user->school_time_period = $request->school_time_period;
        $user->about_me = $request->about_me;
        $user->skills = $request->skills;
        $user->hourly_payment = $request->hourly_payment ? $request->hourly_payment : 0.00;
        $user->save();

        if($request->file('image')){
            $old_image = $user->image;
            $user_image = $request->image;
            $extention = $user_image->getClientOriginalExtension();
            $image_name = Str::slug($user->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($user_image)->save(public_path().'/'.$image_name);
            $user->image = $image_name;
            $user->save();
            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    public function change_password(){
        return view('seller.change_password');
    }

    public function update_password(PasswordChangeRequest $request){

        $user = Auth::guard('web')->user();

        if(Hash::check($request->current_password, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();

            $notify_message = trans('translate.Password changed successfully');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
            return redirect()->back()->with($notify_message);

        }else{
            $notify_message = trans('translate.Current password does not match');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }


    }



    public function orders(){
        $user = Auth::guard('web')->user();

        $orders = Order::with('listing', 'seller')->where('seller_id', $user->id)->latest()->get();

        $active_orders = Order::where('seller_id', $user->id)->where(['approved_by_seller' => 'approved', 'order_status' => 'approved_by_seller'])->latest()->get();

        $awaiting_orders = Order::where('seller_id', $user->id)->where(['approved_by_seller' => 'pending'])->where('order_status' , '!=', 'cancel_by_buyer')->latest()->get();

        $rejected_orders = Order::where('seller_id', $user->id)->where(['approved_by_seller' => 'rejected'])->where('order_status' , '!=', 'cancel_by_buyer')->latest()->get();

        $cancel_orders = Order::where('seller_id', $user->id)->where(function ($query) {
            $query->where('order_status', 'cancel_by_seller')
                  ->orWhere('order_status', 'cancel_by_buyer');
        })->latest()->get();

        $complete_orders = Order::where('seller_id', $user->id)->where(function ($query) {
            $query->where('order_status', 'complete_by_buyer')
                  ->orWhere('completed_by_buyer', 'complete');
        })->latest()->get();

        return view('seller.orders', [
            'orders' => $orders,
            'active_orders' => $active_orders,
            'awaiting_orders' => $awaiting_orders,
            'rejected_orders' => $rejected_orders,
            'cancel_orders' => $cancel_orders,
            'complete_orders' => $complete_orders,
        ]);
    }

    public function order_show($order_id){
        $user = Auth::guard('web')->user();

        $order = Order::with('listing')->where('seller_id', $user->id)->where('order_id', $order_id)->first();

        $buyer = User::findOrFail($order->buyer_id);

        $buyer_total_rating = 1;

        $total_job = JobRequest::where('user_id', $buyer->id)->where('status', 'approved')->count();

        $total_orders = Order::where('buyer_id', $buyer->id)->latest()->count();

        return view('seller.order_show', [
            'order' => $order,
            'buyer' => $buyer,
            'total_orders' => $total_orders,
            'total_job' => $total_job,

        ]);
    }

    public function order_approved(Request $request, $id){

        $user = Auth::guard('web')->user();

        $order = Order::where('seller_id', $user->id)->where('id', $id)->first();
        $order->approved_by_seller = 'approved';
        $order->order_status = 'approved_by_seller';
        $order->save();

        $notify_message = trans('translate.Order approval successful');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }


    public function order_rejected(Request $request, $id){

        $user = Auth::guard('web')->user();

        $order = Order::where('seller_id', $user->id)->where('id', $id)->first();
        $order->approved_by_seller = 'rejected';
        $order->order_status = 'rejected_by_seller';
        $order->save();

        $notify_message = trans('translate.Order rejected successful');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    public function order_cancel(Request $request, $id){

        $user = Auth::guard('web')->user();

        $order = Order::where('seller_id', $user->id)->where('id', $id)->first();
        $order->order_status = 'cancel_by_seller';
        $order->save();

        $notify_message = trans('translate.Order cancel successful');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }






    public function account_delete(){
        return view('seller.account_delete');
    }


    public function confirm_account_delete(){

        $user = Auth::guard('web')->user();

        $user_image = $user->image;

        if($user_image){
            if(File::exists(public_path().'/'.$user_image))unlink(public_path().'/'.$user_image);
        }

        $listings = Listing::where('seller_id', $user->id)->latest()->get();

        foreach($listings as $listing){
            $old_image = $listing->thumb_image;

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }

            ListingTranslation::where('listing_id',$listing->id)->delete();
            Review::where('listing_id',$listing->id)->delete();
            ListingPackage::where('listing_id',$listing->id)->delete();

            $galleries = ListingGallery::where('listing_id', $listing->id)->get();
            foreach($galleries as $gallery){
                $old_image = $gallery->image;

                if($old_image){
                    if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
                }

                $gallery->delete();
            }

            $listing->delete();
        }

        Review::where('buyer_id',$user->id)->delete();
        Review::where('seller_id',$user->id)->delete();

        JobRequest::where('user_id',$user->id)->delete();
        JobRequest::where('seller_id',$user->id)->delete();

        Order::where('seller_id',$user->id)->delete();
        Order::where('buyer_id',$user->id)->delete();

        $json_module_data = file_get_contents(base_path('modules_statuses.json'));
        $module_status = json_decode($json_module_data);

        if(isset($module_status->LiveChat) && $module_status->LiveChat){
            Message::where('seller_id',$user->id)->delete();
            Message::where('buyer_id',$user->id)->delete();
        }


        $user->delete();

        Auth::guard('web')->logout();

        $notify_message = trans('translate.Your account deleted successful');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('buyer.login')->with($notify_message);

    }


    public function order_submission(Request $request, $id){
        $user = Auth::guard('web')->user();

        $order = Order::where('seller_id', $user->id)->where('id', $id)->first();

        if($request->file('submit_file')){

            $old_submit_file = $order->submit_file;

            $extention = $request->submit_file->getClientOriginalExtension();
            $file_name = 'order-submission-'.time().rand(999,9999).'.'.$extention;
            $destinationPath = public_path('uploads/custom-images/');
            $request->submit_file->move($destinationPath,$file_name);

            $order->submit_file = $file_name;

            if($old_submit_file){
                if(File::exists(public_path('uploads/custom-images/').$old_submit_file))unlink(public_path('uploads/custom-images/').$old_submit_file);
            }
        }

        $order->save();

        $notify_message = trans('translate.File submission successful');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }

    public function updateStatus(Request $request)
    {
        $user = Auth::guard('web')->user();
        $user->online_status = $request->online_status ? $request->online_status : 0;
        $user->save();

        return response()->json(['success' => true, 'status' => $user->online_status]);
    }




}
