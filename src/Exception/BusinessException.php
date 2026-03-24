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

namespace KwaiShopSDK\Exception;

class BusinessException extends KwaiShopException
{
    /**
     * @param array<string, mixed> $payload
     */
    public function __construct(
        string $message,
        private readonly ?int $primaryCode = null,
        private readonly ?int $secondaryCode = null,
        private readonly array $payload = [],
    ) {
        parent::__construct($message, $primaryCode ?? 0);
    }

    public function primaryCode(): ?int
    {
        return $this->primaryCode;
    }

    public function secondaryCode(): ?int
    {
        return $this->secondaryCode;
    }

    /**
     * @return array<string, mixed>
     */
    public function payload(): array
    {
        return $this->payload;
    }
}
