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
    Route::resource('/sizes', SizeController::class)->except('create');
    Route::get('/sizes/orders/{order}', [SizeController::class, 'create'])->name('sizes.create');
    Route::resource('/payments', SizeController::class)->except('index','create');
    Route::get('/payments/orders/{order}', [PaymentController::class, 'index'])->name('payments.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
