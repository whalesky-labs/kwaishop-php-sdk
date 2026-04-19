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

use JsonException;
use KwaiShopSDK\Exception\ValidationException;

final class Json
{
    /**
     * Encode an array into a JSON string for gateway transport.
     *
     * @param array<string, mixed> $value
     *
     * @throws ValidationException
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
     * Decode a JSON response body into an associative array.
     *
     * @throws ValidationException
     *
     * @return array<string, mixed>
     */
    public static function decode(string $value): array
    {
        try {
            /** @var array<string, mixed> $decoded */
            $decoded = json_decode($value, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            $snippet = trim(substr($value, 0, 200));
            $message = 'Failed to decode JSON response.';

            if ($snippet !== '') {
                $message .= ' Response snippet: ' . $snippet;
            }

            throw new ValidationException($message, previous: $exception, rawResponseBody: $value);
        }

        return $decoded;
    }
}
