<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');

        $products = Product::query()->orderBy('created_at', 'desc');
        if ($q) {
            $products->where('name', 'like', "%{$q}%");
        }

        $products = $products->paginate(15)->withQueryString();

        return view('admin.products.index', compact('products', 'q'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.form', ['product' => new Product(), 'categories' => $categories, 'brands' => $brands]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'in_stock' => 'nullable|integer|min:0',
            'is_active' => 'nullable|in:1,on',
            'is_featured' => 'nullable|in:1,on',
            'image_url' => 'nullable|url',
        ]);

        $product = new Product();
        $product->name = $data['name'];
        $product->slug = Str::slug($data['name']).'-'.Str::random(4);
        $product->price = (float) $data['price'];
        $product->description = $data['description'] ?? null;
        $product->category_id = $data['category_id'] ?? null;
        $product->brand_id = $data['brand_id'] ?? null;
        $product->in_stock = (int) ($data['in_stock'] ?? 0);
        $product->is_active = isset($data['is_active']) ? 1 : 0;
        $product->is_featured = isset($data['is_featured']) ? 1 : 0;
        $product->on_sale = 0;
        $product->images = !empty($data['image_url']) ? [$data['image_url']] : [];
        $product->save();

        return redirect('/admin')->with('success', 'Product created successfully!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.form', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'in_stock' => 'nullable|integer|min:0',
            'is_active' => 'nullable|in:1,on',
            'is_featured' => 'nullable|in:1,on',
            'image_url' => 'nullable|url',
        ]);

        $product->name = $data['name'];
        $product->slug = Str::slug($data['name']).'-'.Str::random(4);
        $product->price = (float) $data['price'];
        $product->description = $data['description'] ?? null;
        $product->category_id = $data['category_id'] ?? null;
        $product->brand_id = $data['brand_id'] ?? null;
        $product->in_stock = (int) ($data['in_stock'] ?? 0);
        $product->is_active = isset($data['is_active']) ? 1 : 0;
        $product->is_featured = isset($data['is_featured']) ? 1 : 0;
        if (!empty($data['image_url'])) {
            $product->images = [$data['image_url']];
        }
        $product->save();

        return redirect('/admin')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted.');
    }
}
