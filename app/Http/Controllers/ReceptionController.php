<?php

namespace App\Http\Controllers;

use App\Events\ChangeCountEvent;
use App\Events\KitchenEvent;
use App\Model\Mail;
use Illuminate\Http\Request;

use App\Events\NotificationEvent;
use App\Events\PayEvent;
use App\Events\AttendEvent;

use App\Model\Category;
use App\Model\Order;
use App\Model\OrderPay;
use App\Model\OrderTable;
use App\Model\Payment;
use App\Model\Receipt;
use App\Model\Table;
use App\Model\OrderDish;
use App\Model\OrderOption;
use App\Model\Dish;
use App\Model\Option;
use App\Model\Item;
use App\Model\Room;

use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;

class ReceptionController extends Controller
{

    public $printerIp = '192.168.192.150';
    public $printerPort = 9100;

    //reception main screen ============================================================================================
    //seated   : order.status = seated;
    //waiting  : order.status = waiting; (calling_time is not null)
    //bookings : order.status = booking;

    public function seated()
    {

        $status = (request()->get('status'));
        switch($status){
            case 'seated'://seated
                $order_side_obj = Order::where('pay_flag', '<>', 2)->where('status', 'seated')->get();
                break;
            case 'waiting'://waiting
                $order_ids = OrderTable::where('calling_time', '<>', Null)->pluck('order_id');
                if($order_ids){
                    $order_side_obj = Order::where('pay_flag', '<>', 2)->whereIn('id', $order_ids)->get();}
                else
                    $order_side_obj = collect();
                break;
            case 'booking'://booking
                $order_side_obj = Order::where('pay_flag', '<>', 2)->where('status', 'booking')->get();
                break;
        }

        $order_obj = Order::where('pay_flag', '<>', 2)->get();
        $table_obj = Table::get();
//        $table_obj->load(['order' => function ($q) {
//            $q->where('pay_flag', null);
//        }]);
        $order_tables = array();

        foreach($order_obj as $order)
        {
            if(count($order->ordertables) > 0){
                foreach ($order->ordertables as $ordertables) {
                    $order_tables[] = $ordertables['table_id'];
                }
            }
        }

        $order_side_obj = $this->get_order_obj($order_side_obj);

        foreach($table_obj as $table) {
            if(count($table->order) > 0)
                $table->display_time = $this->get_time_data(substr($table->order[0]->time, 11, 5));
        }

        $room_size = Room::find(1);

//        dd($order_side_obj);
//        dd($table_obj[13]->order);
//        dd(count($order_obj));
        return view('reception.seated')->with(compact('order_tables', 'table_obj', 'order_obj', 'order_side_obj', 'room_size', 'status'));
    }

    //Booking part
    public function booking()
    {

        $table_id = request()->table_id;//dd($table_id);
    }

    // create customer part ===========================================================================================
    public function addCustomer()
    {
        $order_obj = Order::get();
        $table_obj = Table::get();
        $order_tables = array();
        $order_get = array();
        $orders = array();
        $table_ids = array();
        $table_id = request()->get('table_id');
        $order_id = request()->get('order_id');
        $status = request()->get('status');
        foreach($order_obj as $order){
            if(count($order->ordertables) > 0){
                foreach ($order->ordertables as $ordertables) {
                    $order_tables[] = $ordertables['table_id'];
                }
            }
        }
        if($order_id > 0){
            $order_get = Order::find($order_id);
            $order_table_obj = OrderTable::where('order_id', $order_id)->get()->toArray();
            foreach ($order_table_obj as $order) {
                $table_ids[] = $order['table_id'];
            }
        }

        foreach($table_obj as $table) {
            if(count($table->order) > 0)
                $table->display_time = $this->get_time_data(substr($table->order[0]->time, 11, 5));
        }

        if($table_id != 0)
            $table_display_name = $this->get_table_name($table_id);
        else
            $table_display_name = '';

        $default_duration_id = $this->get_default_duration_id();

//        dd($table_ids);

        $room_size = Room::find(1);

        return view('reception.addCustomer')->with(compact('order_tables', 'table_ids', 'table_obj', 'order_get', 'table_id', 'order_id', 'orders', 'table_display_name', 'default_duration_id', 'room_size', 'status'));
    }

    public function store()
    {
        if(request()->get('order_id') > 0)  //edit
        {
            $order_obj = Order::find(request()->get('order_id'));
            $order_obj->time = request()->get('time');
            $order_obj->guest = request()->get('guest_number');
            $order_obj->duration = request()->get('duration');
            $order_obj->customer_name = request()->get('customer_name');
            $order_obj->contact_number = request()->get('contact_number');
            $order_obj->email = request()->get('email_address');
            $order_obj->note = request()->get('customer_notes');
            $status = request()->get('status');
            $order_obj->status = $status;
            $order_obj->update();
            OrderTable::where('order_id',request()->get('order_id'))->delete();
            $table_ids = request()->get('table_id');
            $table_id_arr = explode(',', $table_ids);
            foreach ($table_id_arr as $id) {
                $order_table_obj = new OrderTable();
                $order_table_obj->order_id = request()->get('order_id');
                $order_table_obj->table_id = $id;
                $order_table_obj->save();
            }
        }
        else  //add
        {
            $order_obj = new Order();
            $order_obj->time = request()->get('time');
            $order_obj->guest = request()->get('guest_number');
            $order_obj->duration = request()->get('duration');
            $order_obj->customer_name = request()->get('customer_name');
            $order_obj->contact_number = request()->get('contact_number');
            $order_obj->email = request()->get('email_address');
            $order_obj->note = request()->get('customer_notes');
            $status = request()->get('status');
            $order_obj->status = $status;
            $order_obj->save();
            $table_ids = request()->get('table_id');
            $table_id_arr = explode(',', $table_ids);
            $table_name = '';
            foreach ($table_id_arr as $id) {
                $table_name .= $this->get_table_name($id).'+';
                $order_table_obj = new OrderTable();
                $order_table_obj->order_id = $order_obj->id;
                $order_table_obj->table_id = $id;
                $order_table_obj->save();
            }
            $table_name = rtrim($table_name, '+');
            Order::where('id', $order_obj->id)->update(['table_name' => $table_name]);
        }

        return redirect()->route('reception.seated', ['status'=>$status]);
    }

    //ready to pay part =============================================================================
    public function ready_to_pay() {

        $order_obj = Order::where('pay_flag', 1)->get();
        $table_obj = Table::get();
        $order_obj = $this->get_order_obj($order_obj);
        foreach($order_obj as $orderObj) {
            $count_calling = 0;
            foreach($orderObj->ordertables as $orderTable) {
                if($orderTable->calling_time != Null)
                    $count_calling +=1;
            }
            $orderObj->calling_count = $count_calling;
        }
        return view('reception.ready_to_pay')->with(compact('order_obj'));
    }

    //view calling screen ===========================================================================
    public function view_calling() {

        if(request()->table_id != 0) {

//            $table_id = request()->table_id;
//            $now = $this->get_current_time();
//            $order_id = OrderTable::where('table_id', $table_id)->pluck('order_id');
//            OrderTable::where('order_id', $order_id)->update(['attend_time' => $now]);

            $table_id = request()->table_id;
            $order_id = OrderTable::where('table_id', $table_id)->pluck('order_id');
            OrderTable::where('order_id', $order_id)->update(['calling_time' => Null]);

            broadcast(new AttendEvent($order_id));
            $count_notification = $this->CountNotification();
            broadcast(new NotificationEvent($count_notification));
        }

        $order_obj = collect();
        $order_ids = OrderTable::where('calling_time', '<>', null)->orderBy('calling_time', 'DESC')->pluck('order_id');
        if(count($order_ids) > 0) {
            $order_id_text = $this->get_order_ids($order_ids);
            $order_obj = Order::where('pay_flag', '<>', 2)->whereIn('id', $order_ids)->orderByRaw('FIELD (id, ' . implode(',', $order_id_text) . ') DESC')->get();
            $order_obj = $this->get_order_obj($order_obj);//dd($order_obj);
            foreach ($order_obj as $orderObj) {
                foreach ($orderObj->ordertables as $orderTable) {
                    if ($orderTable->calling_time != Null) {
                        $orderObj->calling_time = $orderTable->calling_time;
                        if ($orderTable->attend_time != Null) {
                            $orderObj->attend_time = $orderTable->attend_time;
                            $orderObj->attended_time = intval(strtotime($orderObj->attend_time) - strtotime($orderObj->calling_time));
                        } else {
                            $orderObj->attend_time = Null;
                        }
                        $orderObj->calling_table_id = $orderTable->table_id;
                    }
                }
            }
        }

//        dd($order_obj);
        return view('reception.view_calling')->with(compact('order_obj'));

    }

    //view review screen==============================================================================
    public function view_review() {

        $order_obj = Order::where('pay_flag', '<>', 2)->where('review', '!=', Null)->get();
        $table_obj = Table::get();
        $order_obj = $this->get_order_obj($order_obj);
        foreach($order_obj as $orderObj) {
            $count_calling = 0;
            foreach($orderObj->ordertables as $orderTable) {
                if($orderTable->calling_time != Null)
                    $count_calling +=1;
            }
            $orderObj->calling_count = $count_calling;
        }
        return view('reception.view_review')->with(compact('order_obj'));
    }

    //view note screen=================================================================================
    public function view_note() {

        $order_obj = Order::where('pay_flag', '<>', 2)->where('note', '!=', Null)->get();
        $table_obj = Table::get();
        $order_obj = $this->get_order_obj($order_obj);
        foreach($order_obj as $orderObj) {
            $count_calling = 0;
            foreach($orderObj->ordertables as $orderTable) {
                if($orderTable->calling_time != Null)
                    $count_calling +=1;
            }
            $orderObj->calling_count = $count_calling;
        }
//        dd($order_obj[0]->ordertables);
        return view('reception.view_note')->with(compact('order_obj', 'count_calling'));
    }

    //accounting part =======================================================================================================
    public function accounting() {

        $order_id = request()->order_id;
        $order_data = Order::select('customer_name', 'time', 'duration', 'guest', 'status')->where('id', $order_id)->get()->first();
        $customer_name = $order_data->customer_name;
        $time = $order_data->time;
        $starting_time = $this->get_time_data(substr($time, 11, 5));
        $duration_time = $this->customers[$order_data->duration];
        $duration = $order_data->duration;
        $during_time = $this->get_during_minutes($time);
        $guest = $order_data->guest;
        $status = $order_data->status;

        $table_ids = OrderTable::where('order_id', $order_id)->pluck('table_id');
        $table_name = array();
        foreach($table_ids as $table_id) {
            $tb_name = $this->get_table_name($table_id);//dd($tb_name);
            $table_name[] = $tb_name;
        }

        $order_dishes = OrderDish::where('order_id', $order_id)->get();

        $total = 0;
        foreach($order_dishes as $order_dish) {

            $dish_list = Dish::select('name_en')->where('id', $order_dish->dish_id)->get()->first();
            $order_dish->dish_name_en = $dish_list->name_en;

            $order_dish->options = $order_dish->Order_Option()->get();
            $items_price = 0;
            foreach ($order_dish->options as $option) {
//                $option->option_name = Option::where('id', $option->option_id)->pluck('name')->first();
//                $option_items = Item::select('name', 'price')->where('id', $option->item_id)->get()->first();
//                $option->item_name = $option_items->name;
//                $items_price += $option_items->price;

                if($option->option_id)
                    $option->option_name = Option::where('id', $option->option_id)->pluck('name')->first();
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

        $payment_method = Payment::orderBy('sort')->get();

        return view('reception.accounting')->with(compact('order_id', 'customer_name', 'starting_time', 'duration_time', 'duration', 'time', 'during_time', 'guest', 'status', 'table_name', 'order_dishes', 'total', 'gst_price', 'without_gst_price', 'gst', 'payment_method'));
    }

    public function cancel_bill() {

        $order_id = request()->order_id;
        $order = Order::findOrFail($order_id);
        $order->pay_flag = 0;
        $order->save();

        $count_notification = $this->CountNotification();
        broadcast(new NotificationEvent($count_notification));

        return $this->ready_to_pay();
    }

    public function amend() {

        $order_id = request()->order_id;
        $order_dish_id = request()->order_dish_id;
        $count = OrderDish::where('id', $order_dish_id)->pluck('count')->first();

        $categories = Category::get()->toArray();
        $dishes = array();
        if(count($categories) > 0){
            $category_record = Category::find($categories[0]['id']);
            $dishes = $category_record->dishes;
            foreach($dishes as $dish){
                $dish->discount = ($this->get_discount($dish->id))?($this->get_discount($dish->id)):'';
                $dish->options = $dish->options()->get();
                foreach($dish->options as $option){
                    $option->item = Item::where('option_id', $option->id)->get();
                }
            }
        }

        $category_all = array();
        foreach ($categories as $category) {
            $category_all[$category['id']] = $category;
            if($category['has_subs'] == 1){
                $sub_categories = Category::where('parent_id', $category['id'])->get()->toArray();
                $category_all[$category['id']]['children'] = $sub_categories;
            }
        }
        return view('reception.add_item')->with(compact('order_id', 'category_all', 'dishes', 'order_dish_id', 'count'));

    }

    public function add_item() {

        $select_list = request()->select_list;
        $items_id = array();
        for($i=0;$i<count($select_list);$i++) {
            $selected_item = explode(":", $select_list[$i]);
            $dish_id = $selected_item[0];
            array_push($items_id, $selected_item[1]);
        }

        $order_id = request()->order_id;
        $count = request()->qty;
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
        foreach($items_id as $item_id) {
            $order_option = new OrderOption();
            $order_option->order_dish_id = $order_dish_id;
            $order_option->option_id = Item::where('id',$item_id)->pluck('option_id')->first();
            $order_option->item_id = $item_id;
            $order_option->item_price = Item::where('id',$item_id)->pluck('price')->first();
            $items_price += $order_option->item_price;
            $order_option->save();
        }

        //save total price
        $order_dish = OrderDish::find($order_dish_id);
        $order_dish->total_price = ($order_dish->dish_price + $items_price) * $count;
        $order_dish->save();

        //display changed data
        $order_dishes = OrderDish::where('order_id', $order_id)->get();

        foreach($order_dishes as $order_dish) {

            $dish_list = Dish::select('name_en')->where('id', $order_dish->dish_id)->get()->first();
            $order_dish->dish_name_en = $dish_list->name_en;

            $order_dish->options = $order_dish->Order_Option()->get();
            $items_price = 0;
            foreach ($order_dish->options as $option) {

                if($option->option_id)
                    $option->option_name = Option::where('id', $option->option_id)->pluck('name')->first();
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
        }

        //broadcast to kitchen
        $added_dish = $this->get_added_dish($dish, $order_id, $order_dish_id);
        broadcast(new KitchenEvent($added_dish));

//        return (string)view('reception.item_list', compact('order_dishes'))->render();
        return $order_id;
    }

    public function change_count()
    {
        $order_id = request()->order_id;
        $order_dish_id = request()->order_dish_id;
        $amend_count = request()->qty;
        $count = OrderDish::where('id', $order_dish_id)->pluck('count')->first() + $amend_count;
        $amend_time = $this->get_current_time();

        OrderDish::where('id', $order_dish_id)->update(['amend_count' => $amend_count, 'count' => $count, 'amend_time'=>$amend_time]);

        $items_price = OrderOption::where('order_dish_id', $order_dish_id)->sum('item_price');

        //save total price
        $order_dish = OrderDish::find($order_dish_id);
        $order_dish->total_price = ($order_dish->dish_price + $items_price) * $count;
        $order_dish->save();

        //broadcast to kitchen
        $dish_id = OrderDish::where('id', $order_dish_id)->pluck('dish_id')->first();
        $group_id = Dish::where('id', $dish_id)->pluck('group_id');
        broadcast(new ChangeCountEvent($group_id));

//        return $added_dish;

    }

    public function dish_list()
    {
        $category = Category::find(request()->category);
        $dishes = $category->dishes;
        foreach($dishes as $dish){
            $dish->discount = ($this->get_discount($dish->id))?($this->get_discount($dish->id)):'';
            $dish->options = $dish->options()->get();
            foreach($dish->options as $option){
                $option->item = Item::where('option_id', $option->id)->get();
            }
        }
        return (string)view('reception.dish_list', compact('dishes'))->render();
    }

    public function tip() {

        return view('reception.tip');
    }

    public function discount() {

        return view('reception.discount');
    }

    public function pay() {

        $order_id = request()->order_id;
        $count = OrderPay::where('order_id', $order_id)->get()->count();//dd($count);
//        if($count > 0) {
//            $orderPay = OrderPay::where('order_id', $order_id)->get()->first();
//            $orderPay->tip = request()->get('tip');
//            $orderPay->sub_total = request()->get('sub_total');
//            $orderPay->discount = request()->get('discount');
//            $orderPay->total = request()->get('total');
//            $orderPay->without_gst = request()->get('without_gst');
//            $orderPay->gst = request()->get('gst');
//            $orderPay->pay_method = request()->get('pay_method');
//            $orderPay->balance = request()->get('balance');
//            $orderPay->amount = request()->get('amount');
//            $orderPay->change = request()->get('change');
//            $orderPay->update();
//        } else {
        $orderPay = new OrderPay();
        $orderPay->order_id = request()->get('order_id');
        $orderPay->tip = request()->get('tip');
        $orderPay->sub_total = request()->get('sub_total');
        $orderPay->discount = request()->get('discount');
        $orderPay->total = request()->get('total');
        $orderPay->without_gst = request()->get('without_gst');
        $orderPay->gst = request()->get('gst');
        $orderPay->pay_method = request()->get('pay_method');
        $orderPay->balance = request()->get('balance');
        $orderPay->amount = request()->get('amount');
        $orderPay->change = request()->get('change');
        $orderPay->save();
        OrderPay::where('order_id', Null)->delete();
//        }

        Order::where('id', $order_id)->update(['pay_flag' => 2]);
        OrderTable::where('order_id', $order_id)->delete();

        //show pay finish status on customer
        $pay_status = 'pay_'.$order_id;
        broadcast(new PayEvent($pay_status));

//        return 'success';
        return redirect()->route('reception.seated', ['status'=>'seated']);
    }

    public function print() {

        $profile = Receipt::profile();
        $logo_image_name = $profile->logo_image;
        $title = "TAX INVOICE";
        $address = $profile->address;
        $tel = "TEL : ".$profile->phone;
        $abn = "ABN : ".$profile->abn;

        $order_id = request()->get('order_id');
        $table_ids = OrderTable::where('order_id', $order_id)->pluck('table_id');
        $table_name = "";
        foreach($table_ids as $table_id) {
            $table_name .= $this->get_table_name($table_id).'+';
        }
        $table_name = rtrim($table_name, '+');
        $guest = Order::where('id', $order_id)->pluck('guest')->first();
        $table = "   Table  : ".$table_name." (".$guest." Guests)";
        $current_date = date('d F Y');
        $current_time = date('H:i:s');
        $day = date("D", strtotime($current_date));
        $date = "   Date   : ".$day.", ".$current_date.", ".$current_time;

        $tip = request()->get('tip');
        $sub_total = request()->get('sub_total');
        $discount = request()->get('discount');
        $total = request()->get('total');
        $without_gst = request()->get('without_gst');
        $gst = request()->get('gst');
        $pay_method = request()->get('pay_method');
        $balance = request()->get('balance');
        $amount = request()->get('amount');
        $change = request()->get('change');

        //print part
        $connector = new NetworkPrintConnector($this->printerIp, $this->printerPort);
        $printer = new Printer($connector);

        try {
            //Print top logo
            $printer->setJustification(Printer::JUSTIFY_CENTER);
//            $logo_image = EscposImage::load("receipt/$logo_image_name", false);
            $logo_image = EscposImage::load("receipt/img1.png");
            $printer->graphics($logo_image, 3 | 2);

            $printer->setFont(Printer::FONT_A);

            $printer->setTextSize(3,2);//1~8 of width and height, can change textsize
            $printer->setEmphasis(true);
            $printer->text("$title\n");

            $printer->setTextSize(1,1);

            $printer->setEmphasis(false);
            $printer->text("$address\n");
            $printer->text("$tel\n");
            $printer->text("$abn\n");

            $printer->setEmphasis(true);
            $printer->text("----------------------------------------------\n");

            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->setEmphasis(false);
            $printer->text("$table\n");
            $printer->text("$date\n");

            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->setEmphasis(true);
            $printer->text("----------------------------------------------\n");

            $printer->setJustification(Printer::JUSTIFY_LEFT);

            // loop
            $line = sprintf('%-40.40s %1.0s %1.0s %1.0s', "Description", "Price", "Qty", "Total");
            $printer->text($line);
            $printer->text(".............................................\n");
//            $line1 = sprintf('%-40.40s %5.0f %13.2f %13.2f', "ASAHI SUPER DRY REGULAR", "$8.80", "1", "$8.80");
//            $printer->text($line1);
//            $line2 = sprintf('%-40.40s %5.0f %13.2f %13.2f', "ASAHI SUPER DRY BLACK", "$10.00", "2", "$20.00");
//            $printer->text($line2);
            // end loop

            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->setEmphasis(true);
            $printer->text("----------------------------------------------\n");



            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->setEmphasis(true);
            $printer->text("----------------------------------------------\n");

            $printer->setEmphasis(false);
            $printer->text("Thank you for choosing\n");

            $printer->setTextSize(3,2);
            $printer->setEmphasis(true);
            $printer->text("Nishiki AN\n");

            $printer->setEmphasis(false);
            $printer->text("Operator Reception / No : JB10CB10\n");

            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->setEmphasis(true);
            $printer->text("----------------------------------------------\n");

            $printer->cut();
        } finally {
            $printer -> close();
        }

        return $order_id;
    }

    //edit order part ==================================================================================================
    public function editOrder() {

        $order_id = request()->order_id;
        $booking_order = $this->get_booking_order($order_id);
        return (string)view('reception.editOrder', compact('booking_order'))->render();
    }

    public function edit_note_review() {

        $order_id = request()->order_id;
        $note = request()->note;
        $review_type = request()->review_type;
        $review = request()->review;
        Order::where('id', $order_id)->update(['note' => $note, 'review_type' => $review_type, 'review' => $review]);

        $count_notification = $this->CountNotification();
        broadcast(new NotificationEvent($count_notification));

    }

    //attend calling in booking order edit part
    public function attend_book() {

        $order_id = request()->order_id;
//        $now = $this->get_current_time();
//        OrderTable::where('order_id', $order_id)->update(['attend_time' => $now]);
        OrderTable::where('order_id', $order_id)->update(['calling_time' => Null]);

        $orderid[0] = $order_id;

        broadcast(new AttendEvent($orderid));
        $count_notification = $this->CountNotification();
        broadcast(new NotificationEvent($count_notification));

    }

    public function editOrder1() {

        $order_id = request()->order_id;

        $order_dishes = OrderDish::where('order_id', $order_id)->get();

        $total = 0;
        foreach($order_dishes as $order_dish) {

            $dish_list = Dish::select('name_en')->where('id', $order_dish->dish_id)->get()->first();
            $order_dish->dish_name = Dish::where('id', $order_dish->dish_id)->pluck('name_en')->first();
            $order_dish->dish_name_en = $dish_list->name_en;

            $order_dish->options = $order_dish->Order_Option()->get();
            $items_price = 0;
            foreach ($order_dish->options as $option) {

                if($option->option_id) {
                    $option->option_name = Option::where('id', $option->option_id)->pluck('display_name_en')->first();
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

//        dd($order_dishes);
        return (string)view('reception.editOrder1', compact('order_dishes', 'order_id'))->render();
    }

    public function order_info_edit() {

        $order_qty_info = request()->order_qty_info;
        $id = '';
        $qty = '';
        $sub_total = '';
        foreach($order_qty_info as $item)
        {
            $item_info = explode('-', $item);
            $id = $item_info[0];
            $qty = $item_info[1];
            $sub_total = substr($item_info[2], 1);
            OrderDish::where('id', $id)->update(['count' => $qty, 'total_price' => $sub_total]);

            //broadcast to kitchen
            $dish_id = OrderDish::where('id', $id)->pluck('dish_id');
            $group_id = Dish::where('id', $dish_id)->pluck('group_id');
            broadcast(new ChangeCountEvent($group_id));
        }

        return $order_qty_info;
    }

    //========================================================================
    //get order info
    public function get_order_obj($order_obj) {

        $order_tables = array();

        foreach($order_obj as $order)
        {
            $table_display_names = array();
            $table_order_names = array();
            if(count($order->ordertables) > 0){
                foreach ($order->ordertables as $ordertables) {
                    $order_tables[] = $ordertables['table_id'];
                    $table_display_names[] = $this->get_table_name($ordertables['table_id']);
                }
                $table_order_names[] = $this->get_table_name($order->ordertables[0]['table_id']);//get first table only in order
            }
            $order->display_time = $this->get_time_data(substr($order->time, 11, 5));
            $order->table_display_names = $table_display_names;
            $order->table_order_names = $table_order_names;
        }
//      dd($order_obj);
        return $order_obj;
    }

    public function get_order_ids($ids) {

        $order_ids = '';
        foreach($ids as $order_id) {
            $order_ids .= $order_id.',';
        }
        $order_id_text = [substr($order_ids, 0, -1)];
        return $order_id_text;
    }

    //get book order info ==========================================================================================
    public function get_booking_order($order_id) {

        $order_data = Order::where('id', $order_id)->get()->first();
        $customer_name = $order_data->customer_name;
        $starting_time = $order_data->time;
        $date = substr($starting_time, 0, 10);
        $time = $this->get_time_data(substr($starting_time, 11, 5));
        $duration = $order_data->duration;
        $duration_time = $this->customers[$duration];
        $guest = $order_data->guest;
        $note = $order_data->note;
        $review_type = $order_data->review_type;
        $review = $order_data->review;
        $pay_flag = $order_data->pay_flag;
        $status = $order_data->status;

        $order_table = OrderTable::where('order_id', $order_id)->get()->first();
        $calling_time = $order_table->calling_time;
        $attend_time = $order_table->attend_time;

        $table_ids = OrderTable::where('order_id', $order_id)->pluck('table_id');
        $table_name = array();
        foreach($table_ids as $table_id) {
            $tb_name = $this->get_table_name($table_id);//dd($tb_name);
            $table_name[] = $tb_name;
        }

        //============
        $booking_order = collect();
        $booking_order->order_id = $order_id;
        $booking_order->customer_name = $customer_name;
        $booking_order->starting_time = $starting_time;
        $booking_order->date = $date;
        $booking_order->time = $time;
        $booking_order->duration = $duration;
        $booking_order->duration_time = $duration_time;
        $booking_order->guest = $guest;
        $booking_order->note = $note;
        $booking_order->review_type = $review_type;
        $booking_order->review = $review;
        $booking_order->table_name = $table_name;
        $booking_order->pay_flag = $pay_flag;
        $booking_order->calling_time = $calling_time;
        $booking_order->attend_time = $attend_time;
        if($attend_time != null)
            $booking_order->attended_time = intval(strtotime($booking_order->attend_time)-strtotime($booking_order->calling_time));
        $booking_order->status = $status;

        return $booking_order;
    }

}
