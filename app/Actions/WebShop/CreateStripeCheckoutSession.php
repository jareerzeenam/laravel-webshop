<?php

namespace App\Actions\WebShop;

use App\Enums\CurrencyEnum;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Database\Eloquent\Collection;

class CreateStripeCheckoutSession
{
    public function createFromCart(Cart $cart)
    {
        return $cart->user
            ->allowPromotionCodes()
            ->checkout(
            $this->formatCartItems($cart->items),
                [
                    'customer_update' => [
                        'shipping'=>'auto',
                    ],
                    'shipping_address_collection' => [
                        'allowed_countries' => ['GB','US','CA','AU'],
                    ],
                    'success_url' => route('checkout.show').'?session_id={CHECKOUT_SESSION_ID}',
                    'cancel_url' => route('cart.index'),
                    'metadata' => [
                        'user_id' => $cart->user->id,
                        'cart_id' => $cart->id,
                    ],
                ],
        );
    }

    private function formatCartItems(Collection $items)
    {
        return $items->loadMissing('product','variant')->map(function(CartItem $item){
            return [
                'price_data' => [
                    'currency' => CurrencyEnum::GBP->value,
                    'unit_amount' => $item->product->price->getAmount(),
                    'product_data' => [
                        'name' => $item->product->name,
                        'description' => "Size: {$item->variant->size} - Color: {$item->variant->color}",
                        'metadata' => [
                            'product_id' => $item->product->id,
                            'product_variant_id' => $item->product_variant_id,
                        ],
                    ],
                ],
                'quantity' => $item->quantity,
            ];
        })->toArray();
    }
}
