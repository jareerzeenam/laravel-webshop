# Laravel Web Shop

Welcome to the Laravel Web Shop! This application is designed to provide a seamless shopping experience with advanced features and secure payment integration. Below you'll find a detailed overview of the technologies used, features available, and instructions for setting up and running the application.

## Technologies

- **Laravel 11:** A robust PHP framework for web artisans.
- **Livewire:** A full-stack framework for Laravel that makes building dynamic interfaces simple, without leaving the comfort of Laravel.
- **Tailwind CSS:** A utility-first CSS framework for rapid UI development.
- **Stripe:** A payment processing platform integrated using Laravel Cashier.

## Features

- **Guest Add to Cart:** Visitors can add products to the cart without needing to log in.
- **Cart Persistence:** When a guest user logs in, the items in their cart are retained and merged with their account.
- **Product Variants:** Users can select different product variants (e.g., size, color) and add them to the cart.
- **Stripe Payment Gateway:** Secure payment processing through Stripe, integrated using Laravel Cashier.
- **Abandoned Cart Reminder:** Sends an email reminder to users daily if they have items in their cart but haven't completed the purchase.
- **Auto-Cleanup for Guest Carts:** Guest carts are automatically deleted after being inactive for more than a day.
- **Order Management:** Users can view their order history.
- **Order Confirmation:** Sends an email confirmation after a successful order.
- **Product Search:** Allows users to search for products.
- **Pagination:** Efficiently handles large lists of products by paginating them.

## Screenshots

### Products Page
![Products Page](https://github.com/jareerzeenam/laravel-webshop/blob/main/public/media/readme/store_front.png)

### Product Details Page
![Product Details Page](https://github.com/jareerzeenam/laravel-webshop/blob/main/public/media/readme/product-view.png)

### Cart Page
![Cart Page](https://github.com/jareerzeenam/laravel-webshop/blob/main/public/media/readme/cart.png)

### Stripe Checkout Page
![Stripe Checkout Page](https://github.com/jareerzeenam/laravel-webshop/blob/main/public/media/readme/stripe-checkout.png)

### My Orders Page
![My Orders Page](https://github.com/jareerzeenam/laravel-webshop/blob/main/public/media/readme/orders.png)

### View Order Page
![View Order Page](https://github.com/jareerzeenam/laravel-webshop/blob/main/public/media/readme/view-order.png)

### Abandoned Cart Email
![Abandoned Cart Email](https://github.com/jareerzeenam/laravel-webshop/blob/main/public/media/readme/abandoned-cart.png)

### Order Confirmation Email
![Order Confirmation Email](https://github.com/jareerzeenam/laravel-webshop/blob/main/public/media/readme/order-confirmation.png)

## Setup Instructions

1. **Clone the repository:**
   ```bash
   git clone https://github.com/jareerzeenam/laravel-webshop.git
   cd laravel-web-shop-app
   ```

2. **Install dependencies:**
   ```bash
   composer install
   npm install
   npm run dev
   ```

3. **Environment configuration:**
   Copy the `.env.example` file to `.env` and update the necessary environment variables, especially for database and Stripe API keys.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Run migrations:**
   ```bash
   php artisan migrate
   ```

5. **Run the application:**
   ```bash
   php artisan serve
   ```

6. **Set up email notifications:**
   Ensure that your email settings are correctly configured in the `.env` file to enable email notifications for abandoned carts and order confirmations.

## Stripe Payment Gateway Local Setup

1. **Install Stripe CLI:**
   Download the Stripe CLI from the following link: [Stripe CLI](https://stripe.com/docs/stripe-cli)

2. **Listen to webhook events locally:**
   After installing the Stripe CLI, run the following command to listen to webhook events:
   ```bash
   stripe listen --forward-to YOUR_LOCAL_URL/stripe/webhook --format JSON
   ```

3. **Set up webhook secret:**
   Get the webhook signing secret from the Stripe dashboard and add it to the `.env` file as `STRIPE_WEBHOOK_SECRET`.
   ```bash
   STRIPE_WEBHOOK_SECRET=whsec_...
   ```

## Scheduled Commands

### Abandoned Cart Reminder

This feature sends an email reminder to users daily if they have items in their cart but haven't completed the purchase.

1. **Command:** `app/Console/Commands/AbandonedCart.php`
2. **Schedule:** The command is already scheduled in `routes/console.php` to run daily:
   ```php
   Schedule::command(AbandonedCart::class)->dailyAt('9:00');
   ```

### Remove Inactive Session Cart

This feature deletes guest carts that have been inactive for more than a day.

1. **Command:** `app/Console/Commands/RemoveInactiveSessionCart.php`
2. **Schedule:** The command is already scheduled in `routes/console.php` to run weekly:
   ```php
   Schedule::command(RemoveInactiveSessionCart::class)->weekly();
   ```

## Usage

Once the application is set up, you can start exploring the various features:

- Browse and search for products.
- Select different product variants and add them to the cart.
- Add products to the cart as a guest or logged-in user.
- Proceed to checkout using Stripe.
- Receive email notifications for abandoned carts and order confirmations.
- View your order history from the "My Orders" page.

For any issues or contributions, please create an issue or a pull request on the [GitHub repository](https://github.com/jareerzeenam/laravel-webshop).

Happy Coding!

