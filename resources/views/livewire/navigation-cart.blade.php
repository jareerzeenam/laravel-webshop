<x-nav-link href="{{ route('cart.show') }}" :active="request()->routeIs('cart.show')">
    {{ __('Your Cart ') }} ({{ $this->count }})
</x-nav-link>
