<?php

use Hiyan\ServiceContainerPaymentMock\Services\Checkout;
use Hiyan\ServiceContainerPaymentMock\Providers\PagaFacilPaymentProvider;

$container = require __DIR__ . '/../bootstrap/container.php';

$provider = $container->get(PagaFacilPaymentProvider::class);
$checkout = new Checkout('customer@example.com', 1000);

print_r($checkout->handle($provider));
