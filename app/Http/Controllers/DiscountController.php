<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Dish;

class DiscountController extends Controller
{
    public function index(){
        return view('admin.discount.list');
    }

    public function add(){
        $dishes = Dish::get();
        return view('admin.discount.form')->with(compact('dishes'));
    }
}
