<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller {
    public function index() {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create() {
        return view('admin.category.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $imagePath = $request->hasFile('image') ? $request->file('image')->store('categories', 'public') : null;

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Category created successfully.');
    }

    //edit
    public function edit(Category $category) {
        return view('admin.category.edit', compact('category'));
    }

    //Update a category with validation and image storage if provided.  If no image is provided, it will use the existing one.  If image is provided, it will delete the existing one and upload the new one.  If no new image is provided, it will keep the existing one.  It will also validate the name and description fields.  It will redirect to the category index page with a success message.  It will also handle any errors that occur during the update process and redirect
    public function update(Request $request, Category $category) {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
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
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully.');
    }

    //Delete a category
    public function destroy(Category $category) {
        
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully.');
    }
}