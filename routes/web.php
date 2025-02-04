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

// admin part start     
Route::get('/chart', [AdminController::class,'chart']);

Route::get('/ordershowlist', [AdminController::class,'ordershowlist']);
Route::get('/delivered/{id}', [AdminController::class,'delivered']);
Route::get('/printpdf/{id}', [AdminController::class,'printpdf']);
Route::get('/search', [AdminController::class,'searchdata']);

 
// admin part end

// catagory part start 
Route::get('/category', [CategoryController::class,'catagory']);

Route::post('/add_catagory', [CategoryController::class,'store']);

Route::get('/add_catagory_destoy/{id}', [CategoryController::class,'destoy']);

// Category part end
 


// Product part start 
Route::get('/addproduct' ,[ProductController::class,'addproduct']);

Route::get('/showallproduct' ,[ProductController::class,'showallproduct']);

Route::post('/add_product', [ProductController::class,'add_product']);

Route::get('/add_product_edit/{id}', [ProductController::class,'add_product_edit']);

Route::post('/add_product_edit_submit/{id}', [ProductController::class,'add_product_edit_submit']);

Route::get('/add_product_destroy/{id}', [ProductController::class,'add_product_destroy']);

// Product part end 









// Home part start 
Route::get('/product', [HomeController::class, 'product']);

Route::get('/ProductDitiles/{id}', [HomeController::class, 'ProductDitiles']);

Route::post("/add_to_cart/{id}", [HomeController::class,"add_to_cart"]);




Route::get("/ShowCart", [HomeController::class,"ShowCart"]);

Route::get("/remove_cart/{id}", [HomeController::class,"remove_cart"]);

Route::get("/order", [HomeController::class,"order"]);

Route::get('/stripe/{totalprice}', [HomeController::class,'stripe']);

Route::post('stripe/{totalprice}', [HomeController::class,'stripePost'])->name('stripe.post');


// Home part end











