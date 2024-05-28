<div>
    <x-panel class="mt-12 max-w-full mx-auto" title="My Orders">
        <table class="w-full table-auto ">
            <thead>
            <tr>
                <th class="text-left">Order</th>
                <th class="text-left">Ordered At</th>
                <th class="text-right">Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($this->orders as $order)
                <tr class="hover:bg-black hover:text-white hover:animate-pulse">
                    <td>
                        <a wire:navigate href="{{ route('order.show', $order->id) }}" class="underline font-medium">#{{ $order->id }}</a>
                    </td>
                    <td>
                        <a wire:navigate href="{{ route('order.show', $order->id) }}">
                            {{ $order->created_at->diffForHumans() }}
                        </a>
                    </td>
                    <td class="text-right">
                        <a wire:navigate href="{{ route('order.show', $order->id) }}">
                            {{ $order->amount_total }}
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </x-panel>
    <x-button-link link="{{ route('home') }}">
        Back to Store
    </x-button-link>
</div>

