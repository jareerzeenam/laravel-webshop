<?php

namespace App\Livewire;

use App\Actions\WebShop\AddProductVariantToCart;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Product extends Component
{
    use InteractsWithBanner;
    #[Layout('layouts.app')]

    public $productId;

    public $variant ;

    public $rules = [
        'variant' => ['required','exists:App\Models\ProductVariant,id'],
    ];


    public function mount()
    {
        $this->variant = $this->getProductProperty()->variants->value('id');
    }

    public function addToCart(AddProductVariantToCart $cart)
    {
        $this->validate();

        $cart->add(
            variantId: $this->variant,
        );

        $this->banner('Your product has been added to your cart');
    }

    public function getProductProperty()
    {
        return \App\Models\Product::findOrFail($this->productId);
    }

    public function render()
    {
        return view('livewire.product');
    }
}
