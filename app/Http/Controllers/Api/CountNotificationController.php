<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Order;
use App\Model\OrderTable;
use App\Model\Dish;
use App\Model\OrderDish;
use App\Model\Option;
use App\Model\Item;

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
        $count_notification['bookings'] = Order::where('pay_flag',  '<>', 2)->where('status', 'booking')->get()->count();

        return $count_notification;
    }

    public function get_change_group_dish($group_id)
    {

//        $group_id = $request->group_id;
        $change_group_dish = array();
        $order_id_list = Order::where('pay_flag', '<>', 2)->pluck('id');
        $dish_id_list = Dish::where('group_id', $group_id)->pluck('id');
        $order_dish_list = OrderDish::whereIn('dish_id', $dish_id_list)->whereIn('order_id', $order_id_list)->where('ready_flag', '0')->orderBy('created_at', 'ASC')->get();//dd($order_dish_list);
        foreach($order_dish_list as $key => $order_dish)
        {
            //order info
            $order_id = $order_dish->order_id;
            $change_group_dish[$key]['order_id'] = $order_id;
            $change_group_dish[$key]['starting_time'] = Order::where('id', $order_id)->pluck('time')->first();

            //order table info
            $display_table_list = OrderTable::where('order_id', $order_id)->get();
            $change_group_dish[$key]['display_table_id'] = $display_table_list[0]->table_id;
            $change_group_dish[$key]['display_table'] = $this->get_table_name($change_group_dish[$key]['display_table_id']);
            $change_group_dish[$key]['table_count'] = count($display_table_list);
            $change_group_dish[$key]['calling_time'] = OrderTable::where('table_id', $change_group_dish[$key]['display_table_id'])->pluck('calling_time');

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
        } else {
            $orderdish->ready_flag = 1;
        }
        $orderdish->save();
        return $orderdish;
    }
}