<?php

namespace App\Actions\WebShop;

use App\Models\Cart;

class MigrateSessionCart
{
    public function migrate(Cart $sessionCart, Cart $userCart)
    {
        $sessionCart->items->each(fn($item) => (new AddProductVariantToCart())->add(
            variantId: $item->product_variant_id,
            quantity: $item->quantity,
            cart: $userCart
        ));

        $sessionCart->items()->delete();
        $sessionCart->delete();
    }
}
