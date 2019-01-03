<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;

use App\Model\Receipt;
use App\Model\Kitchen;
use App\Model\Timeslot;
use App\Model\Holiday;
use App\Model\Badge;
use App\Model\Payment;
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
        $profile = Receipt::profile();
        return view('admin.setting.customer')->with(compact('profile'));
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
        $payments = Payment::orderBy('sort')->get();
        return view('admin.setting.payment')->with(compact('payments'));
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
        $badges = Badge::get();
        return view('admin.setting.badge')->with(compact('badges'));
    }
    public function language()
    {
        $profile = Receipt::profile();
        return view('admin.setting.language')->with(compact('profile'));
    }
    public function password()
    {
        $profile = Receipt::profile();
        return view('admin.setting.password')->with(compact('profile'));
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
            $obj->morning_on = 0;
            $obj->lunch_on = 0;
            $obj->tea_on = 0;
            $obj->dinner_on = 0;
            $obj->latenight_on = 0;
        }
        $obj->save();
    }
    public function addbadge()
    {
        $img_name = request()->get('image-name');
        if(Badge::where('name', $img_name)->exists()){
            return redirect()->route('admin.setting.badge');
        }

        $file = request()->file('image-file');
        $destinationPath = 'uploads';
        $destinationFile = $file->getClientOriginalName();
        $file->move($destinationPath, $destinationFile);

        $badge = new Badge();
        $badge->name = $img_name;
        $badge->filepath = $destinationFile;
        $badge->save();

        return redirect()->route('admin.setting.badge');
    }
    public function customer_post()
    {
        $profile = Receipt::profile();
        $profile->customer = request()->customer_time;
        $profile->save();
        return redirect()->route('admin.setting.customer');
    }
    public function language_post()
    {
        $profile = Receipt::profile();
        if(request()->has('lang_jp')){
            $profile->lang_jp = request()->lang_jp == "on" ? 1 : 0;
        }
        if(request()->has('lang_kr')){
            $profile->lang_kr = request()->lang_kr == "on" ? 1 : 0;
        }
        if(request()->has('lang_cn')){
            $profile->lang_cn = request()->lang_cn == "on" ? 1 : 0;
        }
        $profile->save();
        return redirect()->route('admin.setting.language');
    }
    public function password_post()
    {
        $profile = Receipt::profile();
        if(request()->has('password_menu')){
            if(substr(request()->password_menu, 0, 1) != "*")
                $profile->password_menu = Hash::make(request()->password_menu);
        }
        if(request()->has('password_kitchen')){
            if(substr(request()->password_kitchen, 0, 1) != "*")
                $profile->password_kitchen = Hash::make(request()->password_kitchen);
        }
        if(request()->has('password_reception')){
            if(substr(request()->password_reception, 0, 1) != "*")
                $profile->password_reception = Hash::make(request()->password_reception);
        }
        if(request()->has('password_admin')){
            if(substr(request()->password_admin, 0, 1) != "*")
                $profile->password_admin = Hash::make(request()->password_admin);
        }
        $profile->save();
        return redirect()->route('admin.setting.password');
    }
    public function active_badge()
    {
        Badge::where('created_at' ,'!=', null)->update(['active' => '0']);
        if(request()->has('actives')){
            Badge::whereIn('id', request()->actives)->update(['active' => '1']);
        }
        return redirect()->route('admin.setting.badge');
    }
    public function payment_post()
    {
        // dd(request());
        if(request()->has('new')){
            $newitems = request()->new;
            foreach($newitems as $item){
                $payment = new Payment();
                $payment->name = $item;
                $payment->save();
            }
        }
        if(request()->has('removed')){
            $removeitems = request()->removed;
            foreach($removeitems as $item){
                $payment = Payment::find($item);
                $payment->delete();
            }
        }
        if(request()->has('sort')){
            $sorts = request()->sort;
            foreach($sorts as $s){
                $detail = explode('_', $s);
                $key = $detail[0];
                $item = Payment::get_item_for_sort($key);
                $item->sort = $detail[1];
                $item->save();
            }
        }
        return redirect()->route('admin.setting.payment');
    }
}
