## Stripe Payment Gateway Integration

Install Laravel Stripe package using the following command:

```bash
composer require laravel/cashier
```

Install Stripe CLI in your local machine to test the webhook locally. You can download the Stripe CLI from the following link: https://stripe.com/docs/stripe-cli

After installing the Stripe CLI, you can run the following command to listen to the webhook events:

```bash
stripe listen --forward-to  https://laravel-webshop.test/stripe/webhook --format JSON
```
Now you can get the webhook signing secret from the Stripe dashboard and add it to the .env file as STRIPE_WEBHOOK_SECRET.

```bash 
STRIPE_WEBHOOK_SECRET=whsec_...
```
