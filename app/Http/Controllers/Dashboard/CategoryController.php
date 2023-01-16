<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index',compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.categories.create',compact('categories'));
    }

    public function show(Category $category)
    {
        return view('dashboard.categories.show',compact('category'));
    }

    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('dashboard.categories.edit',compact('category','categories'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('dashboard.categories.index')->with('success_message','the category has been deleted successfully');

    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required'],
            'image' => ['required', 'image'],
            'parent_id' => ['required_if:category_type,sub_category'],
        ]);
        $attributes['image'] = request()->file('image')->store('Images/Products');
        $category = Category::create($attributes);

        foreach( $request->categories ?? [] as $categoryId )
            Category::find($categoryId)->update('parent_id', $category->id);

        return redirect()->route('dashboard.categories.index')->with('success_message','The category has been Added successfully');

    }
    public function update(Request $request,Category $category)
    {
        $attributes = $request->validate([
            'name' => ['required'],
            'image' => ['nullable', 'image'],
            'parent_id' => ['required_if:category_type,sub_category'],
        ]);

        if ( $request->file('image'))
            $attributes['image'] = request()->file('image')->store('Images/Products');

        if( $attributes['parent_id'] && $category->parent_id == null ){
            foreach( $request->categories ?? [] as $categoryId )
                Category::find($categoryId)->update(['parent_id' => null]);

        }else{
            foreach( $request->categories ?? [] as $categoryId )
                Category::find($categoryId)->update(['parent_id' => $category->id]);
        }

        $category->update($attributes);
        return redirect()->route('dashboard.categories.index')->with('success_message','The category has been Added successfully');

    }

}
