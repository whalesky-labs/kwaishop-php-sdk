<?php

declare(strict_types=1);

namespace Kwaishop\PhpSdk\Tests\Sign;

use Kwaishop\PhpSdk\Sign\HmacSha256Signer;
use Kwaishop\PhpSdk\Tests\TestCase;

final class HmacSha256SignerTest extends TestCase
{
    public function testHmacSignerMatchesOfficialJavaFlow(): void
    {
        $signer = new HmacSha256Signer();

        $params = [
            'appkey' => 'ks123',
            'method' => 'open.seller.order.list',
            'version' => '1',
            'param' => '{"title":"短袖"}',
            'access_token' => 'token',
            'timestamp' => '1583271919000',
            'signMethod' => 'HMAC_SHA256',
        ];

        $input = 'access_token=token&appkey=ks123&method=open.seller.order.list&param={"title":"短袖"}&signMethod=HMAC_SHA256&timestamp=1583271919000&version=1&signSecret=sign-secret';
        $expected = base64_encode(hash_hmac('sha256', $input, 'sign-secret', true));

        self::assertSame($expected, $signer->sign($params, 'sign-secret'));
    }
}
