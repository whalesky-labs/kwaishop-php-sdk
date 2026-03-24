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

namespace KwaiShopSDK;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use KwaiShopSDK\Core\Auth\OAuthClient;
use KwaiShopSDK\Core\Http\GuzzleTransport;
use KwaiShopSDK\Core\Http\TransportInterface;
use KwaiShopSDK\Core\Pipeline\RequestFactory;
use KwaiShopSDK\Core\Pipeline\ResponseParser;
use KwaiShopSDK\Core\Profile\Config;
use KwaiShopSDK\Exception\ValidationException;

final class KwaiShopClient
{
    private readonly TransportInterface $transport;
    private readonly RequestFactory $requestFactory;
    private readonly ResponseParser $responseParser;
    private readonly OAuthClient $oauthClient;

    public function __construct(
        private readonly Config $config,
        ?TransportInterface $transport = null,
        ?ClientInterface $httpClient = null,
        ?RequestFactory $requestFactory = null,
        ?ResponseParser $responseParser = null,
    ) {
        $this->responseParser = $responseParser ?? new ResponseParser();
        $this->transport = $transport ?? new GuzzleTransport($httpClient ?? new Client(), $this->config);
        $this->requestFactory = $requestFactory ?? new RequestFactory($this->config);
        $this->oauthClient = new OAuthClient($this->config, $this->transport, $this->responseParser);
    }

    public function config(): Config
    {
        return $this->config;
    }

    public function oauth(): OAuthClient
    {
        return $this->oauthClient;
    }

    public function rawRequest(
        string $method,
        array $params,
        ?string $accessToken = null,
        string $version = '1',
        string $httpMethod = 'POST',
        string $contentType = 'application/x-www-form-urlencoded',
        array $transportOptions = [],
    ): array {
        $request = $this->requestFactory->build($method, $params, $accessToken, $version);

        return match (strtoupper($httpMethod)) {
            'GET' => $this->get(
                $request['url'],
                $request['params'],
                $this->headersFromOptions($transportOptions)
            ),
            'POST' => $this->sendGatewayBody($request['url'], $request['params'], $contentType, $transportOptions),
            default => throw new ValidationException(sprintf(
                'Unsupported gateway HTTP method "%s". Only GET and POST are currently supported.',
                strtoupper($httpMethod)
            )),
        };
    }

    /**
     * @param array<string, scalar|null> $query
     * @param array<string, string> $headers
     *
     * @return array<string, mixed>
     */
    public function get(string $url, array $query = [], array $headers = []): array
    {
        return $this->request('GET', $url, [
            'query' => $query,
            'headers' => $headers,
        ]);
    }

    /**
     * @param array<string, scalar|null> $form
     * @param array<string, string> $headers
     *
     * @return array<string, mixed>
     */
    public function post(string $url, array $form = [], array $headers = []): array
    {
        return $this->request('POST', $url, [
            'form_params' => $form,
            'headers' => array_merge([
                'Content-Type' => 'application/x-www-form-urlencoded',
            ], $headers),
        ]);
    }

    /**
     * @param array<string, scalar|null> $json
     * @param array<string, string> $headers
     *
     * @return array<string, mixed>
     */
    public function postJson(string $url, array $json = [], array $headers = []): array
    {
        return $this->request('POST', $url, [
            'json' => $json,
            'headers' => array_merge([
                'Content-Type' => 'application/json',
            ], $headers),
        ]);
    }

    /**
     * @param list<array{name:string, contents:mixed, filename?:string, headers?:array<string, string>}> $multipart
     * @param array<string, string> $headers
     *
     * @return array<string, mixed>
     */
    public function upload(string $url, array $multipart, array $headers = []): array
    {
        return $this->request('POST', $url, [
            'multipart' => $multipart,
            'headers' => $headers,
        ]);
    }

    /**
     * @param array<string, mixed> $options
     *
     * @return array<string, mixed>
     */
    private function request(string $httpMethod, string $url, array $options = []): array
    {
        $response = $this->transport->send($httpMethod, $url, $options);

        return $this->responseParser->parse($response['status'], $response['body']);
    }

    /**
     * @param array<string, scalar|null> $params
     *
     * @return array<string, mixed>
     */
    private function sendGatewayBody(string $url, array $params, string $contentType, array $transportOptions = []): array
    {
        if (isset($transportOptions['multipart']) && is_array($transportOptions['multipart'])) {
            return $this->upload(
                $url,
                $this->mergeMultipartFields($params, $transportOptions['multipart']),
                $this->headersFromOptions($transportOptions)
            );
        }

        if (str_starts_with(strtolower($contentType), 'multipart/')) {
            return $this->upload($url, $this->normalizeMultipart($params), $this->headersFromOptions($transportOptions));
        }

        if ($contentType === 'application/json') {
            return $this->postJson($url, $params, $this->headersFromOptions($transportOptions));
        }

        return $this->post($url, $params, $this->headersFromOptions($transportOptions));
    }

    /**
     * @param array<string, scalar|null> $params
     *
     * @return list<array{name:string, contents:scalar}>
     */
    private function normalizeMultipart(array $params): array
    {
        $multipart = [];

        foreach ($params as $name => $contents) {
            if ($contents === null) {
                continue;
            }

            $multipart[] = [
                'name' => (string) $name,
                'contents' => $contents,
            ];
        }

        return $multipart;
    }

    /**
     * @param array<string, mixed> $transportOptions
     *
     * @return array<string, string>
     */
    private function headersFromOptions(array $transportOptions): array
    {
        $headers = $transportOptions['headers'] ?? [];

        return is_array($headers) ? $headers : [];
    }

    /**
     * @param array<string, scalar|null> $gatewayParams
     * @param list<array{name:string, contents:mixed, filename?:string, headers?:array<string, string>}> $multipart
     *
     * @return list<array{name:string, contents:mixed, filename?:string, headers?:array<string, string>}>
     */
    private function mergeMultipartFields(array $gatewayParams, array $multipart): array
    {
        $parts = [];

        foreach ($gatewayParams as $name => $contents) {
            if ($contents === null) {
                continue;
            }

            $parts[] = [
                'name' => (string) $name,
                'contents' => $contents,
            ];
        }

        foreach ($multipart as $part) {
            if (!is_array($part) || !isset($part['name'], $part['contents'])) {
                throw new ValidationException('Each multipart part must contain [name] and [contents].');
            }

            $normalized = [
                'name' => (string) $part['name'],
                'contents' => $part['contents'],
            ];

            if (isset($part['filename'])) {
                $normalized['filename'] = (string) $part['filename'];
            }

            if (isset($part['headers']) && is_array($part['headers'])) {
                $normalized['headers'] = $part['headers'];
            }

            $parts[] = $normalized;
        }

        return $parts;
    }
}
