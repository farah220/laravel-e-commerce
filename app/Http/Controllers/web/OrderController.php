<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $carts= auth()->user()->carts;
        $order = new Order();
        foreach($carts as $cart){
            $order->user_id = auth()->user()->id;
            $order->sub_total += $cart->product->price * $cart->product_quantity;
            $order->shipping = $request->input('shipping');
            $order->total = $order->shipping + $order->sub_total;
            $order->save();
        }
        $order_items = new OrderItems();
        foreach ($carts as $cart){
            $order_items->order_id = $order->id;
            $order_items->product_id = $cart->product_id;
            $order_items->product_quantity = $cart->product_quantity;
            $order_items->product_price = $cart->product->price;
            $order_items->save();
          $product=  Product::find($cart->product_id);
          $product->update(['stock_quantity' =>$product->stock_quantity - $order_items->product_quantity]);
        }
        auth()->user()->carts()->delete();
        return redirect()->back();

    }
}
