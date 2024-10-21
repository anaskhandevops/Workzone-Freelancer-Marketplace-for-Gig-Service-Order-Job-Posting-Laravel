<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\JobPost\Entities\JobRequest;

class OrderController extends Controller
{
    public function index(){

        $orders = Order::with('listing', 'seller', 'buyer')->latest()->get();


        return view('admin.order_list', [
            'orders' => $orders
        ]);
    }


    public function active_orders(){

        $orders = Order::with('listing', 'seller', 'buyer')->where(['approved_by_seller' => 'approved', 'order_status' => 'approved_by_seller'])->latest()->get();

        return view('admin.order_list', [
            'orders' => $orders
        ]);
    }

    public function awaiting_orders(){

        $orders = Order::with('listing', 'seller', 'buyer')->where(['approved_by_seller' => 'pending'])->where('order_status' , '!=', 'cancel_by_buyer')->latest()->get();

        return view('admin.awaiting_orders', [
            'orders' => $orders
        ]);
    }

    public function reject_orders(){

        $orders = Order::with('listing', 'seller', 'buyer')->where(['approved_by_seller' => 'rejected'])->where('order_status' , '!=', 'cancel_by_buyer')->latest()->get();

        return view('admin.reject_orders', [
            'orders' => $orders
        ]);
    }

    public function cancel_orders(){

        $orders = Order::with('listing', 'seller', 'buyer')->where(function ($query) {
            $query->where('order_status', 'cancel_by_seller')
                  ->orWhere('order_status', 'cancel_by_buyer');
        })->latest()->get();

        return view('admin.cancel_orders', [
            'orders' => $orders
        ]);
    }

    public function complete_orders(){

        $orders = Order::with('listing', 'seller', 'buyer')->where(function ($query) {
            $query->where('order_status', 'complete_by_buyer')
                  ->orWhere('completed_by_buyer', 'complete');
        })->latest()->get();

        return view('admin.complete_orders', [
            'orders' => $orders
        ]);
    }

    public function pending_payment_orders(){

        $orders = Order::with('listing', 'seller', 'buyer')->where('payment_status', 'pending')->latest()->get();

        return view('admin.pending_payment_orders', [
            'orders' => $orders
        ]);
    }

    public function order_show($order_id){

        $order = Order::with('listing')->where('order_id', $order_id)->first();

        $seller = User::findOrFail($order->seller_id);

        $total_job = JobRequest::where('seller_id', $seller->id)->where('status', 'approved')->count();

        return view('admin.order_show', [
            'order' => $order,
            'seller' => $seller,
            'total_job' => $total_job,
        ]);
    }


    public function order_cancel(Request $request, $id){


        $order = Order::where('id', $id)->first();
        $order->order_status = 'cancel_by_buyer';
        $order->save();

        $notify_message = trans('translate.Order cancel successful');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    public function order_approved(Request $request, $id){

        $order = Order::where('id', $id)->first();
        $order->approved_by_seller = 'approved';
        $order->order_status = 'approved_by_seller';
        $order->save();

        $notify_message = trans('translate.Order approval successful');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }


    public function order_complete(Request $request, $id){

        $order = Order::where('id', $id)->first();
        $order->completed_by_buyer = 'complete';
        $order->order_status = 'complete_by_buyer';
        $order->save();

        $notify_message = trans('translate.Order complete successful');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    public function payment_approval(Request $request, $id){

        $order = Order::where('id', $id)->first();
        $order->payment_status = 'success';
        $order->save();

        $notify_message = trans('translate.Payment approval successful');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    public function order_delete(Request $request, $id){

        $order = Order::where('id', $id)->first();
        $order->delete();

        $notify_message = trans('translate.Order delete successful');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.orders')->with($notify_message);

    }


}
