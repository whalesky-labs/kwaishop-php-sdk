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

namespace KwaiShopSDK\Config;

use KwaiShopSDK\Exception\ValidationException;

final class Config
{
    public const SIGN_METHOD_MD5 = 'MD5';
    public const SIGN_METHOD_HMAC_SHA256 = 'HMAC_SHA256';

    /**
     * Create an immutable SDK configuration object.
     *
     * @throws ValidationException
     */
    public function __construct(
        private readonly string $appKey,
        private readonly ?string $appSecret,
        private readonly string $signSecret,
        private readonly ?string $accessToken = null,
        private readonly string $baseUrl = 'https://openapi.kwaixiaodian.com',
        private readonly string $oauthAuthorizeUrl = 'https://open.kwaixiaodian.com/oauth/authorize',
        private readonly string $oauthAccessTokenUrl = 'https://openapi.kwaixiaodian.com/oauth2/access_token',
        private readonly string $oauthRefreshTokenUrl = 'https://openapi.kwaixiaodian.com/oauth2/refresh_token',
        private readonly string $signMethod = self::SIGN_METHOD_HMAC_SHA256,
        private readonly float $connectTimeout = 5.0,
        private readonly float $readTimeout = 10.0,
        private readonly bool $autoDetectRuntime = true,
        private readonly string $userAgent = 'kwaishop-php-sdk/1.0.0-dev',
    ) {
        $this->assertNonEmpty($this->appKey, 'appKey');
        $this->assertNonEmpty($this->signSecret, 'signSecret');

        if ($this->appSecret !== null && trim($this->appSecret) === '') {
            throw new ValidationException('appSecret cannot be blank when provided.');
        }

        if ($this->accessToken !== null && trim($this->accessToken) === '') {
            throw new ValidationException('accessToken cannot be blank when provided.');
        }

        if (!in_array($this->signMethod, [self::SIGN_METHOD_MD5, self::SIGN_METHOD_HMAC_SHA256], true)) {
            throw new ValidationException(sprintf('Unsupported signMethod "%s".', $this->signMethod));
        }

        if ($this->connectTimeout <= 0) {
            throw new ValidationException('connectTimeout must be greater than 0.');
        }

        if ($this->readTimeout <= 0) {
            throw new ValidationException('readTimeout must be greater than 0.');
        }

    }

    /**
     * Build a config instance from an associative array.
     *
     * @param array<string, mixed> $config
     */
    public static function fromArray(array $config): self
    {
        return new self(
            appKey: (string) ($config['appKey'] ?? ''),
            appSecret: isset($config['appSecret']) ? (string) $config['appSecret'] : null,
            signSecret: (string) ($config['signSecret'] ?? ''),
            accessToken: isset($config['accessToken']) ? (string) $config['accessToken'] : null,
            baseUrl: (string) ($config['baseUrl'] ?? 'https://openapi.kwaixiaodian.com'),
            oauthAuthorizeUrl: (string) ($config['oauthAuthorizeUrl'] ?? 'https://open.kwaixiaodian.com/oauth/authorize'),
            oauthAccessTokenUrl: (string) ($config['oauthAccessTokenUrl'] ?? 'https://openapi.kwaixiaodian.com/oauth2/access_token'),
            oauthRefreshTokenUrl: (string) ($config['oauthRefreshTokenUrl'] ?? 'https://openapi.kwaixiaodian.com/oauth2/refresh_token'),
            signMethod: (string) ($config['signMethod'] ?? self::SIGN_METHOD_HMAC_SHA256),
            connectTimeout: (float) ($config['connectTimeout'] ?? 5.0),
            readTimeout: (float) ($config['readTimeout'] ?? 10.0),
            autoDetectRuntime: (bool) ($config['autoDetectRuntime'] ?? true),
            userAgent: (string) ($config['userAgent'] ?? 'kwaishop-php-sdk/1.0.0-dev'),
        );
    }

    /** Get the application key. */
    public function appKey(): string
    {
        return $this->appKey;
    }

    /** Get the optional application secret. */
    public function appSecret(): ?string
    {
        return $this->appSecret;
    }

    /**
     * Get the application secret or fail when OAuth is not configured.
     *
     * @throws ValidationException
     */
    public function requiredAppSecret(): string
    {
        if ($this->appSecret === null) {
            throw new ValidationException('appSecret is required for OAuth operations.');
        }

        return $this->appSecret;
    }

    /** Get the signing secret. */
    public function signSecret(): string
    {
        return $this->signSecret;
    }

    /** Get the default access token. */
    public function accessToken(): ?string
    {
        return $this->accessToken;
    }

    /** Get the normalized gateway base URL. */
    public function baseUrl(): string
    {
        return rtrim($this->baseUrl, '/');
    }

    /** Get the OAuth authorization endpoint. */
    public function oauthAuthorizeUrl(): string
    {
        return $this->oauthAuthorizeUrl;
    }

    /** Get the OAuth access-token endpoint. */
    public function oauthAccessTokenUrl(): string
    {
        return $this->oauthAccessTokenUrl;
    }

    /** Get the OAuth refresh-token endpoint. */
    public function oauthRefreshTokenUrl(): string
    {
        return $this->oauthRefreshTokenUrl;
    }

    /** Get the configured signature algorithm name. */
    public function signMethod(): string
    {
        return $this->signMethod;
    }

    /** Get the connection timeout in seconds. */
    public function connectTimeout(): float
    {
        return $this->connectTimeout;
    }

    /** Get the read timeout in seconds. */
    public function readTimeout(): float
    {
        return $this->readTimeout;
    }

    /** Get the SDK user-agent string. */
    public function userAgent(): string
    {
        return $this->userAgent;
    }

    /** Determine whether runtime auto-detection is enabled. */
    public function autoDetectRuntime(): bool
    {
        return $this->autoDetectRuntime;
    }

    /**
     * Validate that a required string value is not blank.
     *
     * @throws ValidationException
     */
    private function assertNonEmpty(string $value, string $field): void
    {
        if (trim($value) === '') {
            throw new ValidationException(sprintf('%s cannot be blank.', $field));
        }
    }
}
