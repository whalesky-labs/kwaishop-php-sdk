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

namespace KwaiShopSDK\Core\Auth;

final class TokenResponse
{
    /**
     * @param list<string> $scopes
     * @param array<string, mixed> $raw
     */
    public function __construct(
        private readonly string $accessToken,
        private readonly ?string $refreshToken,
        private readonly ?string $openId,
        private readonly ?int $expiresIn,
        private readonly array $scopes,
        private readonly array $raw,
    ) {
    }

    public function accessToken(): string
    {
        return $this->accessToken;
    }

    public function refreshToken(): ?string
    {
        return $this->refreshToken;
    }

    public function openId(): ?string
    {
        return $this->openId;
    }

    public function expiresIn(): ?int
    {
        return $this->expiresIn;
    }

    /**
     * @return list<string>
     */
    public function scopes(): array
    {
        return $this->scopes;
    }

    /**
     * @return array<string, mixed>
     */
    public function raw(): array
    {
        return $this->raw;
    }
}
