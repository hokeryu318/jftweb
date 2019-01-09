<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';

    public function subs()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public static function get_mains()
    {
        return self::where('parent_id', '=', null)->get();
    }

    public function dishes()
    {
        return $this->hasMany(Dish::class, 'sub_category_id');
    }
}
