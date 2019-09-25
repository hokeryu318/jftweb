<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;

class BookingController extends Controller
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
            $order_obj = Order::where('status', 'booking')->whereDate('time', $search_date)->orderBy('time','desc')->get();
            $sort = "desc";
        }else{
            $order_obj = Order::where('status', 'booking')->whereDate('time', $search_date)->orderBy('time','asc')->get();
            $sort = "asc";
        }

        foreach($order_obj as $order)
        {
            $table_display_name = '';
            if(count($order->ordertables) > 0){
                foreach ($order->ordertables as $ordertables) {
                    $table_display_name .= $this->get_table_name($ordertables['table_id']).'+';
                }
            }
            $order->display_time = date_format(date_create($order->time),"h:i A");
            $order->table_display_name = substr($table_display_name, 0, -1);
        }
//        dd($order_obj);
        return view('admin.booking.booking_list')->with(compact('order_obj', 'search_display_date', 'sort'));
    }

    public function edit()
    {
        return view('admin.booking.booking_edit');
    }

}
