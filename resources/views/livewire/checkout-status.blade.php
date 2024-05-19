<div class=" {{$this->order ? 'bg-green-400' : 'bg-red-400'}} rounded shadow mt-12 p-5 max-w-xl mx-auto">
    @if($this->order)
        <div>
            Your order has been placed successfully. Your order number is <span class="font-bold">(#{{ $this->order->id }})</span>.
        </div>
    @else
        <div wire:poll>
            Waiting for payment confirmation. Please standby.
        </div>
    @endif
</div>
