<?php

declare(strict_types=1);

namespace Kwaishop\PhpSdk\Sign;

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
