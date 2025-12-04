<div
    class="min-h-screen bg-gradient-to-br from-neutral-950 via-neutral-900 to-neutral-950 text-neutral-100 font-poppins grid grid-cols-12 gap-0">
    <!-- Sticky Sidebar -->
    <aside
        class="col-span-12 lg:col-span-3 xl:col-span-2 bg-gradient-to-b from-neutral-900 to-neutral-950 border-r border-neutral-800 px-6 py-8 sticky top-0 h-screen overflow-y-auto">
        <div class="space-y-8">
            <!-- Logo/Brand -->
            <div class="flex items-center gap-3 pb-8 border-b border-neutral-700/50">
                <div
                    class="w-12 h-12 rounded-lg bg-gradient-to-br from-brand-500 to-brand-700 flex items-center justify-center text-white font-bold text-xl shadow-lg">
                    T</div>
                <div>
                    <div class="text-sm font-bold text-white">TechGear Parts</div>
                    <div class="text-xs text-neutral-400">Admin Panel v1.0</div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="space-y-2">
                <a href="/admin"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-semibold text-white bg-gradient-to-r from-brand-600 to-brand-700 shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-4m0 0l4 4"></path>
                    </svg>
                    Dashboard
                </a>
                <a href="/admin/products"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm text-neutral-300 hover:bg-neutral-800 hover:text-brand-400 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m0 0l8 4m-8-4v10l8 4m0-10l8 4m-8-4v10"></path>
                    </svg>
                    Products
                </a>
                <a href="/admin/orders"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm text-neutral-300 hover:bg-neutral-800 hover:text-brand-400 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    Orders
                </a>
                <a href="/admin/users"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm text-neutral-300 hover:bg-neutral-800 hover:text-brand-400 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 12H9m4 5h-4m2-5a2 2 0 100-4 2 2 0 000 4z"></path>
                    </svg>
                    Users
                </a>
                <a href="/admin/settings"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm text-neutral-300 hover:bg-neutral-800 hover:text-brand-400 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                        </path>
                    </svg>
                    Settings
                </a>
            </nav>

            <!-- Quick Actions -->
            <div class="pt-8 border-t border-neutral-700/50 space-y-3">
                <p class="text-xs font-semibold text-neutral-400 uppercase tracking-wider">Quick Actions</p>
                <a href="{{ route('admin.products.create') }}"
                    class="flex items-center justify-center gap-2 px-4 py-3 rounded-lg bg-gradient-to-r from-brand-600 to-brand-700 text-white hover:from-brand-700 hover:to-brand-800 transition-all font-medium text-sm shadow-md">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    New Product
                </a>
                <a href="/admin/products"
                    class="flex items-center justify-center gap-2 px-4 py-3 rounded-lg bg-neutral-800 text-neutral-300 hover:bg-neutral-700 transition-all text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                        </path>
                    </svg>
                    All Products
                </a>
            </div>

            <!-- Sidebar Footer -->
            <div class="pt-8 border-t border-neutral-700/50 mt-auto">
                <div class="p-3 rounded-lg bg-neutral-800/50 text-xs text-neutral-400">
                    <p class="font-semibold text-neutral-300 mb-1">Support</p>
                    <p>Help & Documentation</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="col-span-12 lg:col-span-9 xl:col-span-10 px-4 sm:px-6 lg:px-8 py-8">
        <div class="max-w-[1400px] mx-auto space-y-8">
            <!-- Top Bar -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div>
                    <h1 class="text-4xl sm:text-5xl font-bold text-white mb-2">Dashboard</h1>
                    <p class="text-neutral-400">Welcome back to your admin panel. Here's your store performance.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button
                        class="px-4 py-2 rounded-lg bg-neutral-800 border border-neutral-700 text-sm text-neutral-300 hover:bg-neutral-700 transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        Export
                    </button>
                    <a href="{{ route('admin.products.create') }}"
                        class="px-4 py-2 rounded-lg bg-gradient-to-r from-brand-600 to-brand-700 text-white hover:from-brand-700 hover:to-brand-800 transition-all font-medium text-sm shadow-md flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        New Product
                    </a>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <!-- Total Products -->
                <div class="group relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-brand-600/10 to-brand-500/10 rounded-xl blur opacity-0 group-hover:opacity-100 transition duration-500">
                    </div>
                    <div
                        class="relative p-6 rounded-xl bg-neutral-800 border border-neutral-700 hover:border-brand-600/50 transition-all hover:shadow-xl">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <p class="text-xs uppercase font-semibold text-neutral-400 tracking-wider">Total
                                    Products</p>
                                <p class="text-4xl font-bold text-white mt-4">{{ $total_products ?? '0' }}</p>
                                <p class="text-xs text-neutral-400 mt-3">
                                    <span class="text-green-400 font-semibold">+12%</span> from last month
                                </p>
                            </div>
                            <div class="p-3 rounded-lg bg-brand-600/20">
                                <svg class="w-6 h-6 text-brand-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 7l-8-4-8 4m0 0l8 4m-8-4v10l8 4m0-10l8 4m-8-4v10"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Orders -->
                <div class="group relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-blue-600/10 to-blue-500/10 rounded-xl blur opacity-0 group-hover:opacity-100 transition duration-500">
                    </div>
                    <div
                        class="relative p-6 rounded-xl bg-neutral-800 border border-neutral-700 hover:border-blue-600/50 transition-all hover:shadow-xl">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <p class="text-xs uppercase font-semibold text-neutral-400 tracking-wider">Total Orders
                                </p>
                                <p class="text-4xl font-bold text-white mt-4">{{ $total_orders ?? '0' }}</p>
                                <p class="text-xs text-neutral-400 mt-3">
                                    <span class="text-green-400 font-semibold">+8%</span> from last month
                                </p>
                            </div>
                            <div class="p-3 rounded-lg bg-blue-600/20">
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Users -->
                <div class="group relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-purple-600/10 to-purple-500/10 rounded-xl blur opacity-0 group-hover:opacity-100 transition duration-500">
                    </div>
                    <div
                        class="relative p-6 rounded-xl bg-neutral-800 border border-neutral-700 hover:border-purple-600/50 transition-all hover:shadow-xl">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <p class="text-xs uppercase font-semibold text-neutral-400 tracking-wider">Total Users
                                </p>
                                <p class="text-4xl font-bold text-white mt-4">{{ $total_users ?? '0' }}</p>
                                <p class="text-xs text-neutral-400 mt-3">
                                    <span class="text-green-400 font-semibold">+15%</span> from last month
                                </p>
                            </div>
                            <div class="p-3 rounded-lg bg-purple-600/20">
                                <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 12H9m4 5h-4m2-5a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Revenue -->
                <div class="group relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-amber-600/10 to-amber-500/10 rounded-xl blur opacity-0 group-hover:opacity-100 transition duration-500">
                    </div>
                    <div
                        class="relative p-6 rounded-xl bg-neutral-800 border border-neutral-700 hover:border-amber-600/50 transition-all hover:shadow-xl">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <p class="text-xs uppercase font-semibold text-neutral-400 tracking-wider">Total Revenue
                                </p>
                                <p class="text-4xl font-bold text-white mt-4">₹{{ $total_revenue ?? '0' }}</p>
                                <p class="text-xs text-neutral-400 mt-3">
                                    <span class="text-green-400 font-semibold">+24%</span> from last month
                                </p>
                            </div>
                            <div class="p-3 rounded-lg bg-amber-600/20">
                                <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Grid: Products + Sidebar -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Products Section (Left 2/3) -->
                <div class="lg:col-span-2">
                    <div class="space-y-5">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold text-white">Recent Products</h2>
                                <p class="text-sm text-neutral-400 mt-1">Manage your product inventory</p>
                            </div>
                            <a href="/admin/products"
                                class="text-sm text-brand-400 hover:text-brand-300 font-medium flex items-center gap-2">
                                View All
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>

                        <!-- Products Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            @forelse($products as $product)
                                <a href="/products/{{ $product->slug ?? '#' }}" class="group">
                                    <div
                                        class="relative overflow-hidden rounded-xl bg-neutral-800 border border-neutral-700 hover:border-brand-600/50 transition-all h-full flex flex-col shadow-sm hover:shadow-lg">
                                        <!-- Image Section -->
                                        <div class="relative w-full h-40 overflow-hidden bg-neutral-900">
                                            @if(!empty($product->images) && is_array($product->images) && isset($product->images[0]))
                                                <img src="{{ url('storage', $product->images[0]) }}" alt="{{ $product->name }}"
                                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                            @else
                                                <div
                                                    class="w-full h-full bg-gradient-to-br from-neutral-700 to-neutral-800 flex items-center justify-center">
                                                    <svg class="w-12 h-12 text-neutral-600" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            @endif
                                            <div
                                                class="absolute top-3 right-3 px-2 py-1 rounded-lg bg-brand-600 text-white text-xs font-semibold">
                                                Sale
                                            </div>
                                        </div>

                                        <!-- Content Section -->
                                        <div class="flex-1 p-4 flex flex-col">
                                            <h3
                                                class="text-sm font-semibold text-white line-clamp-2 group-hover:text-brand-400 transition">
                                                {{ $product->name }}</h3>
                                            <p class="text-xs text-neutral-400 mt-2 line-clamp-2">
                                                {{ Str::limit(strip_tags($product->description), 50) }}</p>
                                            <div class="flex items-baseline gap-2 mt-3 mb-4">
                                                <span
                                                    class="text-lg font-bold text-brand-400">{{ Number::currency($product->price, 'INR') }}</span>
                                                <span class="text-xs text-neutral-500 line-through">₹999</span>
                                            </div>
                                            <div class="text-xs text-neutral-400 mb-4 flex items-center gap-1">
                                                <span class="inline-block w-2 h-2 rounded-full bg-green-400"></span>
                                                {{ $product->in_stock ?? 0 }} in stock
                                            </div>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="p-4 border-t border-neutral-700 flex gap-2">
                                            <a href="{{ route('admin.products.edit', $product) }}"
                                                class="flex-1 flex items-center justify-center px-3 py-2 text-xs font-semibold rounded-lg bg-neutral-700 text-brand-400 hover:bg-neutral-600 transition">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                                Edit
                                            </a>
                                            <form method="POST" action="{{ route('admin.products.destroy', $product) }}"
                                                onsubmit="return confirm('Delete this product?');" class="flex-1">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="w-full flex items-center justify-center px-3 py-2 text-xs font-semibold rounded-lg bg-neutral-700 text-red-400 hover:bg-neutral-600 transition">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div
                                    class="col-span-2 text-center py-12 rounded-xl border border-dashed border-neutral-700">
                                    <svg class="w-12 h-12 text-neutral-600 mx-auto mb-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 7l-8-4-8 4m0 0l8 4m-8-4v10l8 4m0-10l8 4m-8-4v10"></path>
                                    </svg>
                                    <p class="text-neutral-400 font-medium">No products found</p>
                                    <p class="text-xs text-neutral-500 mt-1">Create your first product to get started</p>
                                </div>
                            @endforelse
                        </div>

                        <!-- Pagination -->
                        @if($products->hasPages())
                            <div class="mt-6 flex justify-end">
                                {{ $products->links() }}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Right Sidebar -->
                <div class="lg:col-span-1">
                    <div class="space-y-6">
                        <!-- Recent Orders Card -->
                        <div
                            class="p-6 rounded-xl bg-neutral-800 border border-neutral-700 hover:border-neutral-600 transition-all">
                            <div class="flex items-center justify-between mb-5">
                                <h3 class="text-lg font-bold text-white">Recent Orders</h3>
                                <a href="/admin/orders"
                                    class="text-xs text-brand-400 hover:text-brand-300 font-medium">View All</a>
                            </div>
                            <ul class="space-y-4">
                                <li
                                    class="flex items-center justify-between p-3 rounded-lg bg-neutral-900/50 hover:bg-neutral-900 transition">
                                    <div>
                                        <p class="text-sm font-semibold text-white">#1025</p>
                                        <p class="text-xs text-neutral-400 mt-1">3 items • Processing</p>
                                    </div>
                                    <span
                                        class="text-xs px-2.5 py-1 rounded-full bg-yellow-500/20 text-yellow-300 font-medium">2h</span>
                                </li>
                                <li
                                    class="flex items-center justify-between p-3 rounded-lg bg-neutral-900/50 hover:bg-neutral-900 transition">
                                    <div>
                                        <p class="text-sm font-semibold text-white">#1024</p>
                                        <p class="text-xs text-neutral-400 mt-1">2 items • Delivered</p>
                                    </div>
                                    <span
                                        class="text-xs px-2.5 py-1 rounded-full bg-green-500/20 text-green-300 font-medium">1d</span>
                                </li>
                                <li
                                    class="flex items-center justify-between p-3 rounded-lg bg-neutral-900/50 hover:bg-neutral-900 transition">
                                    <div>
                                        <p class="text-sm font-semibold text-white">#1023</p>
                                        <p class="text-xs text-neutral-400 mt-1">5 items • Shipped</p>
                                    </div>
                                    <span
                                        class="text-xs px-2.5 py-1 rounded-full bg-blue-500/20 text-blue-300 font-medium">2d</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Low Stock Card -->
                        <div
                            class="p-6 rounded-xl bg-neutral-800 border border-neutral-700 hover:border-neutral-600 transition-all">
                            <div class="flex items-center justify-between mb-5">
                                <h3 class="text-lg font-bold text-white">Low Stock Items</h3>
                                <span
                                    class="text-xs px-2.5 py-1 rounded-full bg-red-500/20 text-red-300 font-medium">{{ count($products->where('in_stock', '<=', 5)) }}</span>
                            </div>
                            <ul class="space-y-3">
                                @forelse($products->where('in_stock', '<=', 5)->take(5) as $low)
                                    <li
                                        class="flex items-center justify-between p-3 rounded-lg bg-neutral-900/50 hover:bg-neutral-900 transition group">
                                        <div class="flex-1 min-w-0">
                                            <p
                                                class="text-sm font-medium text-white truncate group-hover:text-brand-400 transition">
                                                {{ $low->name }}</p>
                                            <p class="text-xs text-neutral-400 mt-1">SKU: {{ substr($low->id, 0, 6) }}</p>
                                        </div>
                                        <span
                                            class="text-xs px-2.5 py-1 rounded-full bg-red-500/20 text-red-300 font-semibold whitespace-nowrap ml-2">{{ $low->in_stock ?? 0 }}
                                            left</span>
                                    </li>
                                @empty
                                    <li class="text-center py-6 text-neutral-400">
                                        <svg class="w-8 h-8 mx-auto mb-2 text-neutral-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <p class="text-sm">All items in stock</p>
                                    </li>
                                @endforelse
                            </ul>
                        </div>

                        <!-- Quick Stats Card -->
                        <div
                            class="p-6 rounded-xl bg-gradient-to-br from-brand-900/30 to-brand-800/20 border border-brand-700/50 hover:border-brand-600/50 transition-all">
                            <h3 class="text-lg font-bold text-white mb-4">Performance</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-sm text-neutral-300">Conversion Rate</span>
                                        <span class="text-sm font-semibold text-brand-400">3.24%</span>
                                    </div>
                                    <div class="w-full h-2 bg-neutral-700 rounded-full overflow-hidden">
                                        <div class="h-full w-1/3 bg-gradient-to-r from-brand-600 to-brand-500"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-sm text-neutral-300">Avg. Order Value</span>
                                        <span class="text-sm font-semibold text-brand-400">₹4,250</span>
                                    </div>
                                    <div class="w-full h-2 bg-neutral-700 rounded-full overflow-hidden">
                                        <div class="h-full w-3/5 bg-gradient-to-r from-brand-600 to-brand-500"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>