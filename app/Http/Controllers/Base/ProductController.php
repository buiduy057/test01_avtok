<?php

namespace App\Http\Controllers\Base;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends BaseController
{
    public function list(){
    	return response()->json(Product::get());
    }
}
