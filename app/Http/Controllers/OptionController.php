<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Option;
use App\Model\Item;

class OptionController extends Controller
{
    //
    public function index()
    {
        return view('admin.option.list');
    }
    public function edit($id)
    {
        $obj = Option::find($id);
        return view('admin.option.form')->with(compact('obj'));
    }
    public function add()
    {
        $obj = new Option();
        return view('admin.option.form')->with(compact('obj'));
    }
    public function store()
    {
        // dd(request());
        if(is_null(request()->id)){ //new item
            $obj = new Option();
            $obj->name = request()->name;
            $obj->display_name_en = request()->display_name_en;
            $obj->display_name_cn = request()->display_name_cn;
            $obj->display_name_jp = request()->display_name_jp;
            $obj->multi_select = request()->multi_select == "on" ? 1 : 0;
            $obj->number_selection = request()->number_selection;
            $obj->photo_visible = request()->photo_visible == "on" ? 1 : 0;
            $obj->save();

            $option_id = $obj->id;

            if(request()->has('option-name')){
                $option_names = request()->get('option-name');
                $option_prices = request()->get('option-price');
                foreach($option_names as $i => $o){
                    if($i >= count(request()->get('option-name')) - 1) break;
                    $item = new Item();
                    $item->option_id = $option_id;
                    $item->name = $o;
                    $item->price = $option_prices[$i];
                    if(request()->photo_visible == "on"){
                        $file = request()->file('option-image')[$i];
                        $destinationPath = 'options';
                        $destinationFile = $file->getClientOriginalName();
                        $file->move($destinationPath, $destinationFile);
                        $item->image = $destinationFile;
                    }
                    $item->save();
                }
            }
        } else {
            dd(request());
        }
        return redirect()->route('admin.option.add');
    }
}
