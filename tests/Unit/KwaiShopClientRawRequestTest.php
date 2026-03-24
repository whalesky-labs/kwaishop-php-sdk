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

namespace KwaiShopSDK\Tests\Unit;

use PHPUnit\Framework\TestCase;
use KwaiShopSDK\Core\Profile\Config;
use KwaiShopSDK\Exception\ValidationException;
use KwaiShopSDK\KwaiShopClient;
use KwaiShopSDK\Tests\Mock\FakeTransport;

final class KwaiShopClientRawRequestTest extends TestCase
{
    public function testRawRequestRejectsUnsupportedGatewayMethod(): void
    {
        $client = new KwaiShopClient($this->makeConfig(), new FakeTransport());

        $this->expectException(ValidationException::class);
        $client->rawRequest('open.shop.info.get', [], 'token', '1', 'DELETE');
    }

    public function testRawRequestMergesGatewayFieldsIntoMultipartRequest(): void
    {
        $transport = new FakeTransport();
        $client = new KwaiShopClient($this->makeConfig(), $transport);

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

    private function makeConfig(): Config
    {
        return new Config(
            appKey: 'test-app-key',
            appSecret: 'test-app-secret',
            signSecret: 'test-sign-secret'
        );
    }
}
