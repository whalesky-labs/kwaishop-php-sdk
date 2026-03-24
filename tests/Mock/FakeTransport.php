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

namespace KwaiShopSDK\Tests\Mock;

use KwaiShopSDK\Core\Http\TransportInterface;

final class FakeTransport implements TransportInterface
{
    /**
     * @var list<array{method:string, url:string, options:array<string, mixed>}>
     */
    public array $requests = [];

    /**
     * @param list<array{status:int, headers:array<string, mixed>, body:string}> $responses
     */
    public function __construct(
        private array $responses = [],
    ) {
    }

    public function send(string $httpMethod, string $url, array $options = []): array
    {
        $this->requests[] = [
            'method' => strtoupper($httpMethod),
            'url' => $url,
            'options' => $options,
        ];

        if ($this->responses === []) {
            return [
                'status' => 200,
                'headers' => [],
                'body' => '{"result":1}',
            ];
        }

        return array_shift($this->responses);
    }
}
