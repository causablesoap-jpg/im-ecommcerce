@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-neutral-900 p-8">
        <div class="max-w-7xl mx-auto">
            <!-- HEADER -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-4xl font-bold text-white">📋 Orders Management</h1>
                    <a href="{{ route('admin.dashboard') }}"
                        class="px-4 py-2 bg-neutral-800 hover:bg-neutral-700 text-neutral-100 rounded-lg transition">
                        Back to Dashboard
                    </a>
                </div>

                <!-- SEARCH BAR -->
                <form method="GET" action="{{ url('/admin/orders') }}" class="flex gap-2">
                    <input type="text" name="q" value="{{ $query ?? '' }}"
                        placeholder="Search by order number or customer name..."
                        class="flex-1 px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white placeholder-neutral-500 focus:outline-none focus:border-brand-500">
                    <button type="submit"
                        class="px-6 py-2 bg-brand-600 hover:bg-brand-700 text-white rounded-lg transition">
                        Search
                    </button>
                </form>
            </div>

            <!-- ORDERS TABLE -->
            <div class="bg-neutral-800 rounded-xl border border-neutral-700 overflow-hidden">
                <table class="w-full">
                    <thead class="bg-neutral-700 border-b border-neutral-600">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Order #</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Customer</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Items</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Total</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Payment Status</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Shipping Status</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-200">Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr class="border-b border-neutral-700 hover:bg-neutral-700/50 transition">
                                <td class="px-6 py-4">
                                    <span class="font-bold text-brand-400">#{{ $order->order_number ?? $order->id }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="text-white font-medium">{{ $order->user->name ?? 'N/A' }}</p>
                                        <p class="text-neutral-400 text-sm">{{ $order->user->email ?? 'N/A' }}</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-neutral-300">{{ $order->items->count() ?? 0 }} item(s)</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="text-green-400 font-semibold">₹{{ number_format($order->grand_total ?? 0, 2) }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-semibold 
                                        {{ ($order->payment_status ?? 'pending') == 'paid' ? 'bg-green-900 text-green-200' : 'bg-yellow-900 text-yellow-200' }}">
                                        {{ ucfirst($order->payment_status ?? 'Pending') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-semibold 
                                        {{ ($order->shipping_status ?? 'pending') == 'delivered' ? 'bg-green-900 text-green-200' : 'bg-blue-900 text-blue-200' }}">
                                        {{ ucfirst($order->shipping_status ?? 'Pending') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-neutral-300 text-sm">
                                    {{ $order->created_at->format('M d, Y') ?? 'N/A' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-neutral-400">
                                    No orders found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- PAGINATION -->
            @if($orders->count() > 0)
                <div class="mt-6">
                    {{ $orders->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection