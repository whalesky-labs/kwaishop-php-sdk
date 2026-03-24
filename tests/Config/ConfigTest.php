<?php

declare(strict_types=1);

namespace Kwaishop\PhpSdk\Tests\Config;

use Kwaishop\PhpSdk\Config\Config;
use Kwaishop\PhpSdk\Exception\ValidationException;
use Kwaishop\PhpSdk\Tests\TestCase;

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
