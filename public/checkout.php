<?php

require '../vendor/autoload.php';

use Stripe\StripeClient;

session_start();

$private_key = 'sk_test_51N5Jd5H9VO3CuGNZYxetLjHIfQemLUuYYvJ2WnYJQV35pX3jevsdQktATzfgWk2fCW04aVLUP7MhKVreKg4FjIKq00P1OdEEcy'


$stripe = new StripeClient('$private_key');

$checkout_session = $stripe->checkout->sessions->create([
  'line_items' => [[
    'price_data' => [
      'currency' => 'brl',
      'product_data' => [
        'name' => 'camiseta',
      ],
      'unit_amount' => 20000,
    ],
    'quantity' => 4,
  ]],
  'mode' => 'payment',
  'success_url' => 'http://localhost:4242/success',
  'cancel_url' => 'http://localhost:4242/cancel',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
?>