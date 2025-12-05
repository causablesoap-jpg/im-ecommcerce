@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-neutral-900 text-neutral-100 font-poppins py-10">
        <div class="max-w-[1100px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6 flex items-center justify-between">
                <h1 class="text-2xl font-bold text-brand-400">Products</h1>
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.products.create') }}" class="px-3 py-2 bg-brand-600 text-white rounded">+ New
                        Product</a>
                </div>
            </div>

            <div class="bg-neutral-800 rounded-lg border border-neutral-700 p-4">
                <form method="GET" action="{{ route('admin.products.index') }}" class="mb-4 flex gap-2">
                    <input name="q" value="{{ $q ?? '' }}"
                        class="flex-1 py-2 px-3 rounded bg-neutral-900 border border-neutral-700 text-sm"
                        placeholder="Search products...">
                    <button class="px-3 py-2 bg-brand-600 text-white rounded">Search</button>
                </form>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm divide-y divide-neutral-700">
                        <thead>
                            <tr class="text-neutral-300 text-left">
                                <th class="px-4 py-3">Product</th>
                                <th class="px-4 py-3">Category</th>
                                <th class="px-4 py-3">Price</th>
                                <th class="px-4 py-3">Stock</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-700">
                            @forelse($products as $product)
                                <tr class="hover:bg-neutral-900">
                                    <td class="px-4 py-3 flex items-center gap-3">
                                        @if(!empty($product->images) && is_array($product->images) && isset($product->images[0]))
                                            <img src="{{ url('storage', $product->images[0]) }}" alt="{{ $product->name }}"
                                                class="w-12 h-12 object-cover rounded">
                                        @else
                                            <div
                                                class="w-12 h-12 bg-neutral-700 rounded flex items-center justify-center text-xs text-neutral-400">
                                                No image</div>
                                        @endif
                                        <div>
                                            <div class="font-medium text-white">{{ $product->name }}</div>
                                            <div class="text-xs text-neutral-400">
                                                {{ Str::limit(strip_tags($product->description), 60) }}</div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-neutral-400">{{ $product->category?->name ?? '—' }}</td>
                                    <td class="px-4 py-3">{{ Number::currency($product->price, 'INR') }}</td>
                                    <td class="px-4 py-3">{{ $product->in_stock ?? 0 }}</td>
                                    <td class="px-4 py-3">@if($product->is_active) <span
                                    class="px-2 py-1 rounded bg-brand-900 text-brand-300 text-xs">Active</span> @else
                                            <span class="px-2 py-1 rounded bg-red-900 text-red-300 text-xs">Inactive</span> @endif
                                    </td>
                                    <td class="px-4 py-3 flex gap-2">
                                        <a href="{{ route('admin.products.show', $product->id) }}" class="text-brand-400">View</a>
                                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}"
                                            onsubmit="return confirm('Delete this product?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-6 text-center text-neutral-400">No products found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">{{ $products->links() }}</div>
            </div>
        </div>
    </div>
@endsection