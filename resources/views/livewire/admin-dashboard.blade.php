<!--
TechGear Parts Admin Dashboard
Redesigned for full eCommerce management based on the 20 core system features.
Built with Blade + TailwindCSS.
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TechGear Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-neutral-900 text-white flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-neutral-950 border-r border-neutral-800 h-screen fixed left-0 top-0 p-6 overflow-y-auto">
        <h1 class="text-2xl font-bold mb-8 text-brand-400">TechGear Admin</h1>

        <nav class="space-y-6">
            <div>
                <p class="text-neutral-500 text-xs uppercase mb-2">Dashboard</p>
                <a href="#" class="block py-2 px-3 rounded-lg bg-brand-700/20 text-brand-400 font-semibold">Overview</a>
            </div>

            <div>
                <p class="text-neutral-500 text-xs uppercase mb-2">Store Management</p>
                <div class="space-y-2">
                    <a href="{{ route('admin.products.index') }}"
                        class="block py-2 px-3 rounded-lg hover:bg-neutral-800 transition">📦 Products</a>
                    <a href="{{ route('admin.categories.index') }}"
                        class="block py-2 px-3 rounded-lg hover:bg-neutral-800 transition">📂 Categories</a>

                    <a href="{{ route('admin.brands.index') }}"
                        class="block py-2 px-3 rounded-lg hover:bg-neutral-800 transition">🏷️ Brands</a>

                    <a href="{{ url('/admin/inventory') }}"
                        class="block py-2 px-3 rounded-lg hover:bg-neutral-800 transition">📊 Inventory</a>
                    <a href="{{ url('/admin/orders') }}"
                        class="block py-2 px-3 rounded-lg hover:bg-neutral-800 transition">📋 Orders</a>
                    <a href="{{ url('/admin/users') }}"
                        class="block py-2 px-3 rounded-lg hover:bg-neutral-800 transition">👥 Users</a>
                </div>
            </div>

            <div>
                <p class="text-neutral-500 text-xs uppercase mb-2">System Features</p>
                <div class="space-y-2">
                    <a href="#" class="block py-2 px-3 rounded-lg hover:bg-neutral-800">Reviews</a>
                    <a href="#" class="block py-2 px-3 rounded-lg hover:bg-neutral-800">Promo Codes</a>
                    <a href="#" class="block py-2 px-3 rounded-lg hover:bg-neutral-800">Compatibility Checker</a>
                    <a href="#" class="block py-2 px-3 rounded-lg hover:bg-neutral-800">Support Tickets</a>
                </div>
            </div>
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="ml-64 w-full p-8 space-y-10">

        <!-- TOP BAR -->
        <header class="flex items-center justify-between">
            <h2 class="text-3xl font-bold">Dashboard Overview</h2>
            <div class="flex items-center gap-4">
                <input type="text" placeholder="Search..." class="bg-neutral-800 px-4 py-2 rounded-lg" />
                <button class="px-4 py-2 bg-brand-600 rounded-lg">Export</button>
            </div>
        </header>

        <!-- STATS GRID -->
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
            <a href="{{ route('admin.products.index') }}"
                class="bg-neutral-800 p-5 rounded-xl border border-neutral-700 hover:border-brand-500 hover:bg-neutral-700/50 transition cursor-pointer transform hover:-translate-y-1">
                <p class="text-sm text-neutral-400">📦 Total Products</p>
                <h3 class="text-2xl font-bold">{{ $total_products ?? '0' }}</h3>
                <p class="text-xs text-neutral-500 mt-2">Click to manage</p>
            </a>

            <a href="{{ route('admin.categories.index') }}"
                class="bg-neutral-800 p-5 rounded-xl border border-neutral-700 hover:border-brand-500 hover:bg-neutral-700/50 transition cursor-pointer transform hover:-translate-y-1">
                <p class="text-sm text-neutral-400">📂 Categories</p>
                <h3 class="text-2xl font-bold">{{ $total_categories ?? '0' }}</h3>
                <p class="text-xs text-neutral-500 mt-2">Click to manage</p>
            </a>

            <a href="{{ url('/admin/orders') }}"
                class="bg-neutral-800 p-5 rounded-xl border border-neutral-700 hover:border-brand-500 hover:bg-neutral-700/50 transition cursor-pointer transform hover:-translate-y-1">
                <p class="text-sm text-neutral-400">📋 Orders</p>
                <h3 class="text-2xl font-bold">{{ $total_orders ?? '0' }}</h3>
                <p class="text-xs text-neutral-500 mt-2">Click to view</p>
            </a>

            <a href="{{ url('/admin/users') }}"
                class="bg-neutral-800 p-5 rounded-xl border border-neutral-700 hover:border-brand-500 hover:bg-neutral-700/50 transition cursor-pointer transform hover:-translate-y-1">
                <p class="text-sm text-neutral-400">👥 Users</p>
                <h3 class="text-2xl font-bold">{{ $total_users ?? '0' }}</h3>
                <p class="text-xs text-neutral-500 mt-2">Click to manage</p>
            </a>

            <a href="{{ route('admin.brands.index') }}"
                class="bg-neutral-800 p-5 rounded-xl border border-neutral-700 hover:border-brand-500 hover:bg-neutral-700/50 transition cursor-pointer transform hover:-translate-y-1">
                <p class="text-sm text-neutral-400">🏷️ Brands</p>
                <h3 class="text-2xl font-bold">{{ $total_brands ?? '0' }}</h3>
                <p class="text-xs text-neutral-500 mt-2">Click to manage</p>
            </a>

            <div class="bg-neutral-800 p-5 rounded-xl border border-neutral-700">
                <p class="text-sm text-neutral-400">💰 Total Revenue</p>
                <h3 class="text-2xl font-bold">₹{{ $total_revenue ?? '0' }}</h3>
                <p class="text-xs text-neutral-500 mt-2">Total sales</p>
            </div>
        </section>

        <!-- PRODUCT LIST EXAMPLE -->
        <section>
            <h3 class="text-xl font-semibold mb-4">Latest Products</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach(range(1, 8) as $i)
                    <div class="bg-neutral-800 rounded-xl p-4 border border-neutral-700 hover:border-brand-500 transition">
                        <img src="https://via.placeholder.com/200" class="rounded-lg mb-3" />
                        <h4 class="font-semibold">Tech Component {{ $i }}</h4>
                        <p class="text-sm text-neutral-400">High-performance part for PC builds.</p>
                        <p class="mt-2 font-semibold text-brand-400">₱{{ rand(1500, 8000) }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- RECENT ORDERS -->
        <section class="bg-neutral-800 p-6 rounded-xl border border-neutral-700">
            <h3 class="text-xl font-semibold mb-4">Recent Orders</h3>
            <table class="w-full text-left text-sm">
                <thead class="text-neutral-400 border-b border-neutral-700">
                    <tr>
                        <th class="py-2">Order ID</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(["Processing", "Shipped", "Delivered", "Cancelled"] as $status)
                        <tr class="border-b border-neutral-700/50">
                            <td class="py-3">#TG-{{ rand(10000, 99999) }}</td>
                            <td>John Doe</td>
                            <td>{{ $status }}</td>
                            <td>₱{{ rand(1200, 9000) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

    </main>
</body>

</html>