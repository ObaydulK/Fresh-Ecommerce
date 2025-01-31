<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addproduct(){
        $categories = Category::all();
        return view("admin.product", compact("categories"));
    }

    public function showallproduct(){
        $products = Product::all();
        return view("admin.showallproduct", compact("products"));
    }
    public function add_product(Request $request){
 
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category; // Assign the category
        $product->discount_price = $request->discount_price;
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image= $imagename;
        
        // $product->image = $request->file('image')->store('/products', 'public');
       
        $product->save();
    
        return redirect('showallproduct')->with('message', 'Product added successfully!');

    }

    public function add_product_edit(Request $request){
        $product = Product::find($request->id);
        $categories = Category::all();

        return view('admin.add_product_edit', compact('product', 'categories'));


    }

    public function add_product_edit_submit(Request $request,$id){
        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category; // Assign the category
        $product->discount_price = $request->discount_price;
       
        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image= $imagename;
        }

        return redirect('showallproduct')->with('message', 'Product added successfully!');

    }



    public function add_product_destroy($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message','delete success');
    }

}
