<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function catagory()
    {
        return view("admin.catagory");
    }
    public function table(){
        return view("admin.table");
    }
    
    public function chart(){
        return view("admin.chart");
    }



}

