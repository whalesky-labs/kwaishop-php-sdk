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

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Response;
use KwaiShopSDK\Transport\GuzzleTransport;
use KwaiShopSDK\Config\Config;
use KwaiShopSDK\Runtime\RuntimeProfile;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class GuzzleTransportTest extends TestCase
{
    public function testFpmRuntimeKeepsConnectionReuse(): void
    {
        $httpClient = new class () implements ClientInterface {
            public array $requests = [];

            public function send(RequestInterface $request, array $options = []): ResponseInterface
            {
                throw new \BadMethodCallException('Not used.');
            }

            public function sendAsync(RequestInterface $request, array $options = []): PromiseInterface
            {
                throw new \BadMethodCallException('Not used.');
            }

            public function request(string $method, $uri = '', array $options = []): ResponseInterface
            {
                $this->requests[] = ['method' => $method, 'uri' => (string) $uri, 'options' => $options];

                return new Response(200, [], '{"result":1}');
            }

            public function requestAsync(string $method, $uri = '', array $options = []): PromiseInterface
            {
                throw new \BadMethodCallException('Not used.');
            }

            public function getConfig(?string $option = null): mixed
            {
                return null;
            }
        };

        $transport = new GuzzleTransport(
            $httpClient,
            new Config('app-key', 'app-secret', 'sign-secret'),
            new RuntimeProfile('fpm')
        );

        $transport->send('GET', 'https://example.com', []);

        self::assertSame('keep-alive', $httpClient->requests[0]['options']['headers']['Connection']);
    }

    public function testSwooleRuntimeDisablesConnectionReuse(): void
    {
        $httpClient = new class () implements ClientInterface {
            public array $requests = [];

            public function send(RequestInterface $request, array $options = []): ResponseInterface
            {
                throw new \BadMethodCallException('Not used.');
            }

            public function sendAsync(RequestInterface $request, array $options = []): PromiseInterface
            {
                throw new \BadMethodCallException('Not used.');
            }

            public function request(string $method, $uri = '', array $options = []): ResponseInterface
            {
                $this->requests[] = ['method' => $method, 'uri' => (string) $uri, 'options' => $options];

                return new Response(200, [], '{"result":1}');
            }

            public function requestAsync(string $method, $uri = '', array $options = []): PromiseInterface
            {
                throw new \BadMethodCallException('Not used.');
            }

            public function getConfig(?string $option = null): mixed
            {
                return null;
            }
        };

        $transport = new GuzzleTransport(
            $httpClient,
            new Config('app-key', 'app-secret', 'sign-secret'),
            new RuntimeProfile('swoole')
        );

        $transport->send('GET', 'https://example.com', []);

        self::assertSame('close', $httpClient->requests[0]['options']['headers']['Connection']);
    }
}
