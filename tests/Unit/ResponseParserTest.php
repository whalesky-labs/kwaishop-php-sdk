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
use KwaiShopSDK\Exception\RateLimitException;
use KwaiShopSDK\Exception\SignatureException;
use KwaiShopSDK\Exception\ValidationException;
use KwaiShopSDK\Core\Pipeline\ResponseParser;

final class ResponseParserTest extends TestCase
{
    public function testParserReturnsPayloadOnSuccess(): void
    {
        $parser = new ResponseParser();

        $payload = $parser->parse(200, '{"result":1,"data":{"foo":"bar"}}');

        self::assertSame('bar', $payload['data']['foo']);
    }

    public function testParserMapsSignatureFailures(): void
    {
        $parser = new ResponseParser();

        $this->expectException(SignatureException::class);
        $parser->parse(200, '{"result":27,"error_msg":"sign invalid"}');
    }

    public function testParserMapsRateLimitFailures(): void
    {
        $parser = new ResponseParser();

        $this->expectException(RateLimitException::class);
        $parser->parse(200, '{"result":1016,"error_msg":"too fast"}');
    }

    public function testParserRejectsGatewayPayloadWithoutStatusField(): void
    {
        $parser = new ResponseParser();

        $this->expectException(ValidationException::class);
        $parser->parse(200, '{"data":{"foo":"bar"}}');
    }
}
