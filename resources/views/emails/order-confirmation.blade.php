@component('mail::message')
<h1>Order Confirmation</h1>

Hi {{ $order->user->name }},

Thank you for your order. We have received your order and we are currently processing it.

Your order number is <b>(#{{ $order->id }})</b>.

<table style="width: 100%;">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Tax</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->items as $item)
            <tr>
                <td>{{ $item->name }} <br> {{$item->description}}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->amount_tax }}</td>
                <td>{{ $item->amount_total }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
    @if($order->amount_shipping->isPositive())
        <tr>
            <td colspan="4" style="text-align: right;">
                Shipping Fee
            </td>
            <td>
                {{ $order->amount_shipping }}
            </td>
        </tr>
    @endif
    @if($order->amount_discount->isPositive())
        <tr>
            <td colspan="4" style="text-align: right;">
                Discount
            </td>
            <td>
                {{ $order->amount_discount }}
            </td>
        </tr>
    @endif
    @if($order->amount_tax->isPositive())
        <tr>
            <td colspan="4" style="text-align: right;">
                Tax
            </td>
            <td>
                {{ $order->amount_tax }}
            </td>
        </tr>
    @endif
    @if($order->amount_subtotal->isPositive())
        <tr>
            <td colspan="4" style="text-align: right;">
                Subtotal
            </td>
            <td>
                {{ $order->amount_subtotal }}
            </td>
        </tr>
    @endif
    @if($order->amount_total->isPositive())
        <tr>
            <td colspan="4" style="text-align: right;">
                Total
            </td>
            <td style="text-align: right;">
                {{ $order->amount_total }}
            </td>
        </tr>
    @endif
    </tfoot>
</table>
@endcomponent
