<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [ 'id', 'name', 'email', 'user_id', 'product_title', 'quantity', 'price', 'image', 'product_id','payment_status', 'deliver_status', 'created_at','updated_at' ];

}
