<?php

namespace App\Listeners;

use App\Actions\WebShop\HandleCheckoutSessionCompleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{
    /**
     * Handle the event.
     */
    public function handle(WebhookReceived $event): void
    {
        if ($event->payload['type'] === 'checkout.session.completed') {
//            Log::info('Checkout session completed');
            // Handle the checkout.session.completed event
            (new HandleCheckoutSessionCompleted)->handle($event->payload['data']['object']['id']);
        }
    }
}
