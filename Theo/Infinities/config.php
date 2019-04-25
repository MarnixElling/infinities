<?php

require_once 'vendor/autoload.php';

$stripe = [
  'secret_key' => 'sk_test_LUOog28DWT6Ybq2r1ZgFf3tL',
  'publishable_key' => 'pk_test_7Tn8xI6hDjUZochxfx00bnep',
];

\Stripe\Stripe::setApiKey($stripe['secret_key']);
