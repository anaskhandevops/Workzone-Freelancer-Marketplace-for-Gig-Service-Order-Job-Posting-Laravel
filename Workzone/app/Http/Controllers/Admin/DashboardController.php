<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard(){

        $orders = Order::with('listing', 'seller', 'buyer')->latest()->take(10)->get();

        $active_orders = Order::with('listing', 'seller')->where(['approved_by_seller' => 'approved', 'order_status' => 'approved_by_seller'])->latest()->count();

        $complete_orders = Order::where(function ($query) {
            $query->where('order_status', 'complete_by_buyer')
                  ->orWhere('completed_by_buyer', 'complete');
        })->latest()->count();

        $cancel_orders = Order::where(function ($query) {
            $query->where('order_status', 'cancel_by_seller')
                  ->orWhere('order_status', 'cancel_by_buyer');
        })->latest()->count();

        $rejected_orders = Order::where(['approved_by_seller' => 'rejected'])->where('order_status' , '!=', 'cancel_by_buyer')->latest()->count();


        $lable = array();
        $data = array();
        $start = new Carbon('first day of this month');
        $last = new Carbon('last day of this month');
        $first_date = $start->format('Y-m-d');
        $last_date = $last->format('Y-m-d');
        $today = date('Y-m-d');
        $length = date('d')-$start->format('d');

        for($i=1; $i <= $length+1; $i++){

            $date = '';
            if($i == 1){
                $date = $first_date;
            }else{
                $date = $start->addDays(1)->format('Y-m-d');
            };

            $sum = Order::whereDate('created_at', $date)->sum('total_amount');
            $data[] = $sum;
            $lable[] = $i;

        }

        $data = json_encode($data);
        $lable = json_encode($lable);


        return view('admin.dashboard', [
            'lable' => $lable,
            'data' => $data,
            'active_orders' => $active_orders,
            'complete_orders' => $complete_orders,
            'cancel_orders' => $cancel_orders,
            'rejected_orders' => $rejected_orders,
            'orders' => $orders,
        ]);
    }
}
