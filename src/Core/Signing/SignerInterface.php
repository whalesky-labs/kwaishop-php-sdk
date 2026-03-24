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

namespace KwaiShopSDK\Core\Signing;

interface SignerInterface
{
    /**
     * @param array<string, scalar|null> $parameters
     */
    public function sign(array $parameters, string $signSecret): string;

    public function name(): string;
}
