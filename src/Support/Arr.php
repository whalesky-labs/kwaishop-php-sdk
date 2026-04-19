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

final class Arr
{
    /**
     * Return the first existing value for a set of candidate keys.
     *
     * @param array<string, mixed> $values
     * @param list<string> $keys
     */
    public static function first(array $values, array $keys, mixed $default = null): mixed
    {
        foreach ($keys as $key) {
            if (array_key_exists($key, $values)) {
                return $values[$key];
            }
        }

        return $default;
    }

    /**
     * Remove null values from an associative array.
     *
     * @param array<string, mixed> $values
     *
     * @return array<string, mixed>
     */
    public static function withoutNulls(array $values): array
    {
        return array_filter(
            $values,
            static fn (mixed $value): bool => $value !== null
        );
    }
}
