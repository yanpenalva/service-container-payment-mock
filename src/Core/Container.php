<?php

declare(strict_types=1);

namespace Hiyan\ServiceContainerPaymentMock\Core;

use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use LogicException;

class Container implements ContainerInterface {
    protected array $bindings = [];
    protected array $instances = [];

    public function bind(string $id, callable $concrete): void {
        $this->bindings[$id] = $concrete;
    }

    public function singleton(string $id, callable $concrete): void {
        $this->bindings[$id] = function () use ($id, $concrete) {
            return $this->instances[$id] ??= $concrete($this);
        };
    }

    public function get(string $id): mixed {
        if ($this->hasInstance($id)) {
            return $this->instances[$id];
        }

        if (! $this->has($id)) {
            throw new class("Service '{$id}' not found.") extends LogicException implements NotFoundExceptionInterface {
            };
        }

        $object = $this->bindings[$id]($this);
        return $this->instances[$id] ??= $object;
    }

    public function has(string $id): bool {
        return isset($this->bindings[$id]);
    }

    protected function hasInstance(string $id): bool {
        return isset($this->instances[$id]);
    }
}
