<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller {

    //Show all products in admin panel
    public function index(){
        $products = Product::with('category:category_id, name')->get();
        return view('admin.product.index', compact('products'));
    }

    //Show form to create new product
    public function create()
    {                   
        $products = Product::all();
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    //Store data inside database
    public function store(Request $request) {
        $request->validate(
        [
            'name' =>'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,category_id'
        ],
        [
            'name.required' => 'ກະລຸນາໃສ່ຊື່ສິນຄ້າ',
            'name.max' => 'ຊື່ຫມວດບໍ່ຄວນເກີນ 50 ຕົວອັກສອນ',
            'image.max' => 'ຂະຫນາດຮູບບໍ່ຄວນເກີນ 20248 px'
        ]);

        $products = new Product;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->quantity = $request->quantity;
        $products->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $products->image = $imagePath;
        }

        $products->save();
        return redirect()->route('admin.product.index')->with('success', 'Product added successfully!');
    }
    
    //delete data from database
    public function edit($product_id)
    {
        $product = Product::findOrFail($product_id);
        $categories = Category::all(); // Fetch categories for the select dropdown
        return view('admin.product.edit', compact('product', 'categories'));
    }
    //Update data in database
    public function update(Request $request)
    {
    $request ->validate([
        'name' =>'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'quantity' => 'nullable|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category_id' => 'required|exists:categories,category_id'
    ],
    [
        'name.required' => 'ກະລຸນາໃສ່ຊື່ສິນຄ້າ',
        'name.max' => 'ຊື່ຫມວດບໍ່ຄວນເກີນ 50 ຕົວອັກສອນ'
    ]);
        $product = new Product;
        $product-> name = $request->name;
        $product-> description = $request->description;
        $product-> price = $request->price;
        $product-> quantity = $request->quantity;
        $product-> category_id = $request->category_id;

        // if ($request->hasFile('image')) {
        //     Storage::delete($product->image);
        //     $imagePath = $request->file('image')->store('products', 'public');
        //     $product->image = $imagePath;
        // }

        if ($request->hasFile('image')) {
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }
        $product->image = $request->file('image')->store('products', 'public');
            }

        $product->save();

    return redirect()->route('admin.product.index')
                    ->with('success', 'Product updated successfully!');
    }

    public function change($product_id){
        $product = Product::findOrFail($product_id);
        $product->status = !$product->status;
        $product->save();

        return redirect()->route('admin.product.index')
                ->with('success', 'Product status has been changed successfully.');
    }

    //Change status to active or inactive
    public function delete($products){
        $products = Product::findOrFail($products);
        $products->delete();

        return redirect()->route('admin.product.index')
        ->with('success', 'product has been deleted successfully.');
    }
}
