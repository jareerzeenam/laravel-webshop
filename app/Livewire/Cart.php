<?php

namespace App\Livewire;

use App\Actions\WebShop\CreateStripeCheckoutSession;
use App\Factories\CartFactory;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Cart extends Component
{
    #[Layout('layouts.app')]

    public function checkout(CreateStripeCheckoutSession $checkoutSession)
    {
        return $checkoutSession->createFromCart($this->cart);
    }

    public function getCartProperty()
    {
        return CartFactory::make()->loadMissing(['items', 'items.product','items.variant']);
    }

    public function getItemsProperty()
    {
        return $this->cart->items;
    }

    public function delete($itemId)
    {
        $this->cart->items()->where('id', $itemId)->delete();

        $this->dispatch('productRemovedFromCart');
    }

    public function increment($itemId)
    {
        $this->cart->items()->find($itemId)?->increment('quantity');
    }
    public function decrement($itemId)
    {
        $item = $this->cart->items()->find($itemId);
        if ($item->quantity > 1) {
            $item->decrement('quantity');
        }
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
