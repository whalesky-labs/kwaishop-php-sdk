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

namespace KwaiShopSDK\Core\Pipeline;

use KwaiShopSDK\Exception\AuthenticationException;
use KwaiShopSDK\Exception\AuthorizationException;
use KwaiShopSDK\Exception\BusinessException;
use KwaiShopSDK\Exception\RateLimitException;
use KwaiShopSDK\Exception\SignatureException;
use KwaiShopSDK\Exception\TransportException;
use KwaiShopSDK\Exception\ValidationException;
use KwaiShopSDK\Support\Arr;
use KwaiShopSDK\Support\Json;

final class ResponseParser
{
    /**
     * @return array<string, mixed>
     */
    public function parse(int $httpStatus, string $body): array
    {
        if ($httpStatus < 200 || $httpStatus >= 300) {
            throw new TransportException(sprintf('Unexpected HTTP status %d.', $httpStatus));
        }

        $payload = Json::decode($body);
        $primaryCode = $this->primaryCode($payload);
        $secondaryCode = $this->secondaryCode($payload);

        if ($primaryCode === null) {
            throw new ValidationException('Missing response status field in gateway response.');
        }

        if ($this->isSuccess($primaryCode)) {
            return $payload;
        }

        $message = (string) Arr::first($payload, ['error_msg', 'msg', 'message', 'error'], 'Open platform request failed.');

        throw $this->mapException($message, $primaryCode, $secondaryCode, $payload);
    }

    /**
     * @param array<string, mixed> $payload
     */
    private function primaryCode(array $payload): ?int
    {
        $value = Arr::first($payload, ['result', 'code', 'status', 'error_code']);

        if ($value === null || $value === '') {
            return null;
        }

        return (int) $value;
    }

    /**
     * @param array<string, mixed> $payload
     */
    private function secondaryCode(array $payload): ?int
    {
        $value = Arr::first($payload, ['sub_code', 'subCode', 'sub_status']);

        if ($value === null || $value === '') {
            return null;
        }

        return (int) $value;
    }

    private function isSuccess(?int $primaryCode): bool
    {
        return $primaryCode === null || in_array($primaryCode, [1, 200], true);
    }

    /**
     * @param array<string, mixed> $payload
     */
    private function mapException(string $message, ?int $primaryCode, ?int $secondaryCode, array $payload): BusinessException
    {
        return match ($primaryCode) {
            21, 24 => new AuthenticationException($message, $primaryCode, $secondaryCode, $payload),
            22, 25, 26 => new AuthorizationException($message, $primaryCode, $secondaryCode, $payload),
            27, 28 => new SignatureException($message, $primaryCode, $secondaryCode, $payload),
            15, 16, 17, 1016, 1017, 802000 => new RateLimitException($message, $primaryCode, $secondaryCode, $payload),
            default => new BusinessException($message, $primaryCode, $secondaryCode, $payload),
        };
    }
}
