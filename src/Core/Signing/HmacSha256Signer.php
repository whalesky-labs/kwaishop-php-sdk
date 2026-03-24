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

final class HmacSha256Signer implements SignerInterface
{
    public function sign(array $parameters, string $signSecret): string
    {
        $input = $this->buildInput($parameters, $signSecret);

        return base64_encode(hash_hmac('sha256', $input, $signSecret, true));
    }

    public function name(): string
    {
        return 'HMAC_SHA256';
    }

    /**
     * @param array<string, scalar|null> $parameters
     */
    private function buildInput(array $parameters, string $signSecret): string
    {
        unset($parameters['sign'], $parameters['signSecret']);

        $filtered = array_filter(
            $parameters,
            static fn (mixed $value): bool => $value !== null
        );

        ksort($filtered);

        $segments = [];
        foreach ($filtered as $key => $value) {
            $segments[] = sprintf('%s=%s', $key, (string) $value);
        }

        $segments[] = sprintf('signSecret=%s', $signSecret);

        return implode('&', $segments);
    }
}
