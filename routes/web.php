<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $products = Product::all();
    return view('welcome', compact('products'));
});


Route::get('/home', function () {
    return view('admin/home');
})->middleware(['auth','verified'] )->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/product', [HomeController::class, 'product']);
Route::get('/ProductDitiles/{id}', [HomeController::class, 'ProductDitiles']);

Route::post("/add_to_cart/{id}", [HomeController::class,"add_to_cart"]);




Route::get("/ShowCart", [HomeController::class,"ShowCart"]);
Route::get("/remove_cart/{id}", [HomeController::class,"remove_cart"]);





















Route::get('/table', [AdminController::class,'table']);
Route::get('/chart', [AdminController::class,'chart']);


Route::get('/category', [CategoryController::class,'catagory']);
Route::post('/add_catagory', [CategoryController::class,'store']);
Route::get('/add_catagory_destoy/{id}', [CategoryController::class,'destoy']);

 


Route::get('/addproduct' ,[ProductController::class,'addproduct']);
Route::get('/showallproduct' ,[ProductController::class,'showallproduct']);

Route::post('/add_product', [ProductController::class,'add_product']);
Route::get('/add_product_edit/{id}', [ProductController::class,'add_product_edit']);
Route::post('/add_product_edit_submit/{id}', [ProductController::class,'add_product_edit_submit']);
Route::get('/add_product_destroy/{id}', [ProductController::class,'add_product_destroy']);



















