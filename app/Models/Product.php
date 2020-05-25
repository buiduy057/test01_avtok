<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'category_id', 'name', 'slug','content','unit_price','image','discount_price','quantity','status'
    ];
}
