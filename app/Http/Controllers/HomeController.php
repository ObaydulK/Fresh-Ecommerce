<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe; 
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    //
    public function product()
    {

        return view("home.product");
    }

    public function ProductDitiles($id)
    {
        $product = Product::find($id);
        return view("home.productditiles", compact("product"));
    }

    public function add_to_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);

            $cart = new Cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->user_id = $user->id;
            $cart->product_title = $product->title;
            // $cart->price = $product->price;
            if ($product->discount_price != null) {
                $cart->price = $product->discount_price * $request->quantity;
            } else {
                $cart->price = $product->price * $request->quantity;
            }
            $cart->image = $product->image;
            $cart->Product_id = $product->id;
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }



    public function ShowCart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();
            return view('home.showcart', compact('cart'));
        } else {
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();

    }

    public function order(){
        $user = Auth::user();
        $userid = $user->id;
        $datas= Cart::where('user_id', '=', $userid)->get() ;
         foreach($datas as $data){
            $order = new Order( );
            $order->name = $data->name;
            $order->email = $data->email;
            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'Cash on Delivary';
            $order->deliver_status = 'Processing';

            $order->save();

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();


         }
         return redirect()->back()->with('success', 'you well ba order.we will connect with you son');
    }
    public function stripe($totalprice){

        return view('home.stripe', compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice): RedirectResponse
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "payment from Germany." 
        ]);
            
        
            $user = Auth::user();
            $userid = $user->id;
            $datas= Cart::where('user_id', '=', $userid)->get() ;
             foreach($datas as $data){
                $order = new Order( );
                $order->name = $data->name;
                $order->email = $data->email;
                $order->user_id = $data->user_id;
    
                $order->product_title = $data->product_title;
                $order->price = $data->price;
                $order->quantity = $data->quantity;
                $order->image = $data->image;
                $order->product_id = $data->product_id;
    
                $order->payment_status = 'Paid';
                $order->deliver_status = 'Processing';
    
                $order->save();
    
                $cart_id = $data->id;
                $cart = Cart::find($cart_id);
                $cart->delete();
    
    
             }


        return back()
                ->with('success', 'Payment successful!');
    }

}
