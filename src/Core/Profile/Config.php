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

namespace KwaiShopSDK\Core\Profile;

use KwaiShopSDK\Exception\ValidationException;

final class Config
{
    public const SIGN_METHOD_MD5 = 'MD5';
    public const SIGN_METHOD_HMAC_SHA256 = 'HMAC_SHA256';

    public function __construct(
        private readonly string $appKey,
        private readonly ?string $appSecret,
        private readonly string $signSecret,
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
     * @param array<string, mixed> $config
     */
    public static function fromArray(array $config): self
    {
        return new self(
            appKey: (string) ($config['appKey'] ?? ''),
            appSecret: isset($config['appSecret']) ? (string) $config['appSecret'] : null,
            signSecret: (string) ($config['signSecret'] ?? ''),
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

    public function appKey(): string
    {
        return $this->appKey;
    }

    public function appSecret(): ?string
    {
        return $this->appSecret;
    }

    public function requiredAppSecret(): string
    {
        if ($this->appSecret === null) {
            throw new ValidationException('appSecret is required for OAuth operations.');
        }

        return $this->appSecret;
    }

    public function signSecret(): string
    {
        return $this->signSecret;
    }

    public function baseUrl(): string
    {
        return rtrim($this->baseUrl, '/');
    }

    public function oauthAuthorizeUrl(): string
    {
        return $this->oauthAuthorizeUrl;
    }

    public function oauthAccessTokenUrl(): string
    {
        return $this->oauthAccessTokenUrl;
    }

    public function oauthRefreshTokenUrl(): string
    {
        return $this->oauthRefreshTokenUrl;
    }

    public function signMethod(): string
    {
        return $this->signMethod;
    }

    public function connectTimeout(): float
    {
        return $this->connectTimeout;
    }

    public function readTimeout(): float
    {
        return $this->readTimeout;
    }

    public function userAgent(): string
    {
        return $this->userAgent;
    }

    public function autoDetectRuntime(): bool
    {
        return $this->autoDetectRuntime;
    }

    private function assertNonEmpty(string $value, string $field): void
    {
        if (trim($value) === '') {
            throw new ValidationException(sprintf('%s cannot be blank.', $field));
        }
    }
}
