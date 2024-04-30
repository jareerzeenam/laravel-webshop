<x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
    {{ __('Your Cart ') }} ({{ $this->count }})
</x-nav-link>
