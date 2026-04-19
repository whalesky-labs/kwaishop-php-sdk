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

use KwaiShopSDK\Client\Pipeline\ResponseParser;
use KwaiShopSDK\Exception\AuthenticationException;
use KwaiShopSDK\Exception\RateLimitException;
use KwaiShopSDK\Exception\SignatureException;
use KwaiShopSDK\Exception\TransportException;
use KwaiShopSDK\Exception\ValidationException;
use PHPUnit\Framework\TestCase;

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

    public function testParserIncludesResponseSnippetWhenJsonDecodeFails(): void
    {
        $parser = new ResponseParser();

        try {
            $parser->parse(200, '<html><title>502 Bad Gateway</title></html>');
            self::fail('Expected ValidationException was not thrown.');
        } catch (ValidationException $exception) {
            self::assertStringContainsString('Failed to decode JSON response.', $exception->getMessage());
            self::assertStringContainsString('<html><title>502 Bad Gateway</title></html>', $exception->getMessage());
        }
    }

    public function testParserMapsStructuredFailuresEvenWhenHttpStatusIsNon2xx(): void
    {
        $parser = new ResponseParser();

        $this->expectException(AuthenticationException::class);
        $parser->parse(401, '{"result":21,"error_msg":"token expired"}');
    }

    public function testParserKeepsNonJsonNon2xxResponsesAsTransportFailures(): void
    {
        $parser = new ResponseParser();

        try {
            $parser->parse(502, '<html>bad gateway</html>');
            self::fail('Expected TransportException was not thrown.');
        } catch (TransportException $exception) {
            self::assertSame(502, $exception->getCode());
            self::assertSame('<html>bad gateway</html>', $exception->rawResponseBody());
        }
    }
}
