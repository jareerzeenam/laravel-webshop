<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\StoreFront::class)->name('home');
Route::get('/products/{productId}', \App\Livewire\Product::class)->name('product.show');
Route::get('/cart', \App\Livewire\Cart::class)->name('cart.show');
Route::get('/checkout', \App\Livewire\CheckoutStatus::class)->name('checkout.show');

Route::get('preview', function (){
    $order = \App\Models\Order::find(8);

    return new \App\Mail\OrderConfirmation($order);
});

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});
