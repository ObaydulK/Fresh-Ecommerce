<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use PDF;

class AdminController extends Controller
{
    //

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

