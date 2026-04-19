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

use KwaiShopSDK\Exception\ValidationException;
use KwaiShopSDK\Client\KwaiShopClient;
use KwaiShopSDK\Tests\Mock\FakeTransport;
use PHPUnit\Framework\TestCase;

final class KwaiShopClientDynamicApiTest extends TestCase
{
    public function testClientCanBeConstructedWithOptionsArray(): void
    {
        $transport = new FakeTransport();
        $client = new KwaiShopClient(
            'test-app-key',
            'test-app-secret',
            'test-sign-secret',
            [
                'accessToken' => 'default-token',
                'autoDetectRuntime' => false,
            ],
            $transport
        );

        $response = $client->OpenShopInfoGet()->send();

        self::assertSame(1, $response['result']);
        self::assertFalse($client->config()->autoDetectRuntime());
        self::assertSame('default-token', $transport->requests[0]['options']['query']['access_token']);
    }

    public function testDynamicApiMethodUsesDefaultAccessTokenFromConfig(): void
    {
        $transport = new FakeTransport();
        $client = $this->makeClient('default-token', $transport);

        $response = $client->OpenShopInfoGet()->send();

        self::assertSame(1, $response['result']);
        self::assertSame('GET', $transport->requests[0]['method']);
        self::assertSame('open.shop.info.get', $transport->requests[0]['options']['query']['method']);
        self::assertSame('default-token', $transport->requests[0]['options']['query']['access_token']);
    }

    public function testDynamicApiMethodSupportsParamsAndExplicitAccessTokenOverride(): void
    {
        $transport = new FakeTransport();
        $client = $this->makeClient('default-token', $transport);

        $client->OpenOrderDetail()
            ->setParams(['oid' => 'OID-10001'])
            ->setAccessToken('override-token')
            ->send();

        self::assertSame('GET', $transport->requests[0]['method']);
        self::assertSame('override-token', $transport->requests[0]['options']['query']['access_token']);
        self::assertSame('open.order.detail', $transport->requests[0]['options']['query']['method']);
        self::assertStringContainsString('"oid":"OID-10001"', (string) $transport->requests[0]['options']['query']['param']);
    }

    public function testDynamicApiMethodRejectsUnknownEndpoint(): void
    {
        $client = $this->makeClient(null, new FakeTransport());

        $this->expectException(ValidationException::class);
        $client->OpenNotExistsApi()->send();
    }

    public function testDynamicApiMethodRejectsUnexpectedArguments(): void
    {
        $client = $this->makeClient(null, new FakeTransport());

        $this->expectException(ValidationException::class);
        $client->OpenShopInfoGet('unexpected');
    }

    public function testConstructorRejectsUnknownOptions(): void
    {
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('Unsupported client options: retry');

        new KwaiShopClient(
            'test-app-key',
            'test-app-secret',
            'test-sign-secret',
            ['retry' => true]
        );
    }

    private function makeClient(?string $accessToken = null, ?FakeTransport $transport = null): KwaiShopClient
    {
        return new KwaiShopClient(
            'test-app-key',
            'test-app-secret',
            'test-sign-secret',
            $accessToken !== null ? ['accessToken' => $accessToken] : [],
            $transport
        );
    }
}
