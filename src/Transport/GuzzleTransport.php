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

namespace KwaiShopSDK\Transport;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use KwaiShopSDK\Config\Config;
use KwaiShopSDK\Runtime\RuntimeProfile;
use KwaiShopSDK\Exception\TransportException;

final class GuzzleTransport implements TransportInterface
{
    private readonly RuntimeProfile $runtime;

    /** Create a transport adapter backed by Guzzle. */
    public function __construct(
        private readonly ClientInterface $client,
        private readonly Config $config,
        ?RuntimeProfile $runtime = null,
    ) {
        $this->runtime = $runtime ?? RuntimeProfile::detect();

        if ($this->config->autoDetectRuntime() && $this->runtime->shouldEnableSwooleHooks()) {
            RuntimeProfile::enableSwooleHooks();
            $this->runtime = RuntimeProfile::detect();
        }
    }

    /**
     * {@inheritDoc}
     *
     * @throws TransportException
     */
    public function send(string $httpMethod, string $url, array $options = []): array
    {
        try {
            $headers = [
                'Accept' => 'application/json',
                'User-Agent' => sprintf('%s (%s)', $this->config->userAgent(), $this->runtime->name()),
            ];

            if (isset($options['headers']) && is_array($options['headers'])) {
                $headers = array_merge($headers, $options['headers']);
            }

            $transportOptions = $options;
            $transportOptions['connect_timeout'] ??= $this->config->connectTimeout();
            $transportOptions['timeout'] ??= $this->config->readTimeout();
            $transportOptions['http_errors'] ??= false;
            $transportOptions['headers'] = $headers;
            $transportOptions = $this->applyRuntimeOptions($transportOptions);

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

    /**
     * Apply runtime-specific connection reuse options.
     *
     * @param array<string, mixed> $options
     *
     * @return array<string, mixed>
     */
    private function applyRuntimeOptions(array $options): array
    {
        if (!$this->config->autoDetectRuntime()) {
            return $options;
        }

        if ($this->runtime->shouldReuseConnections()) {
            $options['headers']['Connection'] ??= 'keep-alive';

            return $options;
        }

        $options['headers']['Connection'] ??= 'close';

        if (defined('CURLOPT_FORBID_REUSE')) {
            $options['curl'][CURLOPT_FORBID_REUSE] ??= true;
        }

        if (defined('CURLOPT_FRESH_CONNECT')) {
            $options['curl'][CURLOPT_FRESH_CONNECT] ??= true;
        }

        return $options;
    }
}
