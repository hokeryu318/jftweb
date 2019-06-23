<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    //
    protected $table = 'tables';

    public function order()
    {
        return $this->hasManyThrough(Order::class, OrderTable::class, 'table_id', 'id', 'id', 'order_id');
    }

    public function orderTable()
    {
        return $this->hasMany(OrderTable::class, 'table_id');
    }
}
