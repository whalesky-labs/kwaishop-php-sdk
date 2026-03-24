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

namespace KwaiShopSDK\Tests\Unit\Api\Shop;

use PHPUnit\Framework\TestCase;
use KwaiShopSDK\Api\Shop\OpenScoreMasterGet;
use KwaiShopSDK\Core\Profile\Config;
use KwaiShopSDK\KwaiShopClient;
use KwaiShopSDK\Tests\Mock\FakeTransport;

final class OpenScoreMasterGetTest extends TestCase
{
    public function testExecuteSendsOfficialGatewayMethod(): void
    {
        $transport = new FakeTransport([
            [
                'status' => 200,
                'headers' => [],
                'body' => '{"result":1,"data":{"hasData":true}}',
            ],
        ]);

        $client = new KwaiShopClient(
            new Config(
                appKey: 'test-app-key',
                appSecret: 'test-app-secret',
                signSecret: 'test-sign-secret'
            ),
            $transport
        );

        $api = new OpenScoreMasterGet($client);
        $response = $api->execute([], 'test-access-token');

        self::assertSame(1, $response['result']);
        self::assertSame('GET', $transport->requests[0]['method']);
        self::assertSame('https://openapi.kwaixiaodian.com', $transport->requests[0]['url']);
        self::assertSame('open.score.master.get', $transport->requests[0]['options']['query']['method']);
        self::assertSame('test-access-token', $transport->requests[0]['options']['query']['access_token']);
        self::assertSame('application/json', $transport->requests[0]['options']['headers']['Content-Type'] ?? 'application/json');
    }

}
