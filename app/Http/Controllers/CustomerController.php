<?php

namespace App\Http\Controllers;

use App\Events\NotificationEvent;
use App\Model\Category;
use App\Model\DishCategory;
use App\Model\Dish;
use App\Model\Discount;
use App\Model\OrderDish;
use App\Model\OrderOption;
use App\Model\Item;
use App\Model\Option;
use App\Model\Order;
use App\Model\Receipt;
use App\Model\Table;
use App\Model\OrderTable;
use App\Model\Holiday;
use App\Model\Timeslot;
use Illuminate\Http\Request;
use App\Events\KitchenEvent;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index($order_id)
    {
        $profile = Receipt::profile();
        $table_id = request()->table_id;//dd($table_id);
        $order_table = OrderTable::where('table_id', $table_id)->get()->first();//dd($order_table);
        $table_ids_arr = OrderTable::where('order_id', $order_id)->pluck('table_id');
        $tables = Table::whereIn('id', $table_ids_arr)->get();
        $table_name = '';
        $order = Order::where('id', $order_id)->where('pay_flag', '<>', 2)->first();//dd($order);
        foreach($tables as $table){
            $table_name .= $this->get_table_name($table->id).'+';
        }
        $table_name = rtrim($table_name, '+');
        //echo $table_name;
        $categories = Category::orderby('order')->get()->toArray();
        $dishes = array();
        if(count($categories) > 0){
            $category_record = Category::find($categories[0]['id']);
            $dishes = $category_record->dishes;
            foreach($dishes as $dish){
                $dish->discount = ($this->get_discount($dish->id))?($this->get_discount($dish->id)):'';
            }
        }
        $category_all = array();
        foreach ($categories as $category) {
            $category_all[$category['id']] = $category;
            if($category['has_subs'] == 1){
                $sub_categories = Category::where('parent_id', $category['id'])->orderby('order')->get()->toArray();
                $category_all[$category['id']]['children'] = $sub_categories;
            }
        }

        $last_order_time = Order::orderBy('time', 'desc')->pluck('time')->first();
//        dd($order_table);
//        dd($categories);

        $img_name = Storage::disk('screen')->files();
        $img_name = json_encode($img_name);

        return view('customer.index')->with(compact('profile','category_all', 'dishes', 'order', 'order_table', 'table_name', 'table_id', 'last_order_time'))->with('img_name',$img_name);
    }
//    public function dish_list()
//    {
//        $category = Category::find(request()->category);
//        if($category->has_subs == 1) {
//
//        } else {
//            $dishes = $category->dishes;
//            foreach($dishes as $dish){
//                $dish->discount = ($this->get_discount($dish->id))?($this->get_discount($dish->id)):'';
//            }
//            return (string)view('part.category_dish_customer', compact('dishes'))->render();
//        }
//
//    }
    public function dish_list()
    {
        $category = Category::find(request()->category);

        $menu_time = request()->time_slot;
        $time = substr($menu_time,11,5);
        $date = date('d M Y', strtotime($menu_time));
        /*if( $time > $time_slot->morning_starts && $time < $time_slot->morning_ends && $time_slot->morning_on == 1 ) $eat_in = "eatin_breakfast";
        elseif( $time > $time_slot->lunch_starts && $time < $time_slot->lunch_ends && $time_slot->lunch_on == 1 ) $eat_in = "eatin_lunch";
        elseif( $time > $time_slot->tea_starts && $time < $time_slot->tea_ends && $time_slot->tea_on == 1 ) $eat_in = "eatin_tea";
        elseif( $time > $time_slot->dinner_starts && $time < $time_slot->dinner_ends && $time_slot->dinner_on == 1 ) $eat_in = "eatin_dinner";
        elseif( $time > $time_slot->latenight_starts && $time < $time_slot->latenight_ends && $time_slot->latenight_on == 1 ) $eat_in = "eatin_latenight";*/

        $chk_holiday = Holiday::where('holiday_date',$date)->get();
        
        if( $time > '08:00' && $time < '12:00' )
        {
            $eat_in = "eatin_breakfast";
            $eat_in1 = "morning_on";
        } 
        elseif( $time > '12:00' && $time < '14:00'  )
        {
            $eat_in = "eatin_lunch";
            $eat_in1 = "lunch_on";
        } 
        elseif( $time > '14:00' && $time < '17:30'  )
        {
            $eat_in = "eatin_tea";
            $eat_in1 = "tea_on";
        } 
        elseif( $time > '17:30' && $time < '22:00'  )
        {
            $eat_in = "eatin_dinner";
            $eat_in1 = "dinner_on";
        } 
        //elseif( ($time > '22:00' || $time < '02:00') ) $eat_in = "eatin_dinner";
        else
        {
            $eat_in = "";
            $eat_in1 = "";
        } 

        if(count($chk_holiday) > 0)
        {
            $holiday = Timeslot::find(9);
            
            if( !empty($eat_in1) && $holiday->$eat_in1 == 1 )  
            {
                $dishes = $category->eat_dishes($eat_in);
                foreach($dishes as $dish){
                    $dish->discount = ($this->get_discount($dish->id))?($this->get_discount($dish->id)):'';
                }   
            }
            else 
                $dishes = "";
        }
        else
        {
            if(!empty($eat_in))    $dishes = $category->eat_dishes($eat_in);
            else $dishes = $category->dishes;  

            foreach($dishes as $dish){
                $dish->discount = ($this->get_discount($dish->id))?($this->get_discount($dish->id)):'';
            }        
        }

        return (string)view('part.category_dish_customer', compact('dishes'))->render();
    }
    public function dish_info()
    {
//        dd(request());
        $dish_id = request()->dish_id;
        $dish = Dish::find($dish_id);
        $dish->discount = $this->get_discount($dish_id);//dd($dish->discount);
        $items = request()->items;
        $options = $dish->options;
        $option_id_arr = '';
        foreach($options as $option){
            if($option->photo_visible > 0){
                $option_id_arr .= $option->id.',';
            }
        }
        $option_id_arr = rtrim($option_id_arr, ",");
        $option_count = count($options);
        if(request()->type == 'main'){
            $count = 1;
        }else{
            $count = 0;
            $type = 0;
            foreach ($options as $option) {
                if($option->photo_visible == 1){
                    $count = 1;
                }
                if($option->photo_visible == 0){
                    $type = 1;
                }
            }
            if($type == 1 && $count == 1){
                $count = 2;
            }
        }
//        dd($options);
//        $count = 0;
        return (string)view('part.dish_info', compact('dish', 'options', 'count', 'option_count', 'option_id_arr', 'items'))->render();
    }
    public function dish_option()
    {
//        dd(request());
        $dish_id = request()->dish_id;

        $dish = Dish::find($dish_id);
        $dish->discount = $this->get_discount($dish_id);
        $dish->price = ($dish->discount)?($dish->discount):$dish->price;

        $options = $dish->options;

        $count = request()->index;

        $option_ids = request()->option_id_arr;
        $option_id_arr = explode(',', $option_ids);
        $option = Option::find($option_id_arr[$count]);
        $items = Item::where('option_id', $option_id_arr[$count])->get();

//        $chk_prev_flag = request()->chk_flag;
//        if($chk_prev_flag == 0)
            $count ++;
//        else
//            $count += 2;

        $items_id = request()->items_id;

        $selecteds = request()->selecteds;// for example: ['', '38', '46,50']
        $slt_items = array();
        $i = 0;
        foreach($selecteds as $selected) {

            $items_id_arr = explode(',', $selected);

            if($items_id_arr[0]) {
                $slt_items[$i]['items_id_arr'] = $items_id_arr;
                $j = 0;
                foreach($items_id_arr as $its_id) {
                    $it_pri = Item::where('id', $its_id)->get()->first();
                    $slt_items[$i][$j]['name'] = $it_pri->name;
                    $slt_items[$i][$j]['price'] = $it_pri->price;
                    $j++;
                }
                $i++;
            }

//            if($items_id_arr[0]) {
//                $op_id = Item::where('id', $items_id_arr[0])->pluck('option_id');
//                $slt_items[$i]['display_name_en'] = Option::where('id', $op_id)->pluck('display_name_en')->first();
//                $slt_items[$i]['display_name_cn'] = Option::where('id', $op_id)->pluck('display_name_cn')->first();
//                $slt_items[$i]['display_name_jp'] = Option::where('id', $op_id)->pluck('display_name_jp')->first();
//                $slt_items[$i]['items_id_arr'] = $items_id_arr;
//
//                $j = 0;
//                foreach($items_id_arr as $its_id) {
//                    $it_pri = Item::where('id', $its_id)->pluck('price')->first();
//                    $slt_items[$i][$j]['price'] = $it_pri;
//                    $j++;
//                }
//
//                $i++;
//            }

        }

        return (string)view('part.dish_option', compact('items', 'count', 'option', 'option_id_arr', 'option_ids', 'dish_id', 'items_id', 'dish', 'options', 'slt_items'))->render();

    }
    public function dish_option_previous()
    {
//        dd(request());
        $dish_id = request()->dish_id;

        $dish = Dish::find($dish_id);
        $dish->discount = $this->get_discount($dish_id);
        $dish->price = ($dish->discount)?($dish->discount):$dish->price;

        $options = $dish->options;

        $count = request()->index;

        $option_ids = request()->option_id_arr;
        $option_id_arr = explode(',', $option_ids);

        $chk_prev_flag = request()->chk_flag;
        if($chk_prev_flag == 1) {
            $count ++;
        }

        $option = Option::find($option_id_arr[$count]);
        $items = Item::where('option_id', $option_id_arr[$count])->get();

        $count ++;

        $items_id = request()->items_id;

        $selecteds = request()->selecteds;// for example: ['', '38', '46,50']
        $slt_items = array();
        $i = 0;
        foreach($selecteds as $selected) {

            $items_id_arr = explode(',', $selected);

            if($items_id_arr[0]) {
                $slt_items[$i]['items_id_arr'] = $items_id_arr;
                $j = 0;
                foreach($items_id_arr as $its_id) {
                    $it_pri = Item::where('id', $its_id)->get()->first();
                    $slt_items[$i][$j]['name'] = $it_pri->name;
                    $slt_items[$i][$j]['price'] = $it_pri->price;
                    $j++;
                }
                $i++;
            }

//            if($items_id_arr[0]) {
//                $op_id = Item::where('id', $items_id_arr[0])->pluck('option_id');
//                $slt_items[$i]['display_name_en'] = Option::where('id', $op_id)->pluck('display_name_en')->first();
//                $slt_items[$i]['display_name_cn'] = Option::where('id', $op_id)->pluck('display_name_cn')->first();
//                $slt_items[$i]['display_name_jp'] = Option::where('id', $op_id)->pluck('display_name_jp')->first();
//                $slt_items[$i]['items_id_arr'] = $items_id_arr;
//
//                $j = 0;
//                foreach($items_id_arr as $its_id) {
//                    $it_pri = Item::where('id', $its_id)->pluck('price')->first();
//                    $slt_items[$i][$j]['price'] = $it_pri;
//                    $j++;
//                }
//
//                $i++;
//            }

        }

        return (string)view('part.dish_option', compact('items', 'count', 'option', 'option_id_arr', 'option_ids', 'dish_id', 'items_id', 'dish', 'options', 'slt_items'))->render();

    }


    public function dish_option_confirm()
    {
//        dd(request());
        $dish_id = request()->dish_id;
        $dish = Dish::find($dish_id);
        $dish->discount = $this->get_discount($dish_id);
        $dish->price = ($this->get_discount($dish_id))?($this->get_discount($dish_id)):$dish->price;
        $options = $dish->options;
        $count = request()->index;
        $option_ids = request()->option_id_arr;
        $option_id_arr = explode(',', $option_ids);//dd($option_id_arr);

        $items_id = request()->items_id;

        $selecteds = request()->selecteds;// for example: ['', '38', '46,50']
        $slt_items = array();
        $i = 0;
        foreach($selecteds as $selected) {

            $items_id_arr = explode(',', $selected);

            if($items_id_arr[0]) {
                $op_id = Item::where('id', $items_id_arr[0])->pluck('option_id');
                $slt_items[$i]['display_name_en'] = Option::where('id', $op_id)->pluck('display_name_en')->first();
                $slt_items[$i]['display_name_cn'] = Option::where('id', $op_id)->pluck('display_name_cn')->first();
                $slt_items[$i]['display_name_jp'] = Option::where('id', $op_id)->pluck('display_name_jp')->first();
                $slt_items[$i]['items_id_arr'] = $items_id_arr;

                $j = 0;
                foreach($items_id_arr as $its_id) {
                    $it = Item::select('name', 'price', 'image')->where('id', $its_id)->get()->first();
                    $slt_items[$i][$j]['name'] = $it->name;
                    $slt_items[$i][$j]['price'] = $it->price;
                    $slt_items[$i][$j]['image'] = $it->image;
                    $j++;
                }

                $i++;
            }

        }
//        $option = Option::find($option_id_arr[$count]);
//        $items = Item::where('option_id', $option_id_arr[$count])->get();
//        $count ++;
//        dd($next_option);
        return (string)view('part.dish_option_confirm', compact('count', 'option_id_arr', 'option_ids', 'dish_id', 'items_id', 'dish', 'options', 'slt_items'))->render();

    }

    //order dish save when photo_visible is 0
    public function order_dish()
    {
        $order_id = request()->order_id;
        $dish_id = request()->dish_id;
        $count = (int)(request()->count);
        $dish = Dish::find($dish_id);
        $items_id = request()->items_id;

        //save to order_dish_match table
        $order_dish = new OrderDish();
        $order_dish->order_id = $order_id;
        $order_dish->dish_id = $dish_id;
        $order_dish->count = $count;

        $order_dish->dish_price = ($this->get_discount($dish_id))?($this->get_discount($dish_id)):$dish->price;
        $order_dish->ready_flag = 0;
        $order_dish->save();

        //save to order_option_match table
        $order_dish_id = $order_dish->id;
        $items_price = 0;

        foreach($items_id as $item_id) {
            if($item_id != "") {
                $order_option = new OrderOption();
                $order_option->order_dish_id = $order_dish_id;
                $order_option->option_id = Item::where('id', $item_id)->pluck('option_id')->first();
                $order_option->item_id = $item_id;
                $order_option->item_price = Item::where('id', $item_id)->pluck('price')->first();
                $items_price += $order_option->item_price;
                $order_option->save();
            }
        }

        //save total price
        $order_dish = OrderDish::find($order_dish_id);
        $order_dish->total_price = ($order_dish->dish_price + $items_price) * $count;
        $order_dish->save();

        //broadcast to kitchen
        $added_dish = $this->get_added_dish($dish, $order_id, $order_dish_id);
        broadcast(new KitchenEvent($added_dish));

//        return (string)view('part.dish_info', compact('dish', 'options', 'count', 'option_count', 'option_id_arr', 'items'))->render();
    }

    //order dish save when photo_visible is 1
    public function orderNow_Photo()
    {
        $order_id = request()->order_id;
        $dish_id = request()->dish_id;
        $count = (int)(request()->count);
        $selected_items_id = request()->selected_items_id;
        $items_str = '';
        foreach($selected_items_id as $selected) {
            if($selected != "") {
                $items_str .= $selected.",";
            }
        }
        if($items_str != '') {
            $items_str = substr($items_str, 0, -1);
            $items_id = explode(",", $items_str);
        }

        $dish = Dish::find($dish_id);
        //save to order_dish_match table
        $order_dish = new OrderDish();
        $order_dish->order_id = $order_id;
        $order_dish->dish_id = $dish_id;
        $order_dish->count = $count;

        $order_dish->dish_price = ($this->get_discount($dish_id))?($this->get_discount($dish_id)):$dish->price;
        $order_dish->ready_flag = 0;
        $order_dish->save();

        //save to order_option_match table
        $order_dish_id = $order_dish->id;
        $items_price = 0;
        if($items_str != '') {
            foreach($items_id as $item_id) {
                $order_option = new OrderOption();
                $order_option->order_dish_id = $order_dish_id;
                $order_option->option_id = Item::where('id',$item_id)->pluck('option_id')->first();
                $order_option->item_id = $item_id;
                $order_option->item_price = Item::where('id',$item_id)->pluck('price')->first();
                $items_price += $order_option->item_price;
                $order_option->save();
            }
        }
//        else {
//            $order_option = new OrderOption();
//            $order_option->order_dish_id = $order_dish_id;
//            $order_option->option_id = Null;
//            $order_option->item_id = Null;
//            $order_option->item_price = Null;
//            $items_price = 0;
//            $order_option->save();
//        }

        //save total price
        $order_dish = OrderDish::find($order_dish_id);
        $order_dish->total_price = ($order_dish->dish_price + $items_price) * $count;
        $order_dish->save();

        //broadcast to kitchen
        $added_dish = $this->get_added_dish($dish, $order_id, $order_dish_id);
        broadcast(new KitchenEvent($added_dish));

//        return $aaa;
    }

    //lang_select
    public function lang_select() {

        $lang_data = array(0=>'English', '普通話', '日本語');
        $lang_id = request()->session()->get('language');
        return (string)view('customer.lang_select', compact('lang_data', 'lang_id'))->render();
    }

    public function put_lang() {

        $language = request()->checked_lang;
        request()->session()->put('language', $language);
        return ;
    }

    //feedback
    public function feedback() {

        $order_id = request()->order_id;
        $feedback = Order::where('id', $order_id)->get()->first();
//        dd($feedback);
        return (string)view('customer.feedback', compact('feedback'))->render();
    }

    public function add_review() {

        $order_id = request()->order_id;
        $review_type = request()->review_type;
        $review = request()->review;
        $order = Order::findOrFail($order_id);
        $order->review_type = $review_type;
        $order->review = $review;
        $order->save();

        //show count_notification on reception screen
        $count_notification = $this->CountNotification();
        broadcast(new NotificationEvent($count_notification));

        return $order;
    }

    //calling
    public function calling() {

        $table_id = request()->table_id;
        $orderTable = OrderTable::where('table_id', $table_id)->first();
        $order_ids = OrderTable::where('table_id', $table_id)->pluck('order_id');
        if($orderTable->calling_time == Null) {
            $now = $this->get_current_time();
            $orderTable->calling_time = $now;
            $orderTable->attend_time = Null;

            OrderTable::whereIn('order_id', $order_ids)->update(['calling_time' => $now]);
            OrderTable::whereIn('order_id', $order_ids)->update(['attend_time' => Null]);

        } else {
            $orderTable->calling_time = Null;
            $orderTable->attend_time = Null;
            OrderTable::whereIn('order_id', $order_ids)->update(['calling_time' => Null]);
            OrderTable::whereIn('order_id', $order_ids)->update(['attend_time' => Null]);
        }
        $orderTable->save();

        //show count_notification on reception screen
        $count_notification = $this->CountNotification();
        broadcast(new NotificationEvent($count_notification));

        return $orderTable->calling_time;
    }

    //view bill pay
    public function view_bill_pay() {

        $order_id = request()->order_id;
        $table_ids = OrderTable::where('order_id', $order_id)->pluck('table_id');
        $table_name = '';
        foreach($table_ids as $table_id) {
            $tb_name = $this->get_table_name($table_id);//dd($tb_name);
            $table_name .= $tb_name . " + ";
        }
        $table_name = substr($table_name, 0, -3);
        $starting_time = Order::where('id', $order_id)->pluck('time')->first();

        $order_dishes = OrderDish::where('order_id', $order_id)->get();

        $total = 0;
        foreach($order_dishes as $order_dish) {

            $dish_list = Dish::select('name_en')->where('id', $order_dish->dish_id)->get()->first();

            if(request()->session()->has('language')) {
                if(request()->session()->get('language') == 1)
                    $order_dish->dish_name = Dish::where('id', $order_dish->dish_id)->pluck('name_cn')->first();
                elseif(request()->session()->get('language') == 2)
                    $order_dish->dish_name = Dish::where('id', $order_dish->dish_id)->pluck('name_jp')->first();
                else
                    $order_dish->dish_name = Dish::where('id', $order_dish->dish_id)->pluck('name_en')->first();
            } else {
                $order_dish->dish_name = Dish::where('id', $order_dish->dish_id)->pluck('name_en')->first();
            }

            $order_dish->dish_name_cn = $dish_list->name_cn;
            $order_dish->dish_name_jp = $dish_list->name_jp;
            $order_dish->dish_name_en = $dish_list->name_en;

            $order_dish->options = $order_dish->Order_Option()->get();
            $items_price = 0;
            foreach ($order_dish->options as $option) {

                if($option->option_id) {
                    if(request()->session()->has('language')) {
                        if(request()->session()->get('language') == 1)
                            $option->option_name = Option::where('id', $option->option_id)->pluck('display_name_cn')->first();
                        elseif(request()->session()->get('language') == 2)
                            $option->option_name = Option::where('id', $option->option_id)->pluck('display_name_jp')->first();
                        else
                            $option->option_name = Option::where('id', $option->option_id)->pluck('display_name_en')->first();
                    } else {
                        $option->option_name = Option::where('id', $option->option_id)->pluck('display_name_en')->first();
                    }
                }
                else
                    $option->option_name = '';

                if($option->item_id) {

                    $option_items = Item::select('name', 'price')->where('id', $option->item_id)->get()->first();
                    $option->item_name = $option_items->name;
                    $items_price += $option_items->price;
                }
                else {
                    $option->item_name = '';
                    $items_price = 0;
                }

            }
            $order_dish->each_price = $order_dish->dish_price + $items_price;
            $order_dish->sub_total = $order_dish->each_price * $order_dish->count;
            $total += $order_dish->sub_total;
        }

        $gst = Receipt::profile()->gst;
        $gst_price = $total * $gst/100;
        $without_gst_price = $total - $gst_price;

//        dd($order_dishes);

        return (string)view('customer.view_bill_pay', compact('table_name', 'starting_time', 'order_dishes', 'total', 'gst_price', 'without_gst_price'))->render();
    }

    public function finish_pay() {

        $order_id = request()->order_id;
        $order = Order::findOrFail($order_id);
        $order->pay_flag = 1;
        $order->save();

        $table_name = request()->table_name;
        $starting_time = request()->starting_time;
        $total = request()->total;
        $without_gst_price = request()->without_gst_price;
        $gst_price = request()->gst_price;

        //show count_notification on reception screen
        $count_notification = $this->CountNotification();
        broadcast(new NotificationEvent($count_notification));

        return (string)view('customer.view_pay', compact('table_name', 'starting_time', 'total', 'gst_price', 'without_gst_price'))->render();
    }
}