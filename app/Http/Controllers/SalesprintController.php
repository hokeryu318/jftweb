<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\OrderDish;
use App\Model\OrderPay;
use App\Model\Receipt;
use App\Model\Dish;
use App\Model\Option;
use App\Model\Item;

use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use App\Http\Controllers\print_table1;

class SalesprintController extends Controller
{
    //
    public function index()
    {
        return view('admin.salesprint');
    }

    public function preview()
    {
        return view('admin.salesprint_preview');
    }

}
