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
        $subs = Category::where('parent_id' ,'!=', null)->get();;
        return view('admin.category.list')->with(compact('categories', 'subs'));
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
        }
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
}
