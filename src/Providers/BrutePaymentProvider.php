<?php

declare(strict_types=1);

namespace Hiyan\ServiceContainerPaymentMock\Providers;

use Hiyan\ServiceContainerPaymentMock\Providers\Abstracts\AbstractPaymentProvider;

class BrutePaymentProvider extends AbstractPaymentProvider {
    protected function currency(): string {
        return 'USD';
    }
}
