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

namespace KwaiShopSDK\Transport;

interface TransportInterface
{
    /**
     * Send an HTTP request and return the raw transport response.
     *
     * @param array<string, mixed> $options
     *
     * @return array{status:int, headers:array<string, mixed>, body:string}
     */
    public function send(string $httpMethod, string $url, array $options = []): array;
}
