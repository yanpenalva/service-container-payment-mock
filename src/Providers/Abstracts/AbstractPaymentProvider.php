<?php

declare(strict_types=1);

namespace Hiyan\ServiceContainerPaymentMock\Providers\Abstracts;

use Hiyan\ServiceContainerPaymentMock\Providers\Interfaces\PaymentProviderInterface;
use Hiyan\ServiceContainerPaymentMock\Utils\Http;

abstract class AbstractPaymentProvider implements PaymentProviderInterface {
    public function __construct(protected Http $clientHttp) {
    }

    abstract protected function currency(): string;

    public function charge(string $email, int $amount): array {
        return [
            'status' => 'success',
            'message' => 'Payment processed successfully',
            'email' => $email,
            'amount' => $amount,
            'transaction_id' => uniqid('txn_'),
            'currency' => $this->currency(),
            'timestamp' => time(),
            'payment_method' => 'credit_card',
            'payment_status' => 'completed',
        ];
    }
}
