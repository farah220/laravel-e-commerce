<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function store(Request $request ,Product $product)
    {
        $attributes = $request->validate([
            'product_quantity' => ['required','gt:0'],
            'product_id' => ['required'],
            'user_id'=> ['required'],
        ]);
        Cart::create($attributes);
        return view('web.product',compact('product'));
    }
}
