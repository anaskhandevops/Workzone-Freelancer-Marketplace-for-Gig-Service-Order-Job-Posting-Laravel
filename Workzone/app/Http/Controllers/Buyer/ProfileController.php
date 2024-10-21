<?php

namespace App\Http\Controllers\Buyer;

use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Auth, File, Image, Str, Hash;
use App\Http\Controllers\Controller;
use Modules\JobPost\Entities\JobPost;
use Modules\JobPost\Entities\JobRequest;
use Modules\LiveChat\App\Models\Message;
use App\Http\Requests\PasswordChangeRequest;
use Modules\Refund\App\Models\RefundRequest;
use App\Http\Requests\EditBuyerProfileRequest;
use Modules\JobPost\Entities\JobPostTranslation;

class ProfileController extends Controller
{
    public function dashboard(){

        $user = Auth::guard('web')->user();

        $orders = Order::with('listing', 'seller')->where('buyer_id', $user->id)->latest()->take(10)->get();

        $active_orders = Order::with('listing', 'seller')->where('buyer_id', $user->id)->where(['approved_by_seller' => 'approved', 'order_status' => 'approved_by_seller'])->latest()->count();

        $complete_orders = Order::where('buyer_id', $user->id)->where(function ($query) {
            $query->where('order_status', 'complete_by_buyer')
                  ->orWhere('completed_by_buyer', 'complete');
        })->latest()->count();

        $cancel_orders = Order::where('buyer_id', $user->id)->where(function ($query) {
            $query->where('order_status', 'cancel_by_seller')
                  ->orWhere('order_status', 'cancel_by_buyer');
        })->latest()->count();

        $rejected_orders = Order::where('buyer_id', $user->id)->where(['approved_by_seller' => 'rejected'])->where('order_status' , '!=', 'cancel_by_buyer')->latest()->count();



        return view('buyer.dashboard', [
            'active_orders' => $active_orders,
            'complete_orders' => $complete_orders,
            'cancel_orders' => $cancel_orders,
            'rejected_orders' => $rejected_orders,
            'orders' => $orders,
        ]);

    }

    public function edit_profile(){
        $user = Auth::guard('web')->user();

        return view('buyer.edit_profile', ['user' => $user]);
    }

    public function update_profile(EditBuyerProfileRequest $request){

        $user = Auth::guard('web')->user();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->designation = $request->designation;
        $user->address = $request->address;
        $user->about_me = $request->about_me;
        $user->language = $request->language;
        $user->gender = $request->gender;
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
        return view('buyer.change_password');
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

        $orders = Order::with('listing', 'seller')->where('buyer_id', $user->id)->latest()->get();

        $active_orders = Order::with('listing', 'seller')->where('buyer_id', $user->id)->where(['approved_by_seller' => 'approved', 'order_status' => 'approved_by_seller'])->latest()->get();

        $awaiting_orders = Order::where('buyer_id', $user->id)->where(['approved_by_seller' => 'pending'])->where('order_status' , '!=', 'cancel_by_buyer')->latest()->get();

        $rejected_orders = Order::where('buyer_id', $user->id)->where(['approved_by_seller' => 'rejected'])->where('order_status' , '!=', 'cancel_by_buyer')->latest()->get();

        $cancel_orders = Order::where('buyer_id', $user->id)->where(function ($query) {
            $query->where('order_status', 'cancel_by_seller')
                  ->orWhere('order_status', 'cancel_by_buyer');
        })->latest()->get();

        $complete_orders = Order::where('buyer_id', $user->id)->where(function ($query) {
            $query->where('order_status', 'complete_by_buyer')
                  ->orWhere('completed_by_buyer', 'complete');
        })->latest()->get();

        return view('buyer.orders', [
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

        $order = Order::with('listing')->where('buyer_id', $user->id)->where('order_id', $order_id)->first();

        $seller = User::findOrFail($order->seller_id);

        $total_job = JobRequest::where('seller_id', $seller->id)->where('status', 'approved')->count();

        $review_exist = Review::where(['buyer_id' => $user->id, 'order_id' => $order->id])->count();

        $refund_available = false;
        $refund = null;

        $json_module_data = file_get_contents(base_path('modules_statuses.json'));
        $module_status = json_decode($json_module_data);

        if(isset($module_status->Refund) && $module_status->Refund){
           $refund = RefundRequest::where('order_id', $order->id)->first();
           if($refund){
            $refund_available = true;
           }
           
        }

        return view('buyer.order_show', [
            'order' => $order,
            'seller' => $seller,
            'total_job' => $total_job,
            'review_exist' => $review_exist,
            'refund_available' => $refund_available,
            'refund' => $refund,
        ]);
    }


    public function order_complete(Request $request, $id){

        $user = Auth::guard('web')->user();

        $order = Order::where('buyer_id', $user->id)->where('id', $id)->first();
        $order->completed_by_buyer = 'complete';
        $order->order_status = 'complete_by_buyer';
        $order->save();

        $notify_message = trans('translate.Order complete successful');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    public function order_cancel(Request $request, $id){

        $user = Auth::guard('web')->user();

        $order = Order::where('buyer_id', $user->id)->where('id', $id)->first();
        $order->order_status = 'cancel_by_buyer';
        $order->save();

        $notify_message = trans('translate.Order cancel successful');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    public function store_review(Request $request, $order_id){
        $request->validate([
            'rating' => 'required',
            'review' => 'required'
        ], [
            'rating.required' => trans('translate.Rating is required'),
            'review.required' => trans('translate.Review is required'),
        ]);


        $user = Auth::guard('web')->user();
        $order = Order::where('buyer_id', $user->id)->where('id', $order_id)->first();

        $exist = Review::where(['buyer_id' => $user->id, 'order_id' => $order_id])->count();
        if($exist){
            $notify_message = trans('translate.Review already submited');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

        $review = new Review();
        $review->order_id = $order_id;
        $review->listing_id = $order->listing_id;
        $review->buyer_id = $order->buyer_id;
        $review->seller_id = $order->seller_id;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->status = 'disable';
        $review->save();

        $notify_message = trans('translate.Review submited successful, please wait for admin approval');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }




    public function account_delete(){
        return view('buyer.account_delete');
    }

    public function confirm_account_delete(){

        $user = Auth::guard('web')->user();

        $user_image = $user->image;

        if($user_image){
            if(File::exists(public_path().'/'.$user_image))unlink(public_path().'/'.$user_image);
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

        $job_posts = JobPost::with('translate','category')->where('user_id', $user->id)->latest()->get();

        foreach($job_posts as $job_post){
            $old_image = $job_post->thumb_image;

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }

            JobPostTranslation::where('job_post_id',$job_post->id)->delete();
            JobRequest::where('job_post_id',$job_post->id)->delete();

            $job_post->delete();
        }

        $user->delete();

        Auth::guard('web')->logout();

        $notify_message = trans('translate.Your account deleted successful');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('buyer.login')->with($notify_message);

    }



}
