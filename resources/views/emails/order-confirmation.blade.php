@component('mail::message')
<h1>Order Confirmation</h1>

Hi {{ $order->user->name }},

Thank you for your order. We have received your order and we are currently processing it.

Your order number is **(#{{ $order->id }})**.

@component('mail::table')
    | Item          | Price         | Quantity  | Tax       |  Total     |
    | ------------- |:-------------:| ---------:| --------: | ----------:|
    @foreach($order->items as $item)
    | **{{ $item->name }}** <br> {{ $item->description }} | {{ $item->price }} | {{ $item->quantity }} | {{ $item->amount_tax }} | {{ $order->amount_total }}|
    @endforeach
    @if(!$order->amount_shipping->isPositive())
    ||||**Shipping**|{{ $order->amount_shipping }}|
    @endif
    @if($order->amount_discount->isPositive())
    | | | | **Discount** | {{ $order->amount_discount }} |
    @endif
    @if($order->amount_tax->isPositive())
    | | | | **Tax** | {{ $order->amount_tax }} |
    @endif
    | | | | **Subtotal** | {{ $order->amount_subtotal }} |
    | | | | **Total** | **{{ $order->amount_total }}** |
@endcomponent

@component('mail::button',['url' => route('order.show',$order->id), 'color' => 'success'])
    View Order
@endcomponent

@endcomponent
