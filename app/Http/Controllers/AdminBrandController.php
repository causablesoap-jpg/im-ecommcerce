<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBrandController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        $brandsQuery = Brand::query()->orderBy('created_at', 'desc');

        if ($query) {
            $brandsQuery->where('name', 'like', "%{$query}%")
                        ->orWhere('slug', 'like', "%{$query}%");
        }

        $brands = $brandsQuery->paginate(15);
        if ($query) {
            $brands->appends(['q' => $query]);
        }

        return view('admin.brands.index', compact('brands', 'query'));
    }

    public function create()
    {
        return view('admin.brands.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:brands,name',
            'image' => 'nullable|string|max:1000',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = isset($validated['is_active']) ? (bool)$validated['is_active'] : false;

        Brand::create($validated);

        return redirect('/admin/brands')->with('success', 'Brand created successfully!');
    }

    public function show(Brand $brand)
    {
        $productsCount = $brand->products()->count();
        return view('admin.brands.show', compact('brand', 'productsCount'));
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.form', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $brand->id,
            'image' => 'nullable|string|max:1000',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = isset($validated['is_active']) ? (bool)$validated['is_active'] : false;

        $brand->update($validated);

        return redirect()->route('admin.brands.show', $brand->id)->with('success', 'Brand updated successfully!');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect('/admin/brands')->with('success', 'Brand deleted successfully!');
    }
}
