<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\Model\OrderTable;
use App\Model\Receipt;
use Illuminate\Http\Request;
use App\Model\Table;

class ReceptionController extends Controller
{
    public function seated()
    {
        $order_obj = Order::get();
        $table_obj = Table::get();
        $order_tables = array();
//        $order_obj = array();
        foreach($order_obj as $order){
            $table_display_ids = array();
            if(count($order->ordertables) > 0){
                foreach ($order->ordertables as $ordertables) {
                    $order_tables[] = $ordertables['table_id'];
                    $table_display_ids[] = $this->get_table_id($ordertables['table_id']);
                }
            }
            $order->display_time = $this->get_time_data(substr($order->time, 11, 2));
            $order->table_display_ids = $table_display_ids;//dd($order->table_display_ids);
        }
        $table_type = array(1=>'A', 'B', 'C', 'Line');
//        dd($table_obj);
        return view('reception.seated')->with(compact('table_type', 'order_tables', 'table_obj', 'order_obj'));
    }

    public function waiting()
    {
        $tables_arr = Table::get()->toArray();
        $tables = array();
        if(count($tables_arr) > 0){
            foreach ($tables_arr as $table_arr) {
                $tables[$table_arr["id"]] = $table_arr;
            }
        }
        $table_type = array(1=>'A', 'B', 'C', 'Line');
        return view('reception.waiting')->with(compact('tables', 'table_type'));
    }

    public function booking()
    {
        $tables_arr = Table::get()->toArray();
        $tables = array();
        if(count($tables_arr) > 0){
            foreach ($tables_arr as $table_arr) {
                $tables[$table_arr["id"]] = $table_arr;
            }
        }
        $table_type = array(1=>'A', 'B', 'C', 'Line');
        return view('reception.booking')->with(compact('tables', 'table_type'));
    }

    public function addCustomer()
    {
        $order_obj = Order::get();
        $table_obj = Table::get();
        $order_tables = array();
        $order_get = array();
        $orders = array();
        $table_ids = array();
        $table_id = request()->get('table_id');
        $order_id = request()->get('order_id');
        foreach($order_obj as $order){
            if(count($order->ordertables) > 0){
                foreach ($order->ordertables as $ordertables) {
                    $order_tables[] = $ordertables['table_id'];
                }
            }
        }
        if($order_id > 0){
            $order_get = Order::find($order_id);
            $order_table_obj = OrderTable::where('order_id', $order_id)->get()->toArray();
            foreach ($order_table_obj as $order) {
                $table_ids[] = $order['table_id'];
            }
        }
        $table_type = array(1=>'A', 'B', 'C', 'Line');
        if($table_id != 0)
            $table_display_id = $this->get_table_id($table_id);

        $default_duration = $this->get_default_duration();

        return view('reception.addCustomer')->with(compact('table_type', 'order_tables', 'table_ids', 'table_obj', 'order_get', 'table_id', 'order_id', 'orders', 'table_display_id', 'default_duration'));
    }

    public function store()
    {//dd(request());
        if(request()->get('order_id') > 0){//edit
            $order_obj = Order::find(request()->get('order_id'));
            $order_obj->time = request()->get('time');
            $order_obj->guest = request()->get('guest_number');
            $order_obj->duration = request()->get('duration');
            $order_obj->customer_name = request()->get('customer_name');
            $order_obj->contact_number = request()->get('contact_number');
            $order_obj->email = request()->get('email_address');
            $order_obj->note = request()->get('customer_notes');
            $order_obj->update();
            OrderTable::where('order_id',request()->get('order_id'))->delete();
            $table_ids = request()->get('table_id');
            $table_id_arr = explode(',', $table_ids);
            foreach ($table_id_arr as $id) {
                $order_table_obj = new OrderTable();
                $order_table_obj->order_id = request()->get('order_id');
                $order_table_obj->table_id = $id;
                $order_table_obj->save();
            }
        }else{//add
            $order_obj = new Order();
            $order_obj->time = request()->get('time');
            $order_obj->guest = request()->get('guest_number');
            $order_obj->duration = request()->get('duration');
            $order_obj->customer_name = request()->get('customer_name');
            $order_obj->contact_number = request()->get('contact_number');
            $order_obj->email = request()->get('email_address');
            $order_obj->note = request()->get('customer_notes');
            $order_obj->save();
            $table_ids = request()->get('table_id');
            $table_id_arr = explode(',', $table_ids);
            foreach ($table_id_arr as $id) {
                $order_table_obj = new OrderTable();
                $order_table_obj->order_id = $order_obj->id;
                $order_table_obj->table_id = $id;
                $order_table_obj->save();
            }
        }
        return redirect()->route('reception.seated');
    }
}
