<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class HomeController extends Controller
{
    //
    public function product(){
        
        return view("home.product" );
    }

    public function ProductDitiles($id){
        $product = Product::find($id);
        return view("home.productditiles", compact("product"));
    }

    public function add_to_cart(Request $request, $id){
        if(Auth::id()){
            $user = Auth::user();
            $product = Product::find($id);
            
            $cart = new Cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->user_id=$user->id;  
            $cart->product_title=$product->title; 
            $cart->price=$product->price;   
            $cart->image=$product->image; 
            $cart->Product_id=$product->id;  
            $cart->quantity=$request->quantity; 
            $cart->save();
            return redirect()->back(); 
        }
        else{
            return redirect('login');
        }
    }
}
