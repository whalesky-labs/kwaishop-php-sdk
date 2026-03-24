<?php

declare(strict_types=1);

namespace Kwaishop\PhpSdk\Tests\Sign;

use Kwaishop\PhpSdk\Sign\Md5Signer;
use Kwaishop\PhpSdk\Tests\TestCase;

final class Md5SignerTest extends TestCase
{
    public function testMd5SignerFollowsDocumentedInputRule(): void
    {
        $signer = new Md5Signer();

        $params = [
            'appkey' => 'ks123',
            'method' => 'open.seller.order.list',
            'version' => '1',
            'param' => '{"title":"短袖"}',
            'access_token' => 'token',
            'timestamp' => '1583271919000',
            'signMethod' => 'MD5',
        ];

        $expected = md5(
            'access_token=token&appkey=ks123&method=open.seller.order.list&param={"title":"短袖"}&signMethod=MD5&timestamp=1583271919000&version=1&signSecret=sign-secret'
        );

        self::assertSame($expected, $signer->sign($params, 'sign-secret'));
    }
}
