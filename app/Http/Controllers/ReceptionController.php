<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\Model\OrderTable;
use Illuminate\Http\Request;
use App\Model\Table;

class ReceptionController extends Controller
{
    public function seated()
    {
        $tables_arr = Table::get()->toArray();
        $tables = array();
        if(count($tables_arr) > 0){
            foreach ($tables_arr as $table_arr) {
                $tables[$table_arr["id"]] = $table_arr;
            }
        }
        $table_type = array(1=>'A', 'B', 'C', 'Line');
        return view('reception.seated')->with(compact('tables', 'table_type'));
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
        $tables_arr = Table::get()->toArray();
        $tables = array();
        if(count($tables_arr) > 0){
            foreach ($tables_arr as $table_arr) {
                $tables[$table_arr["id"]] = $table_arr;
            }
        }
        $table_type = array(1=>'A', 'B', 'C', 'Line');
        return view('reception.addCustomer')->with(compact('tables', 'table_type'));
    }

    public function store()
    {
        $order_obj = new Order();
        $order_obj->time = request()->get('time');
        $order_obj->guest = request()->get('guest_number');
        $order_obj->duration = request()->get('duration');
        $order_obj->customer_name = request()->get('customer_name');
        $order_obj->contact_number = request()->get('contact_number');
        $order_obj->email = request()->get('email_address');
        $order_obj->note = request()->get('customer_notes');
        $order_obj->save();
        $order_table_obj = new OrderTable();
        $order_table_obj->order_id = $order_obj->id;
        $order_table_obj->table_id = request()->get('table_id');
        $order_table_obj->save();
        return redirect()->route('reception.seated');
    }
}
