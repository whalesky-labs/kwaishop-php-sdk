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

namespace KwaiShopSDK\Tests\Unit;

use PHPUnit\Framework\TestCase;
use KwaiShopSDK\Core\Runtime\RuntimeProfile;

final class RuntimeProfileTest extends TestCase
{
    public function testRuntimeProfileExposesSwooleCoroutineState(): void
    {
        $profile = new RuntimeProfile('swoole-coroutine', true, false);

        self::assertSame('swoole-coroutine', $profile->name());
        self::assertTrue($profile->isSwooleCoroutine());
        self::assertFalse($profile->swooleHooksEnabled());
        self::assertTrue($profile->shouldEnableSwooleHooks());
    }

    public function testRuntimeProfileRecognizesEnabledHooks(): void
    {
        $profile = new RuntimeProfile('swoole-coroutine', true, true);

        self::assertFalse($profile->shouldEnableSwooleHooks());
    }

    public function testRuntimeProfileDisablesConnectionReuseInSwoole(): void
    {
        $profile = new RuntimeProfile('swoole', false, false);

        self::assertTrue($profile->isSwoole());
        self::assertFalse($profile->shouldReuseConnections());
    }

    public function testRuntimeProfileKeepsConnectionReuseInFpm(): void
    {
        $profile = new RuntimeProfile('fpm', false, false);

        self::assertTrue($profile->shouldReuseConnections());
    }
}
