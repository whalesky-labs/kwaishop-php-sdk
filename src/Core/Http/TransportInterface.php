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

namespace KwaiShopSDK\Core\Http;

interface TransportInterface
{
    /**
     * @param array<string, mixed> $options
     *
     * @return array{status:int, headers:array<string, mixed>, body:string}
     */
    public function send(string $httpMethod, string $url, array $options = []): array;
}
