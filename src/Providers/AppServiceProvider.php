<?php

declare(strict_types=1);

namespace Hiyan\ServiceContainerPaymentMock\Providers;

use Hiyan\ServiceContainerPaymentMock\Core\Container;
use Hiyan\ServiceContainerPaymentMock\Providers\PagaFacilPaymentProvider;
use Hiyan\ServiceContainerPaymentMock\Providers\BrutePaymentProvider;
use Hiyan\ServiceContainerPaymentMock\Providers\PromptPaymentProvider;
use Hiyan\ServiceContainerPaymentMock\Utils\Http;

class AppServiceProvider {
    public static function register(Container $container): void {
        $container->bind(
            Http::class,
            fn() => new Http()
        );

        $container->bind(
            PagaFacilPaymentProvider::class,
            fn(Container $serviceContainer) =>
            new PagaFacilPaymentProvider(
                $serviceContainer->get(Http::class)
            )
        );

        $container->bind(
            BrutePaymentProvider::class,
            fn(Container $serviceContainer) =>
            new BrutePaymentProvider(
                $serviceContainer->get(Http::class)
            )
        );

        $container->bind(
            PromptPaymentProvider::class,
            fn(Container $serviceContainer) =>
            new PromptPaymentProvider(
                $serviceContainer->get(Http::class)
            )
        );
    }
}
