<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Users;
use Illuminate\Http\Request;
use PDF;

class AdminController extends Controller
{
    //
    public function admindeshbord(){
        $total_product=product::all()->count();
        $total_order=order::all()->count();
        $total_user=Users::all()->count();

        $order = Order::all();
        $total_revenu=0;
        foreach($order as $order)
        {
            $total_revenu = $total_revenu + $order->price;
        }
        $total_delivered = Order::where('deliver_status', '=', 'delivered')->get()->count();
        $total_processing = Order::where('deliver_status', '=', 'Processing')->get()->count();

        return view('admin.home', compact('total_product','total_order', 'total_user', 'total_revenu', 'total_delivered', 'total_processing'));
    }
    
    public function catagory()
    {
        return view("admin.catagory");
    }

    public function chart(){

        return view("admin.chart");
    }
     
    public function ordershowlist(){
        $orders = Order::all();
        return view("admin.ordershowlist" , compact("orders"));
    }

    public function delivered($id){
        $order=Order::find($id);    
        $order->deliver_status = "delivered";
        $order->payment_status = "Paid";
        $order->save();

        return redirect()->back();
    }

    public function printpdf($id){
        $order=order::find($id);
        $pdf=PDF::loadView('admin.pdf', compact('order'));
        return $pdf->download('Order_Detiles.pdf');
    }
    public function searchdata(Request $request){
       $searchText = $request->search;
       $orders=order::where('name', 'LIKE', '%$searchText%')->orWhere('product_title','LIKE', '%$searchText%')->get();
        return view('admin.ordershowlist', compact('orders'));
    }

}

