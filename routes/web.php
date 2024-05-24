<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\StoreFront::class)->name('home');
Route::get('/products/{productId}', \App\Livewire\Product::class)->name('product.show');
Route::get('/cart', \App\Livewire\Cart::class)->name('cart.index');


Route::get('preview', function (){
    $cart = \App\Models\User::first()->cart;

    return new \App\Mail\AbandonedCartReminder($cart);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/checkout', \App\Livewire\CheckoutStatus::class)->name('checkout.show');
    Route::get('/order/{orderId}', \App\Livewire\ViewOrder::class)->name('order.show');
    Route::get('/orders', \App\Livewire\MyOrders::class)->name('order.index');
});
