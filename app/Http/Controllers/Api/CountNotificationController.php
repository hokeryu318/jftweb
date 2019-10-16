<?php

namespace App\Http\Controllers\Api;

use App\Model\Kitchen;
use App\Model\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Events\KitchenDishReadyEvent;

use App\Model\Order;
use App\Model\OrderTable;
use App\Model\Dish;
use App\Model\OrderDish;
use App\Model\OrderOption;
use App\Model\Option;
use App\Model\Item;
use App\Model\Booked;
use App\Http\Controllers\print_table1;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;

class CountNotificationController extends Controller
{
    public function CountNotification()
    {

        $count_notification = array();

        //ready_pay_count
        $count_notification['ready_pay_count'] = Order::where('pay_flag', 1)->get()->count();

        //calling_count
        $count_notification['calling_count'] = OrderTable::where('calling_time', '<>', null)->distinct()->pluck('order_id')->count();

        //attend_count
        $count_notification['attend_count'] = OrderTable::where('calling_time', '<>', null)->where('attend_time', null)->distinct()->pluck('order_id')->count();

        //review_count
        $count_notification['review_count'] = Order::where('pay_flag',  '<>', 2)->where('review', '!=', Null)->get()->count();

        //note_count
        $count_notification['note_count'] = Order::where('pay_flag',  '<>', 2)->where('note', '!=', Null)->get()->count();

        //display count of seated and booking status
        $count_notification['seated'] = Order::where('pay_flag',  '<>', 2)->where('status', 'seated')->get()->count();

        $current_date = date('Y-m-d');
        $count_notification['bookings'] = Booked::where('timer_flag', 0)->where('time', '<=',$current_date . " 23:59:59" )
            ->where('time', '>=',$current_date . " 00:00:00" )->where('status', 'booking')->get()->count();

        return $count_notification;
    }

    public function get_change_group_dish($group_id)
    {

        $change_group_dish = array();
        $current_date = date('Y-m-d');
        $dish_id_list = Dish::where('group_id', 'like', '%&' . $group_id . '&%')->pluck('id');
        $order_dish_list = OrderDish::whereIn('dish_id', $dish_id_list)->where('ready_flag', '0')->whereDate('created_at', $current_date)->orderBy('created_at', 'ASC')->get();
        foreach($order_dish_list as $key => $order_dish)
        {
            //order info
            $order_id = $order_dish->order_id;
            $change_group_dish[$key]['order_id'] = $order_id;
            $change_group_dish[$key]['starting_time'] = Order::where('id', $order_id)->pluck('time')->first();

            //order table info
//            $display_table_list = OrderTable::where('order_id', $order_id)->get();
//            $change_group_dish[$key]['display_table_id'] = $display_table_list[0]->table_id;
//            $change_group_dish[$key]['display_table'] = $this->get_table_name($change_group_dish[$key]['display_table_id']);
//            $change_group_dish[$key]['table_count'] = count($display_table_list);
//            $change_group_dish[$key]['calling_time'] = OrderTable::where('table_id', $change_group_dish[$key]['display_table_id'])->pluck('calling_time');

            $table_name = Order::where('id', $order_id)->pluck('table_name')->first();
            $table_names = explode('+', $table_name);
            $change_group_dish[$key]['display_table_id'] = Table::where('name', $table_names[0])->pluck('id');
            $change_group_dish[$key]['display_table'] = $table_names[0];
            $change_group_dish[$key]['table_count'] = count($table_names);

            //order dish info
            $change_group_dish[$key]['id'] = $order_dish->id;
            $change_group_dish[$key]['dish_id'] = $order_dish->dish_id;
            $change_group_dish[$key]['count'] = $order_dish->count;
            $change_group_dish[$key]['dish_price'] = $order_dish->dish_price;
            $change_group_dish[$key]['total_price'] = $order_dish->total_price;
            $change_group_dish[$key]['ready_flag'] = $order_dish->ready_flag;

            //dish info
            $dish = Dish::where('id', $order_dish->dish_id)->get()->first();
            $change_group_dish[$key]['dish_name_en'] = $dish->name_en;
            $change_group_dish[$key]['dish_image'] = $dish->image;
            $change_group_dish[$key]['group_id'] = $dish->group_id;

            //option info
            $change_group_dish[$key]['options'] = $order_dish->Order_Option()->get();
            if($change_group_dish[$key]['options']) {
                for($i=0;$i < count($change_group_dish[$key]['options']);$i++)
                {
                    $change_group_dish[$key]['options'][$i]['option_name'] = Option::where('id', $change_group_dish[$key]['options'][$i]['option_id'])->pluck('name')->first();
                    $change_group_dish[$key]['options'][$i]['item_name'] = Item::where('id', $change_group_dish[$key]['options'][$i]['item_id'])->pluck('name')->first();
                }
            } else {
                $change_group_dish[$key]['options'] = [];
            }
        }

        return $change_group_dish;

    }

    public function ready(Request $request)
    {
        
        $orderdish = OrderDish::findOrFail($request->selected_id);
        if($orderdish->ready_flag == 1){
            $orderdish->ready_flag = 0;
            $orderdish->ready_time = Null;
            $orderdish->save();
        } else {
            $orderdish->ready_flag = 1;
            $orderdish->ready_time = $this->get_current_time();
            $orderdish->save();

            //print part
            //$printerIp = '192.168.192.151';
            $group_id = $request->group_id;
            $printerIp = Kitchen::where('id', $group_id)->pluck('printer_ip')->first();
            $printerPort = 9100;

            $ready_time = $orderdish->ready_time;
            $time = substr($ready_time,11);
            $date = strtoupper(date("d M Y", strtotime(substr($ready_time,0,10))));

            $qty = $orderdish->count;

            $order_id = $orderdish->order_id;
            $order = Order::where('id', $order_id)->get()->first();
            $table_name = $order->table_name;

            $dish_name = Dish::where('id',$orderdish->dish_id)->pluck('name_en')->first();

            $order_options = OrderOption::where('order_dish_id',$orderdish->id)->get();
            
            foreach($order_options as $order_option) {

                if($order_option->option_id)
                    $order_option->option_name = Option::where('id', $order_option->option_id)->pluck('name')->first();
                else
                    $order_option->option_name = '';

                if($order_option->item_id) 
                    $order_option->item_name = Item::where('id', $order_option->item_id)->pluck('name')->first();
                else 
                    $order_option->item_name = '';
            }

            $connector = new NetworkPrintConnector($printerIp, $printerPort);
            $printer = new Printer($connector);
            
            try {

                $printer->setJustification(Printer::JUSTIFY_LEFT);
                /*$printer -> text(new print_table1('TIME:' . $time, 'DATE:' . $date));
                $printer -> text(new print_table1('TABLE:' . $table_name, 'QTY:' . $qty));*/
                $printer->setTextSize(1,2);
                $printer->setEmphasis(false);
                $printer -> text('TIME:' . $time);
                $printer -> text('                  DATE:' . $date);
                $printer->text("\n");

                $printer->setJustification(Printer::JUSTIFY_LEFT);
                $printer->setTextSize(1,2);
                $printer->setEmphasis(false);
                $printer -> text('TABLE:');
                $printer->setEmphasis(true);
                $printer->setTextSize(2,2);
                $qty_len = strlen($qty);
                $table_len = 19 - $qty_len;
                $printer -> text(str_pad($table_name,$table_len,' ', STR_PAD_RIGHT));
                $printer->setEmphasis(false);
                $printer->setTextSize(1,2);
                $printer -> text('QTY:');               
                $printer->setEmphasis(true);
                $printer->setTextSize(2,2);
                $printer -> text($qty);
                $printer->text("\n");

                $printer->setJustification(Printer::JUSTIFY_LEFT);
                $printer->setTextSize(2,2);
                $printer->setEmphasis(false);
                $printer->text($dish_name);
                
                if($orderdish->options) {
                    foreach($orderdish->options as $option) {
                        $printer->text( "[" . $option->option_name . ":");
                        $printer->setEmphasis(true);
                        $printer->setTextSize(2,2);
                        $printer->text($option->item_name);
                        $printer->setEmphasis(false);
                        $printer->setTextSize(1,2);
                        $printer->text("]");
                    }
                }

                $printer->text("\n");

                $printer->cut();

            } finally {
                $printer -> close();
            }
        }

        broadcast(new KitchenDishReadyEvent($group_id));

        return $orderdish;
        
    }
}
