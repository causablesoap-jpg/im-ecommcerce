@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-neutral-900 text-neutral-100 font-poppins py-10">
        <div class="max-w-[800px] mx-auto px-4 sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-lg bg-red-900/30 border border-red-700">
                    <p class="text-red-300 font-semibold mb-2">Errors occurred:</p>
                    <ul class="text-red-300 text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-neutral-800 rounded-lg border border-neutral-700 p-6">
                <h1 class="text-3xl font-bold text-brand-400 mb-2">
                    {{ $product->id ? '✏️ Edit Product' : '➕ Create Product' }}
                </h1>
                <p class="text-neutral-400 text-sm mb-6">
                    {{ $product->id ? 'Update product details and information' : 'Add a new product to your store' }}
                </p>

                <form method="POST"
                    action="{{ $product->id ? route('admin.products.update', $product) : route('admin.products.store') }}">
                    @csrf
                    @if($product->id)
                        @method('PUT')
                    @endif

                    <div class="grid gap-6">
                        <!-- Product Name -->
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-neutral-300">
                                Product Name <span class="text-red-400">*</span>
                            </label>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}"
                                placeholder="Enter product name"
                                class="w-full py-2 px-3 rounded-lg bg-neutral-900 border border-neutral-700 text-neutral-100 focus:border-brand-600 focus:ring-1 focus:ring-brand-600 transition @error('name') border-red-500 @enderror"
                                required>
                            @error('name')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-neutral-300">
                                Price (₹) <span class="text-red-400">*</span>
                            </label>
                            <input type="number" name="price" step="0.01" min="0" value="{{ old('price', $product->price) }}"
                                placeholder="0.00"
                                class="w-full py-2 px-3 rounded-lg bg-neutral-900 border border-neutral-700 text-neutral-100 focus:border-brand-600 focus:ring-1 focus:ring-brand-600 transition @error('price') border-red-500 @enderror"
                                required>
                            @error('price')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-neutral-300">Category</label>
                            <select name="category_id"
                                class="w-full py-2 px-3 rounded-lg bg-neutral-900 border border-neutral-700 text-neutral-100 focus:border-brand-600 focus:ring-1 focus:ring-brand-600 transition @error('category_id') border-red-500 @enderror">
                                <option value="">-- Select a Category --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" @if(old('category_id', $product->category_id) == $cat->id) selected @endif>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Brand -->
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-neutral-300">Brand</label>
                            <select name="brand_id"
                                class="w-full py-2 px-3 rounded-lg bg-neutral-900 border border-neutral-700 text-neutral-100 focus:border-brand-600 focus:ring-1 focus:ring-brand-600 transition @error('brand_id') border-red-500 @enderror">
                                <option value="">-- Select a Brand --</option>
                                @foreach($brands as $b)
                                    <option value="{{ $b->id }}" @if(old('brand_id', $product->brand_id) == $b->id) selected @endif>
                                        {{ $b->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image URL -->
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-neutral-300">Image URL</label>
                            <input type="url" name="image_url" value="{{ old('image_url', $product->images[0] ?? '') }}"
                                placeholder="https://example.com/image.jpg"
                                class="w-full py-2 px-3 rounded-lg bg-neutral-900 border border-neutral-700 text-neutral-100 focus:border-brand-600 focus:ring-1 focus:ring-brand-600 transition @error('image_url') border-red-500 @enderror">
                            @if($product->images[0] ?? null)
                                <p class="text-xs text-neutral-400 mt-2">Current image: <a href="{{ $product->images[0] }}" target="_blank" class="text-brand-400 hover:underline">View</a></p>
                            @endif
                            @error('image_url')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- In Stock -->
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-neutral-300">In Stock (Quantity)</label>
                            <input type="number" name="in_stock" min="0" value="{{ old('in_stock', $product->in_stock) }}"
                                placeholder="0"
                                class="w-full py-2 px-3 rounded-lg bg-neutral-900 border border-neutral-700 text-neutral-100 focus:border-brand-600 focus:ring-1 focus:ring-brand-600 transition @error('in_stock') border-red-500 @enderror">
                            @error('in_stock')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-neutral-300">Description</label>
                            <textarea name="description" rows="5"
                                placeholder="Enter product description..."
                                class="w-full py-2 px-3 rounded-lg bg-neutral-900 border border-neutral-700 text-neutral-100 focus:border-brand-600 focus:ring-1 focus:ring-brand-600 transition @error('description') border-red-500 @enderror">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Checkboxes -->
                        <div class="grid grid-cols-2 gap-4">
                            <label class="flex items-center gap-3 p-3 rounded-lg bg-neutral-900/50 border border-neutral-700 cursor-pointer hover:bg-neutral-900 transition">
                                <input type="checkbox" name="is_active" value="1" 
                                    @if(old('is_active', $product->is_active ?? true)) checked @endif
                                    class="w-4 h-4 rounded accent-brand-600">
                                <span class="text-sm text-neutral-300 font-medium">Active</span>
                                <span class="text-xs text-neutral-400">(Show on storefront)</span>
                            </label>

                            <label class="flex items-center gap-3 p-3 rounded-lg bg-neutral-900/50 border border-neutral-700 cursor-pointer hover:bg-neutral-900 transition">
                                <input type="checkbox" name="is_featured" value="1" 
                                    @if(old('is_featured', $product->is_featured ?? false)) checked @endif
                                    class="w-4 h-4 rounded accent-brand-600">
                                <span class="text-sm text-neutral-300 font-medium">Featured</span>
                                <span class="text-xs text-neutral-400">(Highlight product)</span>
                            </label>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-between pt-6 border-t border-neutral-700">
                            <a href="/admin"
                                class="px-6 py-2 rounded-lg bg-neutral-700 text-neutral-200 hover:bg-neutral-600 transition font-medium">
                                Cancel
                            </a>
                            <button type="submit"
                                class="px-6 py-2 rounded-lg bg-gradient-to-r from-brand-600 to-brand-700 text-white hover:from-brand-700 hover:to-brand-800 transition font-semibold shadow-md">
                                {{ $product->id ? 'Update Product' : 'Create Product' }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection