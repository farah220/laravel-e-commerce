<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
        $carts    = auth()->user()->carts;
        $subtotal = $carts->sum( fn( $cart ) => $cart->product->price * $cart->product_quantity);
        return view('web.cart',compact('carts','subtotal'));
        }
        else{
            return view('web.cart');
        }
    }

    public function store(Request $request,Product $product )
    {
        $attributes = $request->validate([
            'product_quantity' => ['required','gt:0'],
            'product_id' => ['required'],
            'user_id'=> ['required'],
        ]);

        Cart::create($attributes);
        return redirect()->back()->with('success_message','the product has been added to cart successfully');
    }
    public function clear()
    {
        auth()->user()->carts()->delete();

        return redirect()->back()->with('success_message','the product has been added to cart successfully');

    }
    public function update(request $request,Cart $cart)
    {
        $attributes = $request->validate([
            'product_quantity' => ['required','gt:0'],
            'product_id' => ['required'],
            'user_id'=> ['required'],
        ]);

        $cart->update($attributes);

        return redirect()->route('web.cart.index')->with('success_message','The cart has been Updated successfully');
    }


}
