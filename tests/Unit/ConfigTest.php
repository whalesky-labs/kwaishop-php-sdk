<?php

declare(strict_types=1);

/**
 * This file is part of KwaiShopSDK.
 *
 * @link     https://github.com/whalesky-labs/kwaishop-php-sdk
 * @document https://github.com/whalesky-labs/kwaishop-php-sdk
 * @contact  westng
 * @license  https://github.com/whalesky-labs/kwaishop-php-sdk/blob/main/LICENSE
 */

namespace KwaiShopSDK\Tests\Unit;

use KwaiShopSDK\Config\Config;
use KwaiShopSDK\Exception\ValidationException;
use PHPUnit\Framework\TestCase;

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

    public function testConfigAcceptsDefaultAccessToken(): void
    {
        $config = new Config(
            appKey: 'ks123',
            appSecret: 'secret',
            signSecret: 'sign-secret',
            accessToken: 'token-123'
        );

        self::assertSame('token-123', $config->accessToken());
    }
}
