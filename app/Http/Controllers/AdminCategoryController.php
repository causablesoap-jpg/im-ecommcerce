<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        $categoriesQuery = Category::query()->orderBy('created_at', 'desc');
        
        if ($query) {
            $categoriesQuery->where('name', 'like', "%{$query}%")
                           ->orWhere('slug', 'like', "%{$query}%");
        }

        $categories = $categoriesQuery->paginate(15);
        if ($query) {
            $categories->appends(['q' => $query]);
        }

        return view('admin.categories.index', compact('categories', 'query'));
    }

    public function create()
    {
        return view('admin.categories.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string|max:1000',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        Category::create($validated);

        return redirect('/admin/categories')->with('success', 'Category created successfully!');
    }

    public function show(Category $category)
    {
        $productsCount = $category->products()->count();
        return view('admin.categories.show', compact('category', 'productsCount'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.form', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string|max:1000',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $category->update($validated);

        return redirect()->route('admin.categories.show', $category->id)->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/admin/categories')->with('success', 'Category deleted successfully!');
    }
}
