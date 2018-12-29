<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Receipt;
use App\Model\Kitchen;
use App\Model\Timeslot;
use App\Model\Holiday;
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
        $slots = Timeslot::get();
        return view('admin.setting.timeslots')->with(compact('slots'));
    }
    public function htimeslots()
    {
        $slot = Timeslot::find(9);
        $holidays = Holiday::get();
        return view('admin.setting.htimeslots')->with(compact('slot', 'holidays'));
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
    public function kitchen_post()
    {
        if(request()->has('new')){
            $newitems = request()->new;
            foreach($newitems as $item){
                $kitchen = new Kitchen();
                $kitchen->name = $item;
                $kitchen->save();
            }
        }
        if(request()->has('removed')){
            $removeitems = request()->removed;
            foreach($removeitems as $item){
                $kitchen = Kitchen::find($item);
                $kitchen->delete();
            }
        }
        return redirect()->route('admin.setting.kitchen');
    }
    public function timeslot_post()
    {
        // dd(request());
        $regular = Timeslot::find(1);
        if(request()->has('regular-morning-on')){
            $regular->morning_on = 1;
            $regular->morning_starts = request()->input('regular-morning-start');
            $regular->morning_ends = request()->input('regular-morning-end');
        } else {
            $regular->morning_on = 0;
        }
        if(request()->has('regular-lunch-on')){
            $regular->lunch_on = 1;
            $regular->lunch_starts = request()->input('regular-lunch-start');
            $regular->lunch_ends = request()->input('regular-lunch-end');
        } else {
            $regular->lunch_on = 0;
        }
        if(request()->has('regular-tea-on')){
            $regular->tea_on = 1;
            $regular->tea_starts = request()->input('regular-tea-start');
            $regular->tea_ends = request()->input('regular-tea-end');
        } else {
            $regular->tea_on = 0;
        }
        if(request()->has('regular-dinner-on')){
            $regular->dinner_on = 1;
            $regular->dinner_starts = request()->input('regular-dinner-start');
            $regular->dinner_ends = request()->input('regular-dinner-end');
        } else {
            $regular->dinner_on = 0;
        }
        if(request()->has('regular-latenight-on')){
            $regular->latenight_on = 1;
            $regular->latenight_starts = request()->input('regular-latenight-start');
            $regular->latenight_ends = request()->input('regular-latenight-end');
        } else {
            $regular->latenight_on = 0;
        }
        $regular->save();

        // dd(request());
        $monday = Timeslot::find(2);
        self::saveTimeSlot(request(), $monday, 'monday');
        $tuesday = Timeslot::find(3);
        self::saveTimeSlot(request(), $tuesday, 'tuesday');
        $wednesday = Timeslot::find(4);
        self::saveTimeSlot(request(), $wednesday, 'wednesday');
        $thursday = Timeslot::find(5);
        // dd($thursday);
        self::saveTimeSlot(request(), $thursday, 'thursday');
        $friday = Timeslot::find(6);
        self::saveTimeSlot(request(), $friday, 'friday');
        $saturday = Timeslot::find(7);
        self::saveTimeSlot(request(), $saturday, 'saturday');
        $sunday = Timeslot::find(8);
        self::saveTimeSlot(request(), $sunday, 'sunday');

        return redirect()->route('admin.setting.timeslots');
    }

    public function htimeslot_post(){
        if(request()->has('new')){
            $new_holidays = request()->input('new');
            foreach($new_holidays as $new){
                $holiday = new Holiday();
                $holiday->holiday_date = $new;
                $holiday->save();
            }
        }
        if(request()->has('removed')){
            $removeitems = request()->removed;
            foreach($removeitems as $item){
                $holiday = Holiday::find($item);
                $holiday->delete();
            }
        }
        $holiday = Timeslot::find(9);
        self::saveTimeSlot(request(), $holiday, 'holiday');
        return redirect()->route('admin.setting.htimeslots');
    }

    private function saveTimeSlot($req, $obj, $key){
        if($req->has($key.'-on')){
            $obj->day_on = 1;
            if($req->has($key.'-morning-on')){
                $obj->morning_on = 1;
                $obj->morning_starts = $req->input($key.'-morning-start');
                $obj->morning_ends = $req->input($key.'-morning-end');
            } else {
                $obj->morning_on = 0;
            }
            if($req->has($key.'-lunch-on')){
                $obj->lunch_on = 1;
                $obj->lunch_starts = $req->input($key.'-lunch-start');
                $obj->lunch_ends = $req->input($key.'-lunch-end');
            } else {
                $obj->lunch_on = 0;
            }
            if($req->has($key.'-tea-on')){
                $obj->tea_on = 1;
                $obj->tea_starts = $req->input($key.'-tea-start');
                $obj->tea_ends = $req->input($key.'-tea-end');
            } else {
                $obj->tea_on = 0;
            }
            if($req->has($key.'-dinner-on')){
                $obj->dinner_on = 1;
                $obj->dinner_starts = $req->input($key.'-dinner-start');
                $obj->dinner_ends = $req->input($key.'-dinner-end');
            } else {
                $obj->dinner_on = 0;
            }
            if($req->has($key.'-latenight-on')){
                $obj->latenight_on = 1;
                $obj->latenight_starts = $req->input($key.'-latenight-start');
                $obj->latenight_ends = $req->input($key.'-latenight-end');
            } else {
                $obj->latenight_on = 0;
            }
            if($req->has($key.'-business-on')){
                $obj->non_business = 1;
            } else {
                $obj->non_business = 0;
            }
        } else {
            $obj->day_on = 0;
        }
        $obj->save();
    }
}
