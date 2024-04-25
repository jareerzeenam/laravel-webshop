<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

class StoreFront extends Component
{
    #[Layout('layouts.app')]

    public function getProductsProperty()
    {
        return Product::query()->get();
    }

    public function render()
    {
        return view('livewire.store-front');
    }
}
