<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Category;
use App\Model\Kitchen;
use App\Model\Badge;
use App\Model\Option;
use App\Model\Dish;
use App\Model\DishOption;

class DishController extends Controller
{
    //
    public function index(){
        return view('admin.dish.list');
    }

    public function edit($id){
        $main_cats = Category::get_mains();
        $sub_cats = Category::get_subs();
        $groups = Kitchen::get();
        $badges = Badge::get();
        $options = Option::get();
        $obj = Dish::find($id);
        $main_cat = Category::find($obj->category_id);
        $sub_cats = $main_cat->subs;
        return view('admin.dish.edit')->with(compact('main_cats', 'sub_cats', 'groups', 'badges', 'options', 'obj'));
    }

    public function add(){
        $obj = new Dish();
        $main_cats = Category::get_mains();
        $groups = Kitchen::get();
        $badges = Badge::get();
        $options = Option::get();
        return view('admin.dish.edit')->with(compact('main_cats', 'groups', 'badges', 'options', 'obj'));
    }

    public function preview(){
        return view('admin.dish.preview');
    }

    public function store()
    {
        if(is_null(request()->id)){
            $obj = new Dish();
            $obj->name_en = request()->get('name_en');
            $obj->name_cn = request()->get('name_cn');
            $obj->name_jp = request()->get('name_jp');
            $obj->desc_en = request()->get('desc_en');
            $obj->desc_cn = request()->get('desc_cn');
            $obj->desc_jp = request()->get('desc_jp');
            $obj->price = request()->get('price');
            $obj->category_id = request()->get('category_id');
            $obj->sub_category_id = request()->get('sub_category_id');
            $obj->group_id = request()->get('group_id');
            $obj->badge_id = request()->get('badge_id');
            $obj->eatin_breakfast = request()->get('eatin_breakfast') == "on" ? 1 : 0;
            $obj->eatin_lunch = request()->get('eatin_lunch') == "on" ? 1 : 0;
            $obj->eatin_tea = request()->get('eatin_tea') == "on" ? 1 : 0;
            $obj->eatin_dinner = request()->get('eatin_dinner') == "on" ? 1 : 0;
            $obj->takeaway_breakfast = request()->get('takeaway_breakfast') == "on" ? 1 : 0;
            $obj->takeaway_lunch = request()->get('takeaway_lunch') == "on" ? 1 : 0;
            $obj->takeaway_tea = request()->get('takeaway_tea') == "on" ? 1 : 0;
            $obj->takeaway_dinner = request()->get('takeaway_dinner') == "on" ? 1 : 0;

            $file = request()->file('image');
            $destinationPath = 'dishes';
            $destinationFile = $file->getClientOriginalName();
            $file->move($destinationPath, $destinationFile);
            $obj->image = $destinationFile;
            $obj->save();
        } else {
            //dd(request());
            $obj = Dish::find(request()->id);
            $obj->name_en = request()->get('name_en');
            $obj->name_cn = request()->get('name_cn');
            $obj->name_jp = request()->get('name_jp');
            $obj->desc_en = request()->get('desc_en');
            $obj->desc_cn = request()->get('desc_cn');
            $obj->desc_jp = request()->get('desc_jp');
            $obj->price = request()->get('price');
            $obj->category_id = request()->get('category_id');
            $obj->sub_category_id = request()->get('sub_category_id');
            $obj->group_id = request()->get('group_id');
            $obj->badge_id = request()->get('badge_id');
            $obj->eatin_breakfast = request()->get('eatin_breakfast') == "on" ? 1 : 0;
            $obj->eatin_lunch = request()->get('eatin_lunch') == "on" ? 1 : 0;
            $obj->eatin_tea = request()->get('eatin_tea') == "on" ? 1 : 0;
            $obj->eatin_dinner = request()->get('eatin_dinner') == "on" ? 1 : 0;
            $obj->takeaway_breakfast = request()->get('takeaway_breakfast') == "on" ? 1 : 0;
            $obj->takeaway_lunch = request()->get('takeaway_lunch') == "on" ? 1 : 0;
            $obj->takeaway_tea = request()->get('takeaway_tea') == "on" ? 1 : 0;
            $obj->takeaway_dinner = request()->get('takeaway_dinner') == "on" ? 1 : 0;

            $file = request()->file('image');
            if($file != null){
                $destinationPath = 'dishes';
                $destinationFile = $file->getClientOriginalName();
                $file->move($destinationPath, $destinationFile);
                $obj->image = $destinationFile;
            }
            $obj->save();

            $old_opts = $obj->dishoptions->pluck('id');
            DishOption::whereIn('id', $old_opts)->delete();

            $opts = request()->get('opts');
            foreach($opts as $op){
                $dish_option = new DishOption();
                $dish_option->dish_id = $obj->id;
                $dish_option->option_id = $op;
                $dish_option->save();
            }
        }
        return redirect()->route('admin.dish');
    }
}
