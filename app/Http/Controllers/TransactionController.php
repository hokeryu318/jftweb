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

class TransactionController extends Controller
{
    //
    public function index()
    {
        //bookings : order.status = booking;

        $sort = "asc";

        if(request()->has('search_date')) {//by date change
            $search_date = request()->search_date;
            if(request()->d_s == 'up') {
                $search_date = date('Y-m-d', strtotime(' +1 day', strtotime($search_date)));
            } else if(request()->d_s == 'down') {
                $search_date = date('Y-m-d', strtotime(' -1 day', strtotime($search_date)));
            }
            $search_date = date('Y-m-d', strtotime($search_date));
        } else {//date nochange
            $search_date = date('Y-m-d', strtotime($this->get_current_time()));
        }
        $search_display_date = date("d M Y", strtotime($search_date));

        $daily_all_amount = 0;
        if(request()->get('sortType') == "asc"){

            $order_obj = OrderPay::whereDate('created_at', $search_date)->orderBy('created_at', 'asc')->get();
            if(count($order_obj) > 0) {
                foreach($order_obj as $order) {
                    $order->display_time = date_format($order->created_at,"h:i A");
                    $order->table_display_name = Order::where('id', $order->order_id)->pluck('table_name')->first();
                    $order->amount = $order->total;
                    $daily_all_amount += $order->amount;
                    $order->customer_name = Order::where('id', $order->order_id)->pluck('customer_name')->first();
                }
                $sort = "desc";
            }

        } else {

            $order_obj = OrderPay::whereDate('created_at', $search_date)->orderBy('created_at', 'desc')->get();
            if(count($order_obj) > 0) {
                foreach($order_obj as $order) {
                    $order->display_time = date_format($order->created_at,"h:i A");
                    $order->table_display_name = Order::where('id', $order->order_id)->pluck('table_name')->first();
                    $order->amount = $order->total;
                    $daily_all_amount += $order->amount;
                    $order->customer_name = Order::where('id', $order->order_id)->pluck('customer_name')->first();
                }
                $sort = "asc";
            }

        }

        //dd($order_obj);
        return view('admin.transaction.list')->with(compact('order_obj', 'search_display_date', 'sort', 'daily_all_amount'));
    }

    public function src_trans() {

        $src_date = request()->src_date;

        $order_obj = OrderPay::whereDate('created_at', $src_date)->orderBy('created_at', 'desc')->get();
        $daily_all_amount = 0;
        if(count($order_obj) > 0) {
            foreach($order_obj as $order) {
                $order->display_time = date_format($order->created_at,"h:i A");
                $order->table_display_name = Order::where('id', $order->order_id)->pluck('table_name')->first();
                $order->amount = $order->total;
                $daily_all_amount += $order->amount;
                $order->customer_name = Order::where('id', $order->order_id)->pluck('customer_name')->first();
            }
        }

        $sort = 'asc';
        $search_display_date = $src_date;
        return view('admin.transaction.src_list')->with(compact('order_obj', 'search_display_date', 'sort', 'daily_all_amount'));
    }

    public function reprint() {

        $profile = Receipt::profile();

        $printerIp = $profile->printer_ip;
        $printerPort = 9100;

        $logo_image_name = $profile->logo_image;
        $title = "TAX INVOICE";
        $address = $profile->address;
        $tel = "TEL : ".$profile->phone;
        $abn = "ABN : ".$profile->abn;
        $shop_name = $profile->shop_name;

        $order_id = request()->get('order_id');
        $table_name = Order::where('id', $order_id)->pluck('table_name')->first();
        $guest = Order::where('id', $order_id)->pluck('guest')->first();
        $table = "   Table  : ".$table_name." (".$guest." Guests)";
        $current_date = date('d F Y');
        $current_time = date('H:i:s');
        $day = date("D", strtotime($current_date));
        $date = "   Date   : ".$day.", ".$current_date.", ".$current_time;

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
                    $option->item_name = $option_items['name'];
                    $items_price += $option_items['price'];
                }
                else {
                    $option->item_name = '';
                    $items_price = 0;
                }
            }
            $order_dish->each_price = $order_dish->dish_price + $items_price;
            $order_dish->sub_total = $order_dish->each_price * $order_dish->count;
        }

        $order_pay = OrderPay::where('order_id', $order_id)->get()->first();
        $tip = $order_pay->tip;
        $sub_total = $order_pay->sub_total;
        $discount = $order_pay->discount;
        $total = $order_pay->total;
        $without_gst = $order_pay->without_gst;
        $gst = $order_pay->gst;
        $pay_method = $order_pay->pay_method;
        $balance = $order_pay->balance;
        $amount = $order_pay->amount;
        $change = $order_pay->change;

        //print part
        $connector = new NetworkPrintConnector($printerIp, $printerPort);
        $printer = new Printer($connector);

        try {
            //Print top logo
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $logo_image = EscposImage::load("receipt/logo.png");
            $printer->graphics($logo_image, 3 | 2);

            $printer->setFont(Printer::FONT_A);

            $printer->setTextSize(2,1);//1~8 of width and height, can change textsize
            $printer->setEmphasis(true);
            $printer->text("$title\n");

            $printer->setTextSize(1,1);

            $printer->setEmphasis(false);
            $printer->text("$address\n");
            $printer->text("$tel\n");
            $printer->text("$abn\n");

            $printer->setEmphasis(true);
            $printer->text("------------------------------------------------\n");

            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->setEmphasis(false);
            $printer->text("$table\n");
            $printer->text("$date\n");

            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->setEmphasis(true);
            $printer->text("------------------------------------------------\n");

            $printer->setJustification(Printer::JUSTIFY_LEFT);

            $printer->setEmphasis(false);
            $printer->text("Description                 Price   Qty Total   \n");
            $printer->text("................................................\n");

            foreach($order_dishes as $order_dish) {

                $dish_len = strlen($order_dish['dish_name_en']);
                $mod = fmod($dish_len, 23);
                if($mod > 0)
                    $line_count = (int)($dish_len / 23) + 1;
                else
                    $line_count = (int)($dish_len / 23);

                for($i=1;$i<=$line_count;$i++) {
                    if($dish_len > 23) {
                        if($i==1) {
                            $printer->text(substr($order_dish['dish_name_en'], 0, 23).'     '.str_pad('$'.sprintf('%0.2f', $order_dish['each_price']), 8, ' ', STR_PAD_RIGHT)
                                .str_pad($order_dish['count'], 4, ' ', STR_PAD_RIGHT).str_pad('$'.sprintf('%0.2f', $order_dish['sub_total']), 8, ' ', STR_PAD_RIGHT));
                        } else {
                            $printer->text("\n");
                            $printer->text(substr($order_dish['dish_name_en'], ($i-1)*23, 23).'     ');
                        }
                    } else {
                        $printer->text(str_pad($order_dish['dish_name_en'], 28, ' ', STR_PAD_RIGHT).str_pad('$'.sprintf('%0.2f', $order_dish['each_price']), 8, ' ', STR_PAD_RIGHT)
                            .str_pad($order_dish['count'], 4, ' ', STR_PAD_RIGHT).str_pad('$'.sprintf('%0.2f', $order_dish['sub_total']), 8, ' ', STR_PAD_RIGHT));
                    }

                }

                $printer->text("\n");
            }

            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->setEmphasis(true);
            $printer->text("------------------------------------------------\n");

            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->setEmphasis(false);
            $printer -> text(new print_table1('Sub Total(Inc GST)', '$'.sprintf('%0.2f', $sub_total)));
            $printer -> text(new print_table1('GST', '$'.sprintf('%0.2f', $gst)));

            $printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            $printer -> text(new print_table1('Grand Total', '$'.sprintf('%0.2f', $total)));
            $printer -> selectPrintMode();

            $printer -> text(new print_table1('Payment', '$'.sprintf('%0.2f', $amount)));
            $printer -> text(new print_table1('('.$pay_method.')', '$'.sprintf('%0.2f', $amount)));
            $printer -> text(new print_table1('Change Due', '$'.sprintf('%0.2f', $change)));

            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->setEmphasis(true);
            $printer->text("------------------------------------------------\n");

            $printer->setEmphasis(false);
            $printer->text("Thank you for choosing\n");

            $printer->setTextSize(2,1);
            $printer->setEmphasis(true);
            $printer->text("$shop_name\n");

            $printer->setTextSize(1,1);
            $printer->setEmphasis(false);
            $printer->text("Operator Reception / No : JB10CB10\n");

            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->setEmphasis(true);
            $printer->text("------------------------------------------------\n");

            $printer->cut();

        } finally {
            $printer -> close();
        }

        return $order_dishes;
    }

    public function sales_print() {
        return 111;
    }

}
