<?php

declare(strict_types=1);

namespace Hiyan\ServiceContainerPaymentMock\Services;

use Hiyan\ServiceContainerPaymentMock\Providers\Interfaces\PaymentProviderInterface;

class Checkout {
    public function __construct(protected string $email, protected int $amount) {
    }

    public function handle(PaymentProviderInterface $paymentProvider): array {

        return $paymentProvider->charge($this->email, $this->amount);
    }
}
