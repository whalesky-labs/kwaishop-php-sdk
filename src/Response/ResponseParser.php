<?php

declare(strict_types=1);

namespace Kwaishop\PhpSdk\Response;

use Kwaishop\PhpSdk\Exception\AuthenticationException;
use Kwaishop\PhpSdk\Exception\AuthorizationException;
use Kwaishop\PhpSdk\Exception\BusinessException;
use Kwaishop\PhpSdk\Exception\RateLimitException;
use Kwaishop\PhpSdk\Exception\SignatureException;
use Kwaishop\PhpSdk\Exception\TransportException;
use Kwaishop\PhpSdk\Support\Arr;
use Kwaishop\PhpSdk\Support\Json;

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
