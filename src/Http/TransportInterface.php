<?php

declare(strict_types=1);

namespace Kwaishop\PhpSdk\Http;

interface TransportInterface
{
    /**
     * @param array<string, scalar|null> $formParams
     *
     * @return array{status:int, headers:array<string, mixed>, body:string}
     */
    public function sendForm(string $url, array $formParams): array;
}
