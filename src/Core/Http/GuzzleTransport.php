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

namespace KwaiShopSDK\Core\Http;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use KwaiShopSDK\Core\Profile\Config;
use KwaiShopSDK\Exception\TransportException;

final class GuzzleTransport implements TransportInterface
{
    public function __construct(
        private readonly ClientInterface $client,
        private readonly Config $config,
    ) {
    }

    public function send(string $httpMethod, string $url, array $options = []): array
    {
        try {
            $headers = [
                'Accept' => 'application/json',
                'User-Agent' => $this->config->userAgent(),
            ];

            if (isset($options['headers']) && is_array($options['headers'])) {
                $headers = array_merge($headers, $options['headers']);
            }

            $transportOptions = $options;
            $transportOptions['connect_timeout'] ??= $this->config->connectTimeout();
            $transportOptions['timeout'] ??= $this->config->readTimeout();
            $transportOptions['http_errors'] ??= false;
            $transportOptions['headers'] = $headers;

            if (array_key_exists('multipart', $transportOptions)) {
                unset($transportOptions['headers']['Content-Type']);
            }

            $response = $this->client->request(strtoupper($httpMethod), $url, $transportOptions);
        } catch (GuzzleException $exception) {
            throw new TransportException('HTTP transport failed: ' . $exception->getMessage(), previous: $exception);
        }

        return [
            'status' => $response->getStatusCode(),
            'headers' => $response->getHeaders(),
            'body' => (string) $response->getBody(),
        ];
    }
}
