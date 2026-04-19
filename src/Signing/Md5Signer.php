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

namespace KwaiShopSDK\Signing;

final class Md5Signer implements SignerInterface
{
    public function sign(array $parameters, string $signSecret): string
    {
        return md5($this->buildInput($parameters, $signSecret));
    }

    public function name(): string
    {
        return 'MD5';
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
