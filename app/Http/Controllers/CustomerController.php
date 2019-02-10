<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\Model\OrderTable;
use Illuminate\Http\Request;
use App\Model\Table;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.index');
    }
}
