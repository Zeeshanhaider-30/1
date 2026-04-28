<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StorefrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StorefrontController::class, 'front'])->name('front');
Route::get('/products', [StorefrontController::class, 'products'])->name('products.index');
Route::get('/products/{product:slug}', [StorefrontController::class, 'show'])->name('products.show');
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('index');
    Route::get('/products', [AdminDashboardController::class, 'products'])->name('products');
    Route::get('/orders', [AdminDashboardController::class, 'orders'])->name('orders');
    Route::get('/order-items', [AdminDashboardController::class, 'orderItems'])->name('order-items');
    Route::get('/customers', [AdminDashboardController::class, 'customers'])->name('customers');
    Route::get('/admins', [AdminDashboardController::class, 'admins'])->name('admins');
});

require __DIR__.'/auth.php';
