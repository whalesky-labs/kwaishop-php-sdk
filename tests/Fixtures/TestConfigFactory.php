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

namespace KwaiShopSDK\Tests\Fixtures;

use KwaiShopSDK\Core\Profile\Config;

final class TestConfigFactory
{
    public static function make(): Config
    {
        return new Config(
            appKey: self::env('KWAISHOP_TEST_APP_KEY', 'test-app-key'),
            appSecret: self::env('KWAISHOP_TEST_APP_SECRET', 'test-app-secret'),
            signSecret: self::env('KWAISHOP_TEST_SIGN_SECRET', 'test-sign-secret'),
            baseUrl: self::env('KWAISHOP_TEST_BASE_URL', 'https://openapi.kwaixiaodian.com'),
        );
    }

    public static function accessToken(): ?string
    {
        return self::nullableEnv('KWAISHOP_TEST_ACCESS_TOKEN');
    }

    public static function refreshToken(): ?string
    {
        return self::nullableEnv('KWAISHOP_TEST_REFRESH_TOKEN');
    }

    public static function openId(): ?string
    {
        return self::nullableEnv('KWAISHOP_TEST_OPEN_ID');
    }

    public static function redirectUri(): ?string
    {
        return self::nullableEnv('KWAISHOP_TEST_REDIRECT_URI');
    }

    public static function messagePrivateKey(): ?string
    {
        return self::nullableEnv('KWAISHOP_TEST_MESSAGE_PRIVATE_KEY');
    }

    private static function env(string $key, string $default): string
    {
        $value = self::nullableEnv($key);

        return $value ?? $default;
    }

    private static function nullableEnv(string $key): ?string
    {
        $value = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key) ?: null;
        if (!is_string($value)) {
            return null;
        }

        $value = trim($value);

        return $value === '' ? null : $value;
    }
}
