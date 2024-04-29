<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Product extends Component
{
    #[Layout('layouts.app')]

    public $productId;

    public function mount()
    {

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
