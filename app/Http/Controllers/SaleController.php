<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    //
    public function index()
    {
        return view('admin.saledata');
    }
    public function review()
    {
        return view('admin.review');
    }
}
