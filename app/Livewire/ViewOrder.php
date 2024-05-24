<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ViewOrder extends Component
{
    #[Layout('layouts.app')]

    public $orderId;

    public function mount($orderId)
    {
        $this->orderId = $orderId;
    }

    public function getOrderProperty()
    {
        return auth()->user()->orders()->findOrFail($this->orderId);
    }
    public function render()
    {
        return view('livewire.view-order');
    }
}
