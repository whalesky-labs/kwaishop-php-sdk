<?php

declare(strict_types=1);

namespace Kwaishop\PhpSdk\Support;

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
