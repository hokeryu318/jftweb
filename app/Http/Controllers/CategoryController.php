<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;

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
        $cat->delete();
    }

    public function subs()
    {
        $main = request()->parent;
        $subs = Category::find($main)->subs;
        return (string)view('part.subcategory', compact('subs'))->render();
    }

    public function subs_list()
    {
        $main = request()->parent;
        $subs = Category::find($main)->subs;
        return (string)view('part.subcategory_list', compact('subs'))->render();
    }

    public function dish_list()
    {
        $cat = Category::find(request()->category);
        $dishes = $cat->dishes;
        return (string)view('part.category_dish', compact('dishes'))->render();
    }
}
