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
use KwaiShopSDK\Core\Profile\Config;
use KwaiShopSDK\Exception\ValidationException;

final class ConfigTest extends TestCase
{
    public function testConfigUsesOfficialDefaults(): void
    {
        $config = new Config(
            appKey: 'ks123',
            appSecret: 'secret',
            signSecret: 'sign-secret'
        );

        self::assertSame('https://openapi.kwaixiaodian.com', $config->baseUrl());
        self::assertSame('https://open.kwaixiaodian.com/oauth/authorize', $config->oauthAuthorizeUrl());
        self::assertSame(Config::SIGN_METHOD_HMAC_SHA256, $config->signMethod());
        self::assertTrue($config->autoDetectRuntime());
    }

    public function testRequiredAppSecretThrowsWhenMissing(): void
    {
        $config = new Config(
            appKey: 'ks123',
            appSecret: null,
            signSecret: 'sign-secret'
        );

        $this->expectException(ValidationException::class);
        $config->requiredAppSecret();
    }
}
