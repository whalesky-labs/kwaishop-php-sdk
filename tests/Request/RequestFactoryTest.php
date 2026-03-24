<?php

declare(strict_types=1);

namespace Kwaishop\PhpSdk\Tests\Request;

use Kwaishop\PhpSdk\Config\Config;
use Kwaishop\PhpSdk\Request\RequestFactory;
use Kwaishop\PhpSdk\Sign\Md5Signer;
use Kwaishop\PhpSdk\Tests\TestCase;

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

        self::assertSame('https://openapi.kwaixiaodian.com/open/seller/order/list', $request['url']);
        self::assertSame('ks123', $request['form_params']['appkey']);
        self::assertSame('open.seller.order.list', $request['form_params']['method']);
        self::assertSame('1', $request['form_params']['version']);
        self::assertSame('access-token', $request['form_params']['access_token']);
        self::assertSame('MD5', $request['form_params']['signMethod']);
        self::assertJson($request['form_params']['param']);
        self::assertNotEmpty($request['form_params']['sign']);
    }
}
