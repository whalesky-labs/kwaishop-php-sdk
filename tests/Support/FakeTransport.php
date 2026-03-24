<?php

declare(strict_types=1);

namespace Kwaishop\PhpSdk\Tests\Support;

use Kwaishop\PhpSdk\Http\TransportInterface;

final class FakeTransport implements TransportInterface
{
    /**
     * @var list<array{url:string, form:array<string, scalar|null>}>
     */
    public array $requests = [];

    /**
     * @param list<array{status:int, headers:array<string, mixed>, body:string}> $responses
     */
    public function __construct(
        private array $responses = [],
    ) {
    }

    public function sendForm(string $url, array $formParams): array
    {
        $this->requests[] = [
            'url' => $url,
            'form' => $formParams,
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
