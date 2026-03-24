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
use KwaiShopSDK\Core\Pipeline\RequestFactory;
use KwaiShopSDK\Core\Profile\Config;
use KwaiShopSDK\Core\Signing\Md5Signer;

final class RequestFactoryTest extends TestCase
{
    public function testRequestFactoryBuildsGatewayRequest(): void
    {
        $config = new Config(
            appKey: 'ks123',
            appSecret: 'secret',
            signSecret: 'sign-secret',
            signMethod: Config::SIGN_METHOD_MD5
        );

        $factory = new RequestFactory($config, new Md5Signer());
        $request = $factory->build('open.seller.order.list', ['page_no' => 1], 'access-token');

        self::assertSame('https://openapi.kwaixiaodian.com', $request['url']);
        self::assertSame('ks123', $request['params']['appkey']);
        self::assertSame('open.seller.order.list', $request['params']['method']);
        self::assertSame('1', $request['params']['version']);
        self::assertSame('access-token', $request['params']['access_token']);
        self::assertSame('MD5', $request['params']['signMethod']);
        self::assertJson($request['params']['param']);
        self::assertNotEmpty($request['params']['sign']);
    }
}
