<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DishCategory extends Model
{
    //
    protected $table = 'dish_category_match';

    public static function getCategoryFromDish($dish_id)
    {
        return self::select('categories_id')->where('dish_id', '=', $dish_id)->get()->toArray();
    }
}
