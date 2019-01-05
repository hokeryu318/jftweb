<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Category;
use App\Model\Kitchen;
use App\Model\Badge;

class DishController extends Controller
{
    //
    public function index(){
        return view('admin.dish.list');
    }

    public function edit(){
        return view('admin.dish.edit');
    }

    public function add(){
        $main_cats = Category::get_mains();
        $sub_cats = Category::get_subs();
        $groups = Kitchen::get();
        $badges = Badge::get();
        return view('admin.dish.edit')->with(compact('main_cats', 'sub_cats', 'groups', 'badges'));
    }

    public function preview(){
        return view('admin.dish.preview');
    }
}
