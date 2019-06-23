<?php

namespace App\Http\Controllers;

use App\Model\OrderDish;
use Illuminate\Http\Request;
use App\Model\Order;

class TransactionController extends Controller
{
    //
    public function index()
    {
        //bookings : order.status = booking;

        $sort = "desc";

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

        if(request()->get('sortType') == "asc"){
            $order_obj = Order::whereDate('time', $search_date)->orderBy('time','desc')->get();
            $sort = "desc";
        }else{
            $order_obj = Order::whereDate('time', $search_date)->orderBy('time','asc')->get();
            $sort = "asc";
        }

        foreach($order_obj as $order)
        {
//            $table_display_name = '';
//            if(count($order->ordertables) > 0){
//                foreach ($order->ordertables as $ordertables) {
//                    $table_display_name .= $this->get_table_name($ordertables['table_id']).'+';
//                }
//            }
            $order->display_time = $this->get_time_data(substr($order->time, 11, 5));
//            $order->table_display_name = rtrim($table_display_name, '+');
            $order->table_display_name = $order->table_name;
            $order->amount = OrderDish::where('order_id', $order->id)->sum('total_price');

        }
//        dd($order_obj);
        return view('admin.transaction.list')->with(compact('order_obj', 'search_display_date', 'sort'));
    }

    public function src_trans() {

        $src_date = request()->src_date;
        $order_obj = Order::whereDate('time', $src_date)->get();
        foreach($order_obj as $order)
        {
            $table_display_name = '';
            if(count($order->ordertables) > 0){
                foreach ($order->ordertables as $ordertables) {
                    $table_display_name .= $this->get_table_name($ordertables['table_id']).'+';
                }
            }
            $order->display_time = $this->get_time_data(substr($order->time, 11, 5));
            $order->table_display_name = rtrim($table_display_name, '+');
            $order->amount = OrderDish::where('order_id', $order->id)->sum('total_price');

        }

        $sort = 'asc';
        $search_display_date = $src_date;
        return view('admin.transaction.src_list')->with(compact('order_obj', 'search_display_date', 'sort'));
    }

}
