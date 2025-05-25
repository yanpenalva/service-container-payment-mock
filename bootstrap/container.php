<?php

declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

use Hiyan\ServiceContainerPaymentMock\Core\Container;
use Hiyan\ServiceContainerPaymentMock\Providers\AppServiceProvider;

$serviceContainer = new Container();
AppServiceProvider::register($serviceContainer);

return $serviceContainer;
