<?php

namespace App\Http\Controllers\Dashboard;;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3);
        return view('dashboard.products.index',compact('products'));
    }

    public function create()
    {
//        $products = Product::all();
        $categories = Category::all();
        return view('dashboard.products.create',compact('categories'));
    }

    public function store(Request $request)
    {

        $attributes = $request->validate([
            'name' => ['required','max:255'],
            'description' => ['required','max:255'],
            'price' => ['required','max:15'],
            'price_after_discount' => ['max:15','nullable'],
            'stock_quantity' => ['required'],
            'sku' => ['required','unique:products'],
            'image' => ['required','image'],
            'category_id'=>['required']
        ]);

        $attributes['image'] = uploadImage($request->file('image'),'products');

        $product =Product::create($attributes);


        return redirect()->route('dashboard.products.index')->with('success_message','The product has been Added successfully');
    }

    public function edit(Product $product)
    {
        return view('dashboard.products.edit',compact('product'));
    }

    public function update(request $request,Product $product)
    {
        $attributes = $request->validate([
        'name' => ['required','max:255'],
        'description' => ['required','max:255'],
        'price' => ['required','max:15'],
        'price_after_discount' => ['max:15','nullable'],
        'stock_quantity' => ['required'],
        'sku' => ['required','unique:products,sku,' . $product->id],
        'image' => ['nullable','image'],
        ]);


        if ( request()->file('image') )
            $attributes['image'] = uploadImage($request->file('image'),'products');

        $product->update($attributes);

        return redirect()->route('dashboard.products.index')->with('success_message','The product has been Updated successfully');
    }

    public function show(Product $product)
    {
        return view('dashboard.products.show',compact('product'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('dashboard.products.index')->with('success_message','The Product has been Deleted successfully');

    }
}
