<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller {
    //Index
    public function index() {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    //Create
    public function create() {
        return view('admin.category.create');
    }
    //Store
    public function store(Request $request) {
        $request->validate(
        [
            'name' => 'required|string|max:50',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ],
        [
            'name.required' => 'ກະລຸນາໃສ່ຊື່ຫມວດສິນຄ້າ',
            'name.max' => 'ຊື່ຫມວດບໍ່ຄວນເກີນ 50 ຕົວອັກສອນ',
            'image.max' => 'ຂະຫນາດຮູບບໍ່ຄວນເກີນ 20248 px'
        ]);
        $imagePath = $request->hasFile('image') ? $request->file('image')->store('categories', 'public') : null;

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);
        return redirect()->route('admin.category.index')->with('success', 'Category created successfully.');
    }
    //Edit
    public function edit(Category $category) {
        return view('admin.category.edit', compact('category'));
    }
    //Update
    public function update(Request $request, $category_id) {
        $category = Category::findOrFail($category_id);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'status' => 'required|boolean'
        ]);
    
        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $category->image = $request->file('image')->store('categories', 'public');
        }
    
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status

        ]);
        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully.');
    }
    
    //Delete
    public function delete($category_id) { 
        $category = Category::findOrFail($category_id);
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully.');
    }
}