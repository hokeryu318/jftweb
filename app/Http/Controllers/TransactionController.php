<?php

namespace App\Http\Controllers;

use App\Model\OrderDish;
use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\OrderPay;

class TransactionController extends Controller
{
    //
    public function index()
    {
        //bookings : order.status = booking;

        $sort = "asc";

        if(request()->has('search_date')) {//by date change
            $search_date = request()->search_date;
            if(request()->d_s == 'up') {
                $search_date = date('Y-m-d', strtotime(' +1 day', strtotime($search_date)));
            } else if(request()->d_s == 'down') {
                $search_date = date('Y-m-d', strtotime(' -1 day', strtotime($search_date)));
            }
            $search_date = date('Y-m-d', strtotime($search_date));
        } else {//date nochange
            $search_date = date('Y-m-d', strtotime($this->get_current_time()));
        }
        $search_display_date = date("d M Y", strtotime($search_date));

        $daily_all_amount = 0;
        if(request()->get('sortType') == "asc"){

            $order_obj = OrderPay::whereDate('created_at', $search_date)->orderBy('created_at', 'asc')->get();
            if(count($order_obj) > 0) {
                foreach($order_obj as $order) {
                    $order->display_time = date_format($order->created_at,"h:i A");
                    $order->table_display_name = Order::where('id', $order->order_id)->pluck('table_name')->first();
                    $order->amount = $order->total;
                    $daily_all_amount += $order->amount;
                }
                $sort = "desc";
            }

        } else {

            $order_obj = OrderPay::whereDate('created_at', $search_date)->orderBy('created_at', 'desc')->get();
            if(count($order_obj) > 0) {
                foreach($order_obj as $order) {
                    $order->display_time = date_format($order->created_at,"h:i A");
                    $order->table_display_name = Order::where('id', $order->order_id)->pluck('table_name')->first();
                    $order->amount = $order->total;
                    $daily_all_amount += $order->amount;
                }
                $sort = "asc";
            }

        }

//        dd($order_obj);
        return view('admin.transaction.list')->with(compact('order_obj', 'search_display_date', 'sort', 'daily_all_amount'));
    }

    public function src_trans() {

        $src_date = request()->src_date;

        $order_obj = OrderPay::whereDate('created_at', $src_date)->where('pay_method', 'CASH')->orderBy('created_at', 'desc')->get();
        $daily_all_amount = 0;
        if(count($order_obj) > 0) {
            foreach($order_obj as $order) {
                $order->display_time = date_format($order->created_at,"h:i A");
                $order->table_display_name = Order::where('id', $order->order_id)->pluck('table_name')->first();
                $order->amount = $order->total;
                $daily_all_amount += $order->amount;
            }
        }

        $sort = 'asc';
        $search_display_date = $src_date;
        return view('admin.transaction.src_list')->with(compact('order_obj', 'search_display_date', 'sort', 'daily_all_amount'));
    }

}
