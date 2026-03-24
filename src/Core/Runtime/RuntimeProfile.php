<?php

declare(strict_types=1);

/**
 * This file is part of KwaiShopSDK.
 *
 * @link     https://github.com/westng/kwaishop-php-sdk
 * @document https://github.com/westng/kwaishop-php-sdk
 * @contact  westng
 * @license  https://github.com/westng/kwaishop-php-sdk/blob/main/LICENSE
 */

namespace KwaiShopSDK\Core\Runtime;

final class RuntimeProfile
{
    public function __construct(
        private readonly string $name,
        private readonly bool $swooleCoroutine = false,
        private readonly bool $swooleHooksEnabled = false,
    ) {
    }

    public static function detect(): self
    {
        $runtimeClass = self::runtimeClassName();
        $coroutineClass = self::coroutineClassName();

        $swooleHooksEnabled = false;
        if ($runtimeClass !== null && method_exists($runtimeClass, 'getHookFlags')) {
            $swooleHooksEnabled = (int) $runtimeClass::getHookFlags() > 0;
        }

        $swooleCoroutine = false;
        if ($coroutineClass !== null && method_exists($coroutineClass, 'getCid')) {
            $swooleCoroutine = (int) $coroutineClass::getCid() >= 0;
        }

        if ($swooleCoroutine) {
            return new self('swoole-coroutine', true, $swooleHooksEnabled);
        }

        if ($runtimeClass !== null || $coroutineClass !== null) {
            return new self('swoole', false, $swooleHooksEnabled);
        }

        if (str_contains(PHP_SAPI, 'fpm')) {
            return new self('fpm');
        }

        if (str_contains(PHP_SAPI, 'cli')) {
            return new self('cli');
        }

        return new self(PHP_SAPI === '' ? 'unknown' : PHP_SAPI);
    }

    public static function enableSwooleHooks(): bool
    {
        $runtimeClass = self::runtimeClassName();
        if ($runtimeClass === null || !method_exists($runtimeClass, 'enableCoroutine')) {
            return false;
        }

        $runtimeClass::enableCoroutine(true);

        return true;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function isSwooleCoroutine(): bool
    {
        return $this->swooleCoroutine;
    }

    public function isSwoole(): bool
    {
        return str_starts_with($this->name, 'swoole');
    }

    public function swooleHooksEnabled(): bool
    {
        return $this->swooleHooksEnabled;
    }

    public function shouldEnableSwooleHooks(): bool
    {
        return $this->swooleCoroutine && !$this->swooleHooksEnabled;
    }

    public function shouldReuseConnections(): bool
    {
        return !$this->isSwoole();
    }

    private static function runtimeClassName(): ?string
    {
        return match (true) {
            class_exists(\Swoole\Runtime::class) => \Swoole\Runtime::class,
            class_exists(\OpenSwoole\Runtime::class) => \OpenSwoole\Runtime::class,
            default => null,
        };
    }

    private static function coroutineClassName(): ?string
    {
        return match (true) {
            class_exists(\Swoole\Coroutine::class) => \Swoole\Coroutine::class,
            class_exists(\OpenSwoole\Coroutine::class) => \OpenSwoole\Coroutine::class,
            default => null,
        };
    }
}
