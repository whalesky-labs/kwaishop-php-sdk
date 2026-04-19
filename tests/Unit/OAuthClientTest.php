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

use KwaiShopSDK\Auth\OAuthClient;
use KwaiShopSDK\Client\Pipeline\ResponseParser;
use KwaiShopSDK\Config\Config;
use KwaiShopSDK\Exception\ValidationException;
use KwaiShopSDK\Tests\Mock\FakeTransport;
use PHPUnit\Framework\TestCase;

final class OAuthClientTest extends TestCase
{
    public function testBuildAuthorizeUrlUsesOfficialParameterNames(): void
    {
        $client = new OAuthClient(
            new Config('ks123', 'app-secret', 'sign-secret'),
            new FakeTransport(),
            new ResponseParser()
        );

        $url = $client->buildAuthorizeUrl('https://example.com/callback', ['merchant_order', 'merchant_item'], 'state-1');

        self::assertStringContainsString('app_id=ks123', $url);
        self::assertStringContainsString('response_type=code', $url);
        self::assertStringContainsString('scope=merchant_order%2Cmerchant_item', $url);
        self::assertStringContainsString('redirect_uri=https%3A%2F%2Fexample.com%2Fcallback', $url);
        self::assertStringContainsString('state=state-1', $url);
    }

    public function testGetAccessTokenSendsOfficialFields(): void
    {
        $transport = new FakeTransport([
            [
                'status' => 200,
                'headers' => [],
                'body' => '{"result":1,"access_token":"at","refresh_token":"rt","open_id":"oid","expires_in":172800,"scopes":"merchant_order,merchant_item"}',
            ],
        ]);

        $client = new OAuthClient(
            new Config('ks123', 'app-secret', 'sign-secret'),
            $transport,
            new ResponseParser()
        );

        $response = $client->getAccessToken('grant-code');

        self::assertSame('at', $response->accessToken());
        self::assertSame('rt', $response->refreshToken());
        self::assertSame('https://openapi.kwaixiaodian.com/oauth2/access_token', $transport->requests[0]['url']);
        self::assertSame('ks123', $transport->requests[0]['options']['form_params']['app_id']);
        self::assertSame('code', $transport->requests[0]['options']['form_params']['grant_type']);
        self::assertSame('grant-code', $transport->requests[0]['options']['form_params']['code']);
    }

    public function testGetAccessTokenRejectsSuccessfulPayloadWithoutAccessToken(): void
    {
        $transport = new FakeTransport([
            [
                'status' => 200,
                'headers' => [],
                'body' => '{"result":1,"refresh_token":"rt"}',
            ],
        ]);

        $client = new OAuthClient(
            new Config('ks123', 'app-secret', 'sign-secret'),
            $transport,
            new ResponseParser()
        );

        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('Missing access_token in OAuth response.');

        $client->getAccessToken('grant-code');
    }
}
