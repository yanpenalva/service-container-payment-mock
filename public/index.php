<?php

use Hiyan\ServiceContainerPaymentMock\Services\Checkout;
use Hiyan\ServiceContainerPaymentMock\Utils\Http;
use Hiyan\ServiceContainerPaymentMock\Providers\PagaFacilPaymentProvider;

require __DIR__ . '/../vendor/autoload.php';

$service = new Checkout('customer@example.com', 1000);

print_r(
    $service->handle(
        new PagaFacilPaymentProvider(
            new Http()
        )
    )
);
