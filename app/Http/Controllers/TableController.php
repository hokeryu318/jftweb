<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Table;

class TableController extends Controller
{
    public function index()
    {
        $table = Table::get()->toArray();
        $table_arr = array();
        $table_arr_obj = array();
        if(count($table) > 0){
            $table_arr_obj = json_decode($table[0]['table_array']);
        }
        foreach ($table_arr_obj as $key => $value){
            $table_arr[] = (array)$value;
        }
        return view('admin.table')->with(compact('table_arr'));
    }

    public function store()
    {
        $table = new Table();
        $table->truncate();
        $table->table_array = request()->get('saved_arr');
        $table->save();
        return redirect()->route('admin.table');
    }
}
