<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // Permission middleware
        $this->middleware('can:category_view')->only(['index', 'show']);
        $this->middleware('can:category_create')->only(['create', 'store']);
        $this->middleware('can:category_edit')->only(['edit', 'update']);
        $this->middleware('can:category_delete')->only(['destroy']);
    }

    // Show all categories
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('backend.categories.index', compact('categories'));
    }

    // Show create form
    public function create()
    {
        return view('backend.categories.create');
    }

    // Store new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|boolean',
        ]);

        $slug = $request->slug ?? \Str::slug($request->name);

        $data = $request->only(['name', 'status']);
        $data['slug'] = $slug;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/categories', 'public');
            $data['image'] = 'storage/' . $imagePath;
        }

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // Show edit form
    public function edit(Category $category)
    {
        return view('backend.categories.edit', compact('category'));
    }

    // Update category
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'slug' => 'nullable|string|max:255|unique:categories,slug,' . $category->id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'nullable|boolean',
        ]);

        $slug = $request->slug ?? \Str::slug($request->name);

        $data = $request->only(['name', 'description', 'status']);
        $data['slug'] = $slug;

        if ($request->hasFile('image')) {
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }
            $imagePath = $request->file('image')->store('uploads/categories', 'public');
            $data['image'] = 'storage/' . $imagePath;
        }

        $data['status'] = $request->has('status') ? 1 : 0;

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Delete category
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
