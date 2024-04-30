<?php

namespace App\Livewire;

use App\Actions\WebShop\AddProductVariantToCart;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Product extends Component
{
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
