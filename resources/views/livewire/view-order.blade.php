<div>
    <div class="grid grid-cols-2 gap-4">
        <x-panel class="mt-12 col-span-2" title="Your order #{{ $this->order->id }}">
            <table class="w-full">
                <thead>
                <tr>
                    <th class="text-left">Product</th>
                    <th class="text-left">Quantity</th>
                    <th class="text-right">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($this->order->items as $item)
                    <tr>
                        <td>
                            {{ $item->name }}
                            <br>
                            {{ $item->description }}
                        </td>
                        <td>
                            {{ $item->quantity }}
                        </td>
                        <td class="text-right">
                            {{ $item->amount_total }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                @if($this->order->amount_shipping->isPositive())
                    <tr>
                        <td colspan="2" class="font-medium text-right">Shipping</td>
                        <td class="font-medium text-right">{{ $this->order->amount_shipping }}</td>
                    </tr>
                @endif
                @if($this->order->amount_discount->isPositive())
                    <tr>
                        <td colspan="2" class="font-medium text-right">Discount</td>
                        <td class="font-medium text-right">{{ $this->order->amount_discount }}</td>
                    </tr>
                @endif
                <tr>
                    <td colspan="2" class="font-medium text-right">Tax</td>
                    <td class="font-medium text-right">{{ $this->order->amount_tax }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="font-medium text-right">Subtotal</td>
                    <td class="font-medium text-right">{{ $this->order->amount_subtotal }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="font-medium text-right">Total</td>
                    <td class="font-medium text-right">{{ $this->order->amount_total }}</td>
                </tr>
                </tfoot>
            </table>
        </x-panel>

        <x-panel class="col-span-1" title="Billing Information">
            @foreach($this->order->billing_address->filter() as $value)
                {{ $value }} <br>
            @endforeach
        </x-panel>

        <x-panel class="col-span-1" title="Shipping Information">
            @foreach($this->order->shipping_address->filter() as $value)
                {{ $value }} <br>
            @endforeach
        </x-panel>

    </div>
    <x-button-link link="{{ route('order.index') }}">
        Back
    </x-button-link>
</div>
