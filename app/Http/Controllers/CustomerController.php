<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\DishCategory;
use App\Model\Dish;
use App\Model\Discount;
use App\Model\Item;
use App\Model\Option;
use App\Model\Order;
use App\Model\Table;
use App\Model\OrderTable;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index($order_id)
    {
        $table_ids_arr = OrderTable::where('order_id', $order_id)->pluck('table_id');
        $tables = Table::whereIn('id', $table_ids_arr)->get();
        $table_name_arr = array(1 => 'A', 'B', 'C');
        $table_name = '';
        $order = Order::find($order_id);
        foreach($tables as $table){
            $table_name .= $table_name_arr[$table->type].'-'.$table->index.' +';
        }
        $table_name = rtrim($table_name, '+');
        echo $table_name;
        $categories = Category::get()->toArray();
        $dishes = array();
        if(count($categories) > 0){
            $category_record = Category::find($categories[0]['id']);
            $dishes = $category_record->dishes;
        }
        $category_all = array();
        foreach ($categories as $category) {
            $category_all[$category['id']] = $category;
            if($category['has_subs'] == 1){
                $sub_categories = Category::where('parent_id', $category['id'])->get()->toArray();
                $category_all[$category['id']]['children'] = $sub_categories;
            }
        }
        return view('customer.index')->with(compact('category_all', 'dishes', 'order', 'table_name'));
    }
    public function dish_list()
    {
        $category = Category::find(request()->category);
        $dishes = $category->dishes;
        return (string)view('part.category_dish_customer', compact('dishes'))->render();
    }
    public function dish_info()
    {
        $dish_id = request()->dish_id;
        $dish = Dish::find($dish_id);
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
        return (string)view('part.dish_info', compact('dish', 'options', 'count', 'option_count', 'option_id_arr', 'items'))->render();
    }
    public function dish_option()
    {
        $dish_id = request()->dish_id;
        $items_id = request()->items_id;
        $dish = Dish::find($dish_id);
        $count = request()->index;
        $option_ids = request()->option_id_arr;
        $option_id_arr = explode(',', $option_ids);
        $option = Option::find($option_id_arr[$count]);
        $items = Item::where('option_id', $option_id_arr[$count])->get();
        $count ++;
        return (string)view('part.dish_option', compact('items', 'count', 'option', 'option_id_arr', 'option_ids', 'dish_id', 'items_id', 'dish'))->render();
    }
}