<?php

declare(strict_types=1);

namespace Kwaishop\PhpSdk\Tests\Response;

use Kwaishop\PhpSdk\Exception\RateLimitException;
use Kwaishop\PhpSdk\Exception\SignatureException;
use Kwaishop\PhpSdk\Response\ResponseParser;
use Kwaishop\PhpSdk\Tests\TestCase;

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
}
