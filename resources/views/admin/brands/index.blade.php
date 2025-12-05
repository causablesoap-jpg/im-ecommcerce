@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-neutral-900 p-8">
        <div class="max-w-7xl mx-auto">
            <!-- HEADER -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-4xl font-bold text-white">🏷️ Brands Management</h1>
                    <div class="flex gap-3">
                        <a href="{{ route('admin.dashboard') }}"
                            class="px-4 py-2 bg-neutral-800 hover:bg-neutral-700 text-neutral-100 rounded-lg transition">
                            Back to Dashboard
                        </a>
                        <a href="{{ route('admin.brands.create') }}"
                            class="px-4 py-2 bg-brand-600 hover:bg-brand-700 text-white rounded-lg transition font-semibold">
                            + Create Brand
                        </a>
                    </div>
                </div>

                <!-- SEARCH BAR -->
                <form method="GET" action="{{ route('admin.brands.index') }}" class="flex gap-2">
                    <input type="text" name="q" value="{{ $query ?? '' }}" placeholder="Search brands..."
                        class="flex-1 px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white placeholder-neutral-500 focus:outline-none focus:border-brand-500">
                    <button type="submit"
                        class="px-6 py-2 bg-brand-600 hover:bg-brand-700 text-white rounded-lg transition">
                        Search
                    </button>
                </form>
            </div>

            <!-- BRANDS TABLE -->
            <div class="bg-neutral-800 rounded-xl border border-neutral-700 overflow-hidden">
                <table class="w-full">
                    <thead class="bg-neutral-700 border-b border-neutral-600">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">ID</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Brand Name</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Slug</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Image</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Status</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-neutral-200">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($brands as $brand)
                            <tr class="border-b border-neutral-700 hover:bg-neutral-700/50 transition">
                                <td class="px-6 py-4">
                                    <span class="font-mono text-neutral-400">#{{ $brand->id }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-white font-semibold">{{ $brand->name }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 bg-neutral-700 text-neutral-300 rounded text-xs font-mono">{{ $brand->slug }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($brand->image)
                                        <img src="{{ $brand->image }}" alt="{{ $brand->name }} logo" class="h-8 w-auto rounded">
                                    @else
                                        <span class="text-neutral-400">N/A</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-semibold {{ $brand->is_active ? 'bg-green-900 text-green-200' : 'bg-red-900 text-red-200' }}">
                                        {{ $brand->is_active ? '✓ Active' : '✗ Inactive' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('admin.brands.show', $brand->id) }}"
                                            class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white text-xs rounded transition">
                                            View
                                        </a>
                                        <!-- Edit removed per request -->
                                        <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST"
                                            class="inline" onsubmit="return confirm('Delete this brand?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-xs rounded transition">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-neutral-400">
                                    No brands found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- PAGINATION -->
            @if($brands->count() > 0)
                <div class="mt-6">
                    {{ $brands->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection