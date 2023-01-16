<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $sliders = Slider::all();
        return view('web.index',compact('products','sliders'));
    }


    public function show(Product $product)
    {
        $products =  Product::where('category_id',$product->category_id)->where('id','!=',$product->id)->get();

        return view('web.product',compact('product','products'));

    }

    public function search( Request $request )
    {
        $products = Product::where('name','Like','%' . $request['search_term']. '%')->get();
        return view('web.search',compact('products'));
    }

}
