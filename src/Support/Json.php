<?php

declare(strict_types=1);

namespace Kwaishop\PhpSdk\Support;

use JsonException;
use Kwaishop\PhpSdk\Exception\ValidationException;

final class Json
{
    /**
     * @param array<string, mixed> $value
     */
    public static function encode(array $value): string
    {
        try {
            return json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            throw new ValidationException('Failed to encode request params as JSON.', previous: $exception);
        }
    }

    /**
     * @return array<string, mixed>
     */
    public static function decode(string $value): array
    {
        try {
            /** @var array<string, mixed> $decoded */
            $decoded = json_decode($value, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            throw new ValidationException('Failed to decode JSON response.', previous: $exception);
        }

        return $decoded;
    }
}
