<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDish extends Model
{
    //
    protected $table = 'order_dish_match';

    public function Order_Option()
    {
        return $this->hasMany(OrderOption::class, 'order_dish_id');
    }

}
