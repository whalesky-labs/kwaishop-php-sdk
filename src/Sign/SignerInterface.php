<?php

declare(strict_types=1);

namespace Kwaishop\PhpSdk\Sign;

interface SignerInterface
{
    /**
     * @param array<string, scalar|null> $parameters
     */
    public function sign(array $parameters, string $signSecret): string;

    public function name(): string;
}
