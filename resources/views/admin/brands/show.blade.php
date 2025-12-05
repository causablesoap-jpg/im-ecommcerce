@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-neutral-900 p-8">
        <div class="max-w-4xl mx-auto">
            <!-- HEADER -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-4xl font-bold text-white">🏷️ Brand Details</h1>
                    <div class="flex gap-3">
                        <a href="{{ route('admin.brands.index') }}"
                            class="px-4 py-2 bg-neutral-800 hover:bg-neutral-700 text-neutral-100 rounded-lg transition">
                            Back to Brands
                        </a>
                    </div>
                </div>
            </div>

            <!-- BRAND DETAILS CARD -->
            <div class="bg-neutral-800 rounded-xl border border-neutral-700 p-8 space-y-6">

                <!-- BRAND NAME -->
                <div class="flex items-center gap-4">
                    @if($brand->image)
                        <img src="{{ $brand->image }}" alt="{{ $brand->name }}" class="h-16 w-16 rounded object-contain">
                    @endif
                    <div>
                        <p class="text-neutral-400 text-sm uppercase font-semibold mb-2">Brand Name</p>
                        <h2 class="text-3xl font-bold text-white">{{ $brand->name }}</h2>
                    </div>
                </div>

                <!-- SLUG & DATES -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-neutral-400 text-sm uppercase font-semibold mb-2">URL Slug</p>
                        <div class="px-3 py-2 bg-neutral-700 text-neutral-300 rounded-lg font-mono text-sm">
                            {{ $brand->slug }}
                        </div>
                    </div>

                    <div>
                        <p class="text-neutral-400 text-sm uppercase font-semibold mb-2">Created Date</p>
                        <p class="text-white">{{ $brand->created_at->format('M d, Y \a\t H:i') }}</p>
                    </div>
                </div>

                <!-- STATUS -->
                <div>
                    <p class="text-neutral-400 text-sm uppercase font-semibold mb-2">Status</p>
                    <p class="text-white">{{ $brand->is_active ? 'Active' : 'Inactive' }}</p>
                </div>

                <!-- STATISTICS -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-4 border-t border-neutral-700">
                    <div class="bg-neutral-700/50 p-4 rounded-lg">
                        <p class="text-neutral-400 text-sm mb-1">Total Products</p>
                        <p class="text-2xl font-bold text-brand-400">{{ $productsCount }}</p>
                    </div>

                    <div class="bg-neutral-700/50 p-4 rounded-lg">
                        <p class="text-neutral-400 text-sm mb-1">Last Updated</p>
                        <p class="text-white">{{ $brand->updated_at->format('M d, Y') }}</p>
                    </div>

                    <div class="bg-neutral-700/50 p-4 rounded-lg">
                        <p class="text-neutral-400 text-sm mb-1">Brand ID</p>
                        <p class="text-white font-mono">{{ $brand->id }}</p>
                    </div>
                </div>

                <!-- ACTION BUTTONS -->
                <div class="flex gap-4 pt-6 border-t border-neutral-700">
                    <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" class="inline"
                        onsubmit="return confirm('Are you sure you want to delete this brand?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition font-semibold">
                            🗑️ Delete Brand
                        </button>
                    </form>
                </div>
            </div>

            <!-- PRODUCTS FOR THIS BRAND -->
            @if($productsCount > 0)
                <div class="mt-8">
                    <h3 class="text-2xl font-bold text-white mb-4">📦 Products for This Brand</h3>
                    <div class="bg-neutral-800 rounded-xl border border-neutral-700 overflow-hidden">
                        <table class="w-full">
                            <thead class="bg-neutral-700 border-b border-neutral-600">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Product Name</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Price</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Status</th>
                                    <th class="px-6 py-4 text-center text-sm font-semibold text-neutral-200">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($brand->products()->limit(10)->get() as $product)
                                    <tr class="border-b border-neutral-700 hover:bg-neutral-700/50 transition">
                                        <td class="px-6 py-4">
                                            <p class="text-white font-medium">{{ $product->name }}</p>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="text-brand-400 font-semibold">₹{{ number_format($product->price, 2) }}</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="px-3 py-1 rounded-full text-xs font-semibold {{ $product->is_active ? 'bg-green-900 text-green-200' : 'bg-red-900 text-red-200' }}">
                                                {{ $product->is_active ? '✓ Active' : '✗ Inactive' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="{{ route('filament.admin.resources.products.edit', $product->id) }}"
                                                target="_blank" rel="noopener noreferrer"
                                                class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-xs rounded transition">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection