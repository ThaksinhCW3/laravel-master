<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }
    // public function create(){
    //     return view('admin.product.create');
    // }
    public function create()
{
    
    $products = Product::all();
    dd($products);
    $categories = Category::with('products:id,name,category_id')  // Correct columns in products
                          ->get();

    return view('admin.product.create', compact('products', 'categories'));
}


    public function store(Request $request) {
        $request->validate([
            'name' =>'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $products = new Product;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->quantity = $request->quantity;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $products->image = $imagePath;
        }

        $products->save();
        return redirect()->route('admin.product.index')->with('success', 'Product added successfully!');
    }

    public function edit($id){
        return view('admin.product.edit', compact('id'));
    }
    public function delete(Product $products){
        $products->delete();
        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully.');
    }
}
