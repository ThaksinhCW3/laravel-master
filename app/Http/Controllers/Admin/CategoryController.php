<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'status' => 'sometimes|boolean',
        ]);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        } else {
            $imagePath = null;
        }
    
        // Create Category
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'status' => $request->status ? 1 : 0,
        ]);
    
        return redirect()->route('admin.category.index')->with('success', 'Category added successfully!');
    }    
 }
