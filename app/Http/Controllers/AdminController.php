<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $total_products = Product::count();
        $total_orders = Order::count();
        $total_users = User::count();
        $total_categories = Category::count();
        $total_revenue = Order::sum('grand_total');

        $query = $request->input('q');

        $productsQuery = Product::query()->orderBy('created_at', 'desc');
        if ($query) {
            $productsQuery->where('name', 'like', "%{$query}%");
        }

        $products = $productsQuery->paginate(10);
        if ($query) {
            $products->appends(['q' => $query]);
        }

        return view('livewire.admin-dashboard', compact('total_products', 'total_orders', 'total_users', 'total_categories', 'total_revenue', 'products', 'query'));
    }

    public function inventory(Request $request)
    {
        $query = $request->input('q');
        $productsQuery = Product::query()->orderBy('created_at', 'desc');
        
        if ($query) {
            $productsQuery->where('name', 'like', "%{$query}%");
        }

        $products = $productsQuery->paginate(15);
        if ($query) {
            $products->appends(['q' => $query]);
        }

        return view('admin.inventory.index', compact('products', 'query'));
    }

    public function orders(Request $request)
    {
        $query = $request->input('q');
        $ordersQuery = Order::query()->orderBy('created_at', 'desc')->with(['user', 'items']);
        
        if ($query) {
            $ordersQuery->where('order_number', 'like', "%{$query}%")
                       ->orWhereHas('user', function($q) use ($query) {
                           $q->where('name', 'like', "%{$query}%");
                       });
        }

        $orders = $ordersQuery->paginate(15);
        if ($query) {
            $orders->appends(['q' => $query]);
        }

        return view('admin.orders.index', compact('orders', 'query'));
    }

    public function users(Request $request)
    {
        $query = $request->input('q');
        $usersQuery = User::query()->orderBy('created_at', 'desc');
        
        if ($query) {
            $usersQuery->where('name', 'like', "%{$query}%")
                      ->orWhere('email', 'like', "%{$query}%");
        }

        $users = $usersQuery->paginate(15);
        if ($query) {
            $users->appends(['q' => $query]);
        }

        return view('admin.users.index', compact('users', 'query'));
    }
}
