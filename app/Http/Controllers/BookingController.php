<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    //

    public function index()
    {
        return view('admin.booking.booking_list');
    }

    public function edit(){
        return view('admin.booking.booking_edit');
    }
}
