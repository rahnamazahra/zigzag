<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocalSetController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SizeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('locale/{lang}', [LocalSetController::class, 'setLocale'])->name('setLocale');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('/customers', CustomerController::class);
    Route::resource('/orders', OrderController::class)->except('create');
    Route::get('/orders/customers/{customer}', [OrderController::class, 'create'])->name('orders.create');
    Route::resource('/sizes', SizeController::class)->except('create', 'edit', 'update');
    Route::get('/sizes/orders/{order}', [SizeController::class, 'create'])->name('sizes.create');
    Route::get('/sizes/orders/{order}', [SizeController::class, 'edit'])->name('sizes.edit');
    Route::put('/sizes/orders/{order}', [SizeController::class, 'update'])->name('sizes.update');
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/orders/{order}/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::get('/payments/orders/{order}', [PaymentController::class, 'show'])->name('payments.show');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
