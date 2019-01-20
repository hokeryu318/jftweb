<?php

namespace App\Http\Controllers;

use App\Model\DishCategory;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Dish;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::where('parent_id' ,'=', null)->get();
        return view('admin.category.list')->with(compact('categories'));
    }

    public function add()
    {
        $new = new Category();
        $new->name_en = request()->name_en;
        $new->name_cn = request()->name_cn;
        $new->name_jp = request()->name_jp;
        $new->parent_id = request()->parent_id;
        $new->save();

        $parent = Category::find(request()->parent_id);
        if(!is_null($parent)){
            $parent->has_subs = 1;
            $parent->save();
            return (string)view('part.subcategory_item', ['sub' => $new])->render();
        } else {
            return (string)view('part.category_item', ['cat' => $new])->render();
        }

        //return redirect()->route('admin.category');
    }

    public function delete($id){
        $cat = Category::find($id);
        //remove from match table
        DishCategory::where('categories_id', $id)->delete();
        foreach ($cat->subs as $subs) {
            $dish_category = new DishCategory();
            $dish_category->where('categories_id', $subs->id)->delete();
        }
        $cat->delete();
        Category::where("parent_id", $id)->delete();

    }

    public function subs()
    {
        $main = request()->parent;
        $subs = Category::find($main)->subs;
        return (string)view('part.subcategory', compact('subs'))->render();
    }

    public function subs_list()
    {
        $main = request()->category;
        $subs = Category::find($main)->subs;
        $shtml = (string)view('part.subcategory_list', compact('subs'))->render();
        $dish_html = self::dish_list();
        return response()->json(['subcategory_list' => $shtml, 'dishs' => $dish_html]);
    }

    public function dish_list()
    {
        $dishes = DishCategory::getDishFromCategory(request()->category);
        return (string)view('part.category_dish', compact('dishes'))->render();
    }

    public function dish_delete($dish_id)
    {
        DishCategory::where("dish_id", $dish_id)->delete();
        return "sucess";
    }
}
