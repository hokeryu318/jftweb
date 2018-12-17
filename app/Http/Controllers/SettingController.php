<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function kitchen()
    {
        return view('admin.setting.kitchen');
    }
    public function timeslots()
    {
        return view('admin.setting.timeslots');
    }
    public function htimeslots()
    {
        return view('admin.setting.htimeslots');
    }
    public function customer()
    {
        return view('admin.setting.customer');
    }
    public function gst()
    {
        return view('admin.setting.gst');
    }
    public function payment()
    {
        return view('admin.setting.payment');
    }
    public function receipt()
    {
        return view('admin.setting.receipt');
    }
    public function badge()
    {
        return view('admin.setting.badge');
    }
    public function language()
    {
        return view('admin.setting.language');
    }
    public function password()
    {
        return view('admin.setting.password');
    }
}
