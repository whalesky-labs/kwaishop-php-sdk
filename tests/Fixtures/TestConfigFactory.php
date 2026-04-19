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

namespace KwaiShopSDK\Tests\Fixtures;

final class TestConfigFactory
{
    /** Determine whether integration-test credentials are available. */
    public static function hasIntegrationCredentials(): bool
    {
        return self::nullableEnv('KWAISHOP_TEST_APP_KEY') !== null
            && self::nullableEnv('KWAISHOP_TEST_APP_SECRET') !== null
            && self::nullableEnv('KWAISHOP_TEST_SIGN_SECRET') !== null
            && self::nullableEnv('KWAISHOP_TEST_ACCESS_TOKEN') !== null;
    }

    /** Get the test app key using environment variables with local defaults. */
    public static function appKey(): string
    {
        return self::env('KWAISHOP_TEST_APP_KEY', 'test-app-key');
    }

    /** Get the test app secret using environment variables with local defaults. */
    public static function appSecret(): string
    {
        return self::env('KWAISHOP_TEST_APP_SECRET', 'test-app-secret');
    }

    /** Get the test signing secret using environment variables with local defaults. */
    public static function signSecret(): string
    {
        return self::env('KWAISHOP_TEST_SIGN_SECRET', 'test-sign-secret');
    }

    /**
     * Build constructor options for test clients.
     *
     * @return array<string, string>
     */
    public static function clientOptions(?string $accessToken = null): array
    {
        $options = [
            'baseUrl' => self::env('KWAISHOP_TEST_BASE_URL', 'https://openapi.kwaixiaodian.com'),
        ];

        if ($accessToken !== null) {
            $options['accessToken'] = $accessToken;
        }

        return $options;
    }

    /** Get the test access token from the environment. */
    public static function accessToken(): ?string
    {
        return self::nullableEnv('KWAISHOP_TEST_ACCESS_TOKEN');
    }

    /** Get the test refresh token from the environment. */
    public static function refreshToken(): ?string
    {
        return self::nullableEnv('KWAISHOP_TEST_REFRESH_TOKEN');
    }

    /** Get the test open ID from the environment. */
    public static function openId(): ?string
    {
        return self::nullableEnv('KWAISHOP_TEST_OPEN_ID');
    }

    /** Get the configured OAuth redirect URI for integration tests. */
    public static function redirectUri(): ?string
    {
        return self::nullableEnv('KWAISHOP_TEST_REDIRECT_URI');
    }

    /** Get the configured test message private key. */
    public static function messagePrivateKey(): ?string
    {
        return self::nullableEnv('KWAISHOP_TEST_MESSAGE_PRIVATE_KEY');
    }

    /** Resolve the artifact directory used by integration tests. */
    public static function testArtifactsDir(): ?string
    {
        return self::nullableEnv('KWAISHOP_TEST_ARTIFACTS_DIR')
            ?? dirname(__DIR__, 2) . '/.test-artifacts';
    }

    /**
     * Write a JSON artifact file for debugging integration runs.
     *
     * @param array<string, mixed> $payload
     */
    public static function writeJsonArtifact(string $name, array $payload): void
    {
        $directory = self::testArtifactsDir();
        if ($directory === null) {
            return;
        }

        if (!is_dir($directory) && !mkdir($directory, 0777, true) && !is_dir($directory)) {
            return;
        }

        $path = rtrim($directory, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $name . '.json';
        file_put_contents(
            $path,
            json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR)
        );
    }

    /** Read a required-ish environment value with a fallback default. */
    private static function env(string $key, string $default): string
    {
        $value = self::nullableEnv($key);

        return $value ?? $default;
    }

    /** Read and trim an environment value, returning null when it is blank. */
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
