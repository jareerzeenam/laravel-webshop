<?php

namespace App\Actions\WebShop;

use App\Factories\CartFactory;
use App\Models\Cart;

class AddProductVariantToCart
{
    public function add($variantId)
    {
        CartFactory::make()->items()->firstOrCreate(
            [
            'product_variant_id' => $variantId,
            ],
            [
            'quantity' => 0,
        ])->increment('quantity');
    }
}
