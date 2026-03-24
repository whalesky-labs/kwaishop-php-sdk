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

namespace KwaiShopSDK\Support;

final class Arr
{
    /**
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
