<?php

namespace App\Livewire;

use App\Actions\WebShop\AddProductVariantToCart;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Attributes\Computed;
use App\Models\Product as ProductModel;
use Livewire\Component;

class Product extends Component
{
    use InteractsWithBanner;

    public $productId;

    public $variant ;

    public $rules = [
        'variant' => ['required','exists:App\Models\ProductVariant,id'],
    ];


    public function mount()
    {
        $this->variant = $this->product()->variants->value('id');
    }

    public function addToCart(AddProductVariantToCart $cart)
    {
        $this->validate();

        $cart->add(
            variantId: $this->variant,
        );

        $this->banner('Your product has been added to your cart');

        $this->dispatch('productAddedToCart');
    }

    #[Computed]
    public function product()
    {
        return ProductModel::findOrFail($this->productId);
    }

    public function render()
    {
        return view('livewire.product');
    }
}
