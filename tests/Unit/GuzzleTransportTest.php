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

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Promise\PromiseInterface;
use KwaiShopSDK\Core\Http\GuzzleTransport;
use KwaiShopSDK\Core\Profile\Config;
use KwaiShopSDK\Core\Runtime\RuntimeProfile;

final class GuzzleTransportTest extends TestCase
{
    public function testFpmRuntimeKeepsConnectionReuse(): void
    {
        $httpClient = new class() implements ClientInterface {
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
        $httpClient = new class() implements ClientInterface {
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
