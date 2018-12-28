<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Receipt;
use App\Model\Kitchen;
class SettingController extends Controller
{
    //
    public function kitchen()
    {
        $kitchens = Kitchen::get();
        return view('admin.setting.kitchen')->with(compact('kitchens'));
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
        $profile = Receipt::profile();
        return view('admin.setting.gst')->with(compact('profile'));
    }
    public function gstpost()
    {
        $profile = Receipt::profile();
        $profile->gst = request()->gst;
        $profile->save();
        return redirect()->route('admin.setting.gst');
    }
    public function payment()
    {
        return view('admin.setting.payment');
    }
    public function receipt()
    {
        $profile = Receipt::profile();
        return view('admin.setting.receipt')->with(compact('profile'));
    }
    public function receiptpost()
    {
        // dd(request());
        $profile = Receipt::profile();
        $profile->shop_name = request()->shop_name;
        $profile->abn = request()->abn;
        $profile->address = request()->address;
        $profile->phone = request()->phone;
        $profile->save();
        return redirect()->route('admin.setting.receipt');
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
