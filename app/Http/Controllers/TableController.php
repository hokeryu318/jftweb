<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Table;

class TableController extends Controller
{
    public function index()
    {
        $tables_arr = Table::get()->toArray();
        $tables = array();
        if(count($tables_arr) > 0){
            foreach ($tables_arr as $table_arr) {
                $tables[$table_arr["id"]] = $table_arr;
            }
            $last_id_arr = Table::select('id')->orderBy('id', 'desc')->first()->toArray();
            $new_id = $last_id_arr['id'] + 1;
        }else{
            $new_id = 1;
        }
        $table_type = array(1=>'A', 'B', 'C', 'Line');
        return view('admin.table')->with(compact('tables', 'table_type', 'new_id'));
    }

    public function store()
    {
        $tables_arr_tmp = json_decode(request()->get('saved_arr'));
        $tables_arr = array();
        foreach ($tables_arr_tmp as $key => $table_arr_tmp){
            if($table_arr_tmp != NULL){
                $tables_arr[$table_arr_tmp->id] = (array)$table_arr_tmp;
            }
        }
        $table_obj = Table::select('id')->get()->toArray();
        if(count($table_obj) > 0){
            $last_id_arr = Table::select('id')->orderBy('id', 'desc')->first()->toArray();
        }
        foreach ($tables_arr as $table_arr) {
            if(isset($last_id_arr['id']) && $last_id_arr['id'] >= $table_arr['id']){
                $table = Table::find($table_arr['id']);
                $table->x = $table_arr['x'];
                $table->y = $table_arr['y'];
                $table->type = $table_arr['type'];
                $table->index = $table_arr['index'];
                $table->update();
            }else{
                $table = new Table();
                $table->x = $table_arr['x'];
                $table->y = $table_arr['y'];
                $table->type = $table_arr['type'];
                $table->index = $table_arr['index'];
                $table->save();
            }

        }
        if(request()->get('id') > 0){
            $table = Table::find(request()->get('id'));
            $table->delete();
        }
        return redirect()->route('admin.table');
    }
}
