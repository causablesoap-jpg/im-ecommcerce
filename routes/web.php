<?php

use App\Livewire\SuccessPage;
use App\Livewire\CancelPage;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\Auth\ForgotPasswordPage;
use App\Livewire\Auth\ResetPasswordPage;
use App\Livewire\MyOrderDetailPage;
use App\Livewire\MyOrdersPage;
use App\Livewire\CheckoutPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\CartPage;
use App\Livewire\ProductsPage;
use App\Livewire\CategoriesPage;
use App\Livewire\HomePage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', HomePage::class);
Route::get('/categories', CategoriesPage::class);
Route::get('/products', ProductsPage::class);
Route::get('/cart', CartPage::class);
Route::get('/products/{slug}', ProductDetailPage::class);
Route::get('/checkout', CheckoutPage::class);
Route::get('/my-orders', MyOrdersPage::class);
Route::get('/my-orders/{order_id}', MyOrderDetailPage::class)->name('my-orders.show');
Route::get('/success', SuccessPage::class)->name('success');
Route::get('/cancel', CancelPage::class)->name('cancel');

Route::middleware('guest')->group(function () {
    Route::get('/login', LoginPage::class)->name('login');
    Route::get('/register', RegisterPage::class);
    Route::get('/forgot', ForgotPasswordPage::class)->name('password.request');
    Route::get('/reset/{token}', ResetPasswordPage::class)->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', function () {
        auth()->logout();
        return redirect('/');
    });
    // Admin dashboard (protected)
    Route::get('/admin', [AdminController::class, 'index'])->middleware('is_admin')->name('admin.dashboard');

    // Admin product CRUD
    Route::middleware('is_admin')->group(function () {
        Route::resource('admin/products', AdminProductController::class)->names('admin.products');
        Route::resource('admin/categories', AdminCategoryController::class)->names('admin.categories');
        Route::resource('admin/brands', App\Http\Controllers\AdminBrandController::class)->names('admin.brands');
        // Filament compatibility: some Filament actions expect named routes like
        // 'filament.admin.resources.categories.index'. Provide a redirect route
        // so those calls don't throw a RouteNotFoundException.
        Route::get('/admin/filament/categories-compat', function () {
            return redirect()->route('admin.categories.index');
        })->name('filament.admin.resources.categories.index');
        // Additional compatibility routes so Filament-generated route names
        // resolve to the existing admin controllers. These do not replace
        // Filament's internal routes but provide named aliases that redirect
        // to your admin controllers.
        Route::get('/admin/filament/categories/create-compat', function () {
            return redirect()->route('admin.categories.create');
        })->name('filament.admin.resources.categories.create');

        Route::get('/admin/filament/categories/{record}-compat', function ($record) {
            return redirect()->route('admin.categories.show', $record);
        })->name('filament.admin.resources.categories.view');
        Route::get('/admin/filament/brands-compat', function () {
            return redirect()->route('admin.brands.index');
        })->name('filament.admin.resources.brands.index');

        Route::get('/admin/filament/brands/create-compat', function () {
            return redirect()->route('admin.brands.create');
        })->name('filament.admin.resources.brands.create');

        Route::get('/admin/filament/brands/{record}-compat', function ($record) {
            return redirect()->route('admin.brands.show', $record);
        })->name('filament.admin.resources.brands.view');

        // Filament products compatibility routes (index & create only)
        Route::get('/admin/filament/products-compat', function () {
            return redirect()->route('admin.products.index');
        })->name('filament.admin.resources.products.index');

        Route::get('/admin/filament/products/create-compat', function () {
            return redirect()->route('admin.products.create');
        })->name('filament.admin.resources.products.create');

        Route::get('/admin/inventory', [AdminController::class, 'inventory'])->name('admin.inventory');
        Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    });
});
