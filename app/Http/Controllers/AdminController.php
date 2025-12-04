<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $total_products = Product::count();
        $total_orders = Order::count();
        $total_users = User::count();
        $total_revenue = Order::sum('grand_total');

        $query = $request->input('q');

        $productsQuery = Product::query()->orderBy('created_at', 'desc');
        if ($query) {
            $productsQuery->where('name', 'like', "%{$query}%");
        }

        // Use paginator so the view can call ->links(); keep search query in pagination links
        $products = $productsQuery->paginate(10);
        if ($query) {
            $products->appends(['q' => $query]);
        }

        return view('livewire.admin-dashboard', compact('total_products', 'total_orders', 'total_users', 'total_revenue', 'products', 'query'));
    }
}
