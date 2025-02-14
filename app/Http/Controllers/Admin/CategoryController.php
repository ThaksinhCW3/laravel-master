<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller {

    //Index
    public function index() {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    //Create
    public function create() 
    {
        return view('admin.category.create');
    }

    //Store data into database
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
        
        $cateogry = new Category;
        $cateogry->name = $request->name;
        $cateogry->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $cateogry->image = $imagePath;
        }

        $cateogry->save();
        return redirect()->route('admin.category.index')->with('success', 'Category has been created successfully.');
    }
    //Redirect to edit page
    public function edit(Category $category) 
    {
        return view('admin.category.edit', compact('category'));
    }

    //Update data in database
    public function update(Request $request, $category_id)
    {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ],
    [
        'name.required' => 'ກະລຸນາໃສ່ຊື່ສິນຄ້າ',
        'name.max' => 'ຊື່ຫມວດບໍ່ຄວນເກີນ 50 ຕົວອັກສອນ'
    ]);


        $category = new Category;
        $category->name = $validatedData['name'];
        $category->description = $validatedData['description'];

         if ($request->hasFile('image')) {
                if ($category->image) {
                    Storage::disk('public')->delete($category->image);
                }
        $category->image = $request->file('image')->store('categories', 'public');
            }

        $category->save();

    return redirect()->route('admin.category.index')
                     ->with('success', 'Category has been updated successfully!'); 
    }

    //Change status to active or inactive
    public function change($category_id){
        $category = Category::findOrFail($category_id);
        $category->status = !$category->status;
        $category->save();

        return redirect()->route('admin.category.index')
                ->with('success', 'Category status has been changed successfully.');
    }
    
    //Delete
    public function delete($category_id) { 
        $category = Category::findOrFail($category_id);
        $category->delete();

        return redirect()->route('admin.category.index')->with('success', 'Category has been deleted succesfully.');
    }
    // In CategoryController.php

    public function showCategoryWithProducts($categoryId)
    {
    $category = Category::with('products')->find($categoryId);
    if (!$category) {
        return redirect()->route('admin.category.index')->with('error', 'Category not found.');
    }
    return view('admin.category.show', compact('category'));
    }

}