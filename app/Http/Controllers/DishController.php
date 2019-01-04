<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin.dish.edit');
    }

    public function preview(){
        return view('admin.dish.preview');
    }
}
