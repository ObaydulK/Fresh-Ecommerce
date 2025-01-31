<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function catagory()
    {   
        $categories = Category::all();
        return view("admin.catagory", compact("categories"));
    }

    public function store(Request $request){

        $category = New Category;
        $category->Category_Name = $request ->Category;
        $category->save();
        return redirect()->back()->with("message","Category update success full");
    }

    public function destoy($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with("message","Delete Success");
    }

}
