<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    //
    protected $table = 'dishes';
    public function options()
    {
        return $this->hasManyThrough(Option::class, DishOption::class, 'dish_id', 'id', 'id', 'option_id');
    }
    public function dishoptions()
    {
        return $this->hasMany(DishOption::class, 'dish_id');
    }
    public function group()
    {
        return $this->hasOne(Kitchen::class, 'id', 'group_id');
    }
}
