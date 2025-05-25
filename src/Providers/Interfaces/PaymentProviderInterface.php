<?php

namespace Hiyan\ServiceContainerPaymentMock\Providers\Interfaces;

use Hiyan\ServiceContainerPaymentMock\Utils\Http;


interface PaymentProviderInterface {
    public function __construct(Http $clientHttp);

    public function charge(string $email, int $amount): array;
}
