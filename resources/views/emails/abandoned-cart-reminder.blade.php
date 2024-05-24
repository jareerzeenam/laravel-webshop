@component('mail::message')

    Hey {{ $cart->user->name }},

    You still have items in your cart. Click the button below to continue your checkout.

@component('mail::button', ['url' => route('cart.index'), 'color' => 'success'])
    View Order
@endcomponent
@endcomponent
