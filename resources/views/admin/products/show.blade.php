@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-neutral-900 text-neutral-100 font-poppins py-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- HEADER -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-bold text-brand-400">📦 Product Details</h1>
                    <a href="{{ route('admin.products.index') }}"
                        class="px-4 py-2 bg-neutral-800 hover:bg-neutral-700 text-neutral-100 rounded-lg transition">
                        Back to Products
                    </a>
                </div>
            </div>

            <!-- PRODUCT DETAILS CARD -->
            <div class="bg-neutral-800 rounded-xl border border-neutral-700 p-8 space-y-6">

                <!-- PRODUCT NAME & IMAGE -->
                <div class="flex items-start gap-8">
                    <div class="flex-shrink-0">
                        @if(!empty($product->images) && is_array($product->images) && isset($product->images[0]))
                            <img src="{{ url('storage', $product->images[0]) }}" alt="{{ $product->name }}"
                                class="w-48 h-48 object-cover rounded-lg">
                        @else
                            <div class="w-48 h-48 bg-neutral-700 rounded-lg flex items-center justify-center text-neutral-400">
                                No image
                            </div>
                        @endif
                    </div>
                    <div class="flex-1">
                        <p class="text-neutral-400 text-sm uppercase font-semibold mb-2">Product Name</p>
                        <h2 class="text-3xl font-bold text-white mb-4">{{ $product->name }}</h2>

                        <div class="space-y-3">
                            <div>
                                <p class="text-neutral-400 text-sm uppercase font-semibold mb-1">Price</p>
                                <p class="text-2xl font-bold text-brand-400">{{ Number::currency($product->price, 'INR') }}
                                </p>
                            </div>

                            <div>
                                <p class="text-neutral-400 text-sm uppercase font-semibold mb-1">Status</p>
                                <p class="text-white">
                                    @if($product->is_active)
                                        <span class="px-3 py-1 rounded bg-brand-900 text-brand-300 text-sm">Active</span>
                                    @else
                                        <span class="px-3 py-1 rounded bg-red-900 text-red-300 text-sm">Inactive</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PRODUCT INFO GRID -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6 border-t border-neutral-700">
                    <div>
                        <p class="text-neutral-400 text-sm uppercase font-semibold mb-2">Category</p>
                        <p class="text-white">{{ $product->category?->name ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <p class="text-neutral-400 text-sm uppercase font-semibold mb-2">Brand</p>
                        <p class="text-white">{{ $product->brand?->name ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <p class="text-neutral-400 text-sm uppercase font-semibold mb-2">In Stock</p>
                        <p class="text-white text-lg font-semibold">{{ $product->in_stock ?? 0 }} units</p>
                    </div>

                    <div>
                        <p class="text-neutral-400 text-sm uppercase font-semibold mb-2">SKU / Slug</p>
                        <p class="text-neutral-300 font-mono text-sm">{{ $product->slug }}</p>
                    </div>
                </div>

                <!-- DESCRIPTION -->
                <div class="pt-6 border-t border-neutral-700">
                    <p class="text-neutral-400 text-sm uppercase font-semibold mb-2">Description</p>
                    <div class="text-neutral-300 leading-relaxed bg-neutral-700/30 p-4 rounded">
                        {!! $product->description ? Str::markdown($product->description ?? '') : 'No description provided' !!}
                    </div>
                </div>

                <!-- STATS -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-6 border-t border-neutral-700">
                    <div class="bg-neutral-700/50 p-4 rounded-lg">
                        <p class="text-neutral-400 text-sm mb-1">Created</p>
                        <p class="text-white font-medium">{{ $product->created_at->format('M d, Y') }}</p>
                    </div>

                    <div class="bg-neutral-700/50 p-4 rounded-lg">
                        <p class="text-neutral-400 text-sm mb-1">Last Updated</p>
                        <p class="text-white font-medium">{{ $product->updated_at->format('M d, Y') }}</p>
                    </div>

                    <div class="bg-neutral-700/50 p-4 rounded-lg">
                        <p class="text-neutral-400 text-sm mb-1">Product ID</p>
                        <p class="text-white font-mono">{{ $product->id }}</p>
                    </div>
                </div>

                <!-- ADDITIONAL INFO -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-6 border-t border-neutral-700">
                    <div class="bg-neutral-700/50 p-4 rounded-lg">
                        <p class="text-neutral-400 text-sm mb-1">Featured</p>
                        <p class="text-white">{{ $product->is_featured ? '✓ Yes' : '✗ No' }}</p>
                    </div>

                    <div class="bg-neutral-700/50 p-4 rounded-lg">
                        <p class="text-neutral-400 text-sm mb-1">On Sale</p>
                        <p class="text-white">{{ $product->on_sale ? '✓ Yes' : '✗ No' }}</p>
                    </div>
                </div>

                <!-- ACTION BUTTONS -->
                <div class="flex gap-4 pt-6 border-t border-neutral-700">
                    <a href="{{ route('admin.products.edit', $product->id) }}"
                        class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition font-semibold">
                        ✏️ Edit Product
                    </a>

                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline"
                        onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition font-semibold">
                            🗑️ Delete Product
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection