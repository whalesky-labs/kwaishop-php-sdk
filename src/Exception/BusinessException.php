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

namespace KwaiShopSDK\Exception;

class BusinessException extends KwaiShopException
{
    /**
     * Create a business-level gateway exception.
     *
     * @param array<string, mixed> $payload
     */
    public function __construct(
        string $message,
        private readonly ?int $primaryCode = null,
        private readonly ?int $secondaryCode = null,
        private readonly array $payload = [],
        ?string $rawResponseBody = null,
    ) {
        parent::__construct($message, $primaryCode ?? 0, rawResponseBody: $rawResponseBody);
    }

    /** Get the primary platform status code. */
    public function primaryCode(): ?int
    {
        return $this->primaryCode;
    }

    /** Get the secondary platform status code. */
    public function secondaryCode(): ?int
    {
        return $this->secondaryCode;
    }

    /**
     * Get the decoded response payload that produced the exception.
     *
     * @return array<string, mixed>
     */
    public function payload(): array
    {
        return $this->payload;
    }
}
