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

namespace KwaiShopSDK\Tests\Unit;

use KwaiShopSDK\Client\KwaiShopClient;
use KwaiShopSDK\Tests\Mock\FakeTransport;
use PHPUnit\Framework\TestCase;

final class KwaiShopClientHttpMethodsTest extends TestCase
{
    public function testGetUsesQueryOptions(): void
    {
        $transport = new FakeTransport();
        $client = $this->makeClient($transport);

        $client->get('https://example.com', ['foo' => 'bar']);

        self::assertSame('GET', $transport->requests[0]['method']);
        self::assertSame('bar', $transport->requests[0]['options']['query']['foo']);
    }

    public function testPostJsonUsesJsonPayload(): void
    {
        $transport = new FakeTransport();
        $client = $this->makeClient($transport);

        $client->postJson('https://example.com', ['foo' => 'bar']);

        self::assertSame('POST', $transport->requests[0]['method']);
        self::assertSame('bar', $transport->requests[0]['options']['json']['foo']);
        self::assertSame('application/json', $transport->requests[0]['options']['headers']['Content-Type']);
    }

    public function testUploadUsesMultipartPayload(): void
    {
        $transport = new FakeTransport();
        $client = $this->makeClient($transport);

        $client->upload('https://example.com', [
            [
                'name' => 'file',
                'contents' => 'binary-content',
                'filename' => 'demo.txt',
            ],
        ]);

        self::assertSame('POST', $transport->requests[0]['method']);
        self::assertSame('file', $transport->requests[0]['options']['multipart'][0]['name']);
        self::assertSame('demo.txt', $transport->requests[0]['options']['multipart'][0]['filename']);
    }

    private function makeClient(FakeTransport $transport): KwaiShopClient
    {
        return new KwaiShopClient(
            'test-app-key',
            'test-app-secret',
            'test-sign-secret',
            [],
            $transport
        );
    }
}
