@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-neutral-900 p-8">
        <div class="max-w-7xl mx-auto">
            <!-- HEADER -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-4xl font-bold text-white">📦 Inventory Management</h1>
                    <a href="{{ route('admin.dashboard') }}"
                        class="px-4 py-2 bg-neutral-800 hover:bg-neutral-700 text-neutral-100 rounded-lg transition">
                        Back to Dashboard
                    </a>
                </div>

                <!-- SEARCH BAR -->
                <form method="GET" action="{{ url('/admin/inventory') }}" class="flex gap-2">
                    <input type="text" name="q" value="{{ $query ?? '' }}" placeholder="Search products..."
                        class="flex-1 px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white placeholder-neutral-500 focus:outline-none focus:border-brand-500">
                    <button type="submit"
                        class="px-6 py-2 bg-brand-600 hover:bg-brand-700 text-white rounded-lg transition">
                        Search
                    </button>
                </form>
            </div>

            <!-- INVENTORY TABLE -->
            <div class="bg-neutral-800 rounded-xl border border-neutral-700 overflow-hidden">
                <table class="w-full">
                    <thead class="bg-neutral-700 border-b border-neutral-600">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Product Name</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Price</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Status</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Featured</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">On Sale</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-neutral-200">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr class="border-b border-neutral-700 hover:bg-neutral-700/50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        @if($product->images && count($product->images) > 0)
                                            <img src="{{ $product->images[0] }}" alt="{{ $product->name }}"
                                                class="w-10 h-10 rounded object-cover">
                                        @else
                                            <div class="w-10 h-10 rounded bg-gradient-to-br from-brand-500 to-neutral-600"></div>
                                        @endif
                                        <span class="text-white font-medium">{{ $product->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-brand-400 font-semibold">₹{{ number_format($product->price, 2) }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-semibold {{ $product->is_active ? 'bg-green-900 text-green-200' : 'bg-red-900 text-red-200' }}">
                                        {{ $product->is_active ? '✓ Active' : '✗ Inactive' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-semibold {{ $product->is_featured ? 'bg-blue-900 text-blue-200' : 'bg-neutral-700 text-neutral-300' }}">
                                        {{ $product->is_featured ? '★ Featured' : 'Not Featured' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-semibold {{ $product->on_sale ? 'bg-yellow-900 text-yellow-200' : 'bg-neutral-700 text-neutral-300' }}">
                                        {{ $product->on_sale ? '🏷️ On Sale' : 'Regular' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('filament.admin.resources.products.edit', $product->id) }}"
                                        target="_blank" rel="noopener noreferrer"
                                        class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-xs rounded transition">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-neutral-400">
                                    No products found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- PAGINATION -->
            @if($products->count() > 0)
                <div class="mt-6">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection