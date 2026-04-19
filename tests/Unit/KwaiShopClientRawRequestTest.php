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

use KwaiShopSDK\Exception\ValidationException;
use KwaiShopSDK\Client\KwaiShopClient;
use KwaiShopSDK\Tests\Mock\FakeTransport;
use PHPUnit\Framework\TestCase;

final class KwaiShopClientRawRequestTest extends TestCase
{
    public function testRawRequestRejectsUnsupportedGatewayMethod(): void
    {
        $client = $this->makeClient(new FakeTransport());

        $this->expectException(ValidationException::class);
        $client->rawRequest('open.shop.info.get', [], 'token', '1', 'DELETE');
    }

    public function testRawRequestMergesGatewayFieldsIntoMultipartRequest(): void
    {
        $transport = new FakeTransport();
        $client = $this->makeClient($transport);

        $client->rawRequest(
            'open.demo.upload',
            ['biz_no' => 'A10086'],
            'token-1',
            '1',
            'POST',
            'multipart/form-data',
            [
                'multipart' => [
                    [
                        'name' => 'file',
                        'contents' => 'binary-content',
                        'filename' => 'demo.txt',
                    ],
                ],
            ]
        );

        self::assertSame('POST', $transport->requests[0]['method']);
        self::assertSame('appkey', $transport->requests[0]['options']['multipart'][0]['name']);
        self::assertSame('open.demo.upload', $transport->requests[0]['options']['multipart'][1]['contents']);
        $filePart = $transport->requests[0]['options']['multipart'][array_key_last($transport->requests[0]['options']['multipart'])];
        self::assertSame('file', $filePart['name']);
        self::assertSame('demo.txt', $filePart['filename']);
    }

    public function testRawRequestPassesTransportOptionsToGetRequests(): void
    {
        $transport = new FakeTransport();
        $client = $this->makeClient($transport);

        $client->rawRequest(
            'open.shop.info.get',
            [],
            'token',
            '1',
            'GET',
            'application/x-www-form-urlencoded',
            [
                'timeout' => 3.5,
                'connect_timeout' => 1.2,
                'debug' => true,
                'headers' => [
                    'X-Test' => '1',
                ],
            ]
        );

        self::assertSame(3.5, $transport->requests[0]['options']['timeout']);
        self::assertSame(1.2, $transport->requests[0]['options']['connect_timeout']);
        self::assertTrue($transport->requests[0]['options']['debug']);
        self::assertSame('1', $transport->requests[0]['options']['headers']['X-Test']);
        self::assertSame('open.shop.info.get', $transport->requests[0]['options']['query']['method']);
    }

    public function testRawRequestTreatsJsonContentTypeWithCharsetAsJson(): void
    {
        $transport = new FakeTransport();
        $client = $this->makeClient($transport);

        $client->rawRequest(
            'open.demo.json',
            ['foo' => 'bar'],
            'token',
            '1',
            'POST',
            'application/json; charset=utf-8',
            [
                'timeout' => 2.5,
            ]
        );

        self::assertSame(2.5, $transport->requests[0]['options']['timeout']);
        self::assertSame('open.demo.json', $transport->requests[0]['options']['json']['method']);
        self::assertStringContainsString('"foo":"bar"', (string) $transport->requests[0]['options']['json']['param']);
        self::assertArrayNotHasKey('form_params', $transport->requests[0]['options']);
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
