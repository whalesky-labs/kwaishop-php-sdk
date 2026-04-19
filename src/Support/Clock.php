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

namespace KwaiShopSDK\Support;

final class Clock
{
    /** Get the current Unix timestamp in milliseconds as a string. */
    public static function currentMilliseconds(): string
    {
        return (string) (int) floor(microtime(true) * 1000);
    }
}
