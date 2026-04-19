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

namespace KwaiShopSDK\Auth;

final class TokenResponse
{
    /**
     * Create a normalized OAuth token response value object.
     *
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

    /** Get the issued access token. */
    public function accessToken(): string
    {
        return $this->accessToken;
    }

    /** Get the refresh token when the platform returns one. */
    public function refreshToken(): ?string
    {
        return $this->refreshToken;
    }

    /** Get the platform open ID associated with the token response. */
    public function openId(): ?string
    {
        return $this->openId;
    }

    /** Get the access-token lifetime in seconds. */
    public function expiresIn(): ?int
    {
        return $this->expiresIn;
    }

    /**
     * Get the granted scope list.
     *
     * @return list<string>
     */
    public function scopes(): array
    {
        return $this->scopes;
    }

    /**
     * Get the raw decoded response payload.
     *
     * @return array<string, mixed>
     */
    public function raw(): array
    {
        return $this->raw;
    }
}
