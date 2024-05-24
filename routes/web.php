<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\StoreFront::class)->name('home');
Route::get('/products/{productId}', \App\Livewire\Product::class)->name('product.show');
Route::get('/cart', \App\Livewire\Cart::class)->name('cart.show');


Route::get('preview', function (){
    $order = \App\Models\Order::find(8);

    return new \App\Mail\OrderConfirmation($order);
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
