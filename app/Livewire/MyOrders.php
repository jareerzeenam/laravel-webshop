<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class MyOrders extends Component
{
    #[Layout('layouts.app')]

    public function getOrdersProperty()
    {
        return auth()->user()->orders;
    }

    public function render()
    {
        return view('livewire.my-orders');
    }
}
