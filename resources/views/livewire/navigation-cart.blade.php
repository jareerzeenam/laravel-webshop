<x-nav-link wire:navigate href="{{ route('cart.index') }}" :active="request()->routeIs('cart.show')">
    {{ __('Your Cart ') }} ({{ $this->count }})
</x-nav-link>
