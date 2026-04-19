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

namespace KwaiShopSDK\Client;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use KwaiShopSDK\Auth\OAuthClient;
use KwaiShopSDK\Transport\GuzzleTransport;
use KwaiShopSDK\Transport\TransportInterface;
use KwaiShopSDK\Client\PendingRequest;
use KwaiShopSDK\Client\Pipeline\RequestFactory;
use KwaiShopSDK\Client\Pipeline\ResponseParser;
use KwaiShopSDK\Config\Config;
use KwaiShopSDK\Client\RpcRequest;
use KwaiShopSDK\Exception\ValidationException;
use KwaiShopSDK\Generated\ApiClientMethods;

final class KwaiShopClient
{
    use ApiClientMethods;

    private const SUPPORTED_OPTIONS = [
        'accessToken',
        'baseUrl',
        'oauthAuthorizeUrl',
        'oauthAccessTokenUrl',
        'oauthRefreshTokenUrl',
        'signMethod',
        'connectTimeout',
        'readTimeout',
        'autoDetectRuntime',
        'userAgent',
    ];

    /**
     * @var array<string, class-string<RpcRequest>|null>
     */
    private static array $apiClassMap = [];

    private readonly Config $config;
    private readonly TransportInterface $transport;
    private readonly RequestFactory $requestFactory;
    private readonly ResponseParser $responseParser;
    private readonly OAuthClient $oauthClient;

    /**
     * Create a client from raw credentials and an associative options array.
     *
     * @param array<string, mixed> $options
     *
     * @throws ValidationException
     */
    public function __construct(
        string $appKey,
        ?string $appSecret,
        string $signSecret,
        array $options = [],
        ?TransportInterface $transport = null,
        ?ClientInterface $httpClient = null,
        ?RequestFactory $requestFactory = null,
        ?ResponseParser $responseParser = null,
    ) {
        $this->config = $this->buildConfigFromOptions($appKey, $appSecret, $signSecret, $options);
        $this->responseParser = $responseParser ?? new ResponseParser();
        $this->transport = $transport ?? new GuzzleTransport($httpClient ?? new Client(), $this->config);
        $this->requestFactory = $requestFactory ?? new RequestFactory($this->config);
        $this->oauthClient = new OAuthClient($this->config, $this->transport, $this->responseParser);
    }

    /** Get the immutable runtime configuration for the client. */
    public function config(): Config
    {
        return $this->config;
    }

    /** Get the OAuth helper bound to this client. */
    public function oauth(): OAuthClient
    {
        return $this->oauthClient;
    }

    /**
     * Resolve a generated API method into a pending request.
     *
     * @param array<int, mixed> $arguments
     *
     * @throws ValidationException
     */
    public function __call(string $name, array $arguments): PendingRequest
    {
        if ($arguments !== []) {
            throw new ValidationException(sprintf(
                'Dynamic API method [%s] does not accept constructor arguments.',
                $name
            ));
        }

        $className = $this->resolveApiClass($name);

        return $this->createPendingRequest($className);
    }

    /**
     * Send a low-level gateway request without using a generated API class.
     *
     * @param array<string, mixed> $params
     * @param array<string, mixed> $transportOptions
     *
     * @throws ValidationException
     *
     * @return array<string, mixed>
     */
    public function rawRequest(
        string $method,
        array $params,
        ?string $accessToken = null,
        string $version = '1',
        string $httpMethod = 'POST',
        string $contentType = 'application/x-www-form-urlencoded',
        array $transportOptions = [],
    ): array {
        $accessToken ??= $this->config->accessToken();
        $request = $this->requestFactory->build($method, $params, $accessToken, $version);

        return match (strtoupper($httpMethod)) {
            'GET' => $this->get(
                $request['url'],
                $request['params'],
                $this->headersFromOptions($transportOptions),
                $transportOptions
            ),
            'POST' => $this->sendGatewayBody($request['url'], $request['params'], $contentType, $transportOptions),
            default => throw new ValidationException(sprintf(
                'Unsupported gateway HTTP method "%s". Only GET and POST are currently supported.',
                strtoupper($httpMethod)
            )),
        };
    }

    /**
     * Send a plain GET request and parse the gateway response body.
     *
     * @param array<string, scalar|null> $query
     * @param array<string, string> $headers
     * @param array<string, mixed> $options
     *
     * @return array<string, mixed>
     */
    public function get(string $url, array $query = [], array $headers = [], array $options = []): array
    {
        $requestOptions = $this->prepareRequestOptions($headers, $options);
        $requestOptions['query'] = $query;

        return $this->request('GET', $url, $requestOptions);
    }

    /**
     * Send a form-encoded POST request and parse the gateway response body.
     *
     * @param array<string, scalar|null> $form
     * @param array<string, string> $headers
     * @param array<string, mixed> $options
     *
     * @return array<string, mixed>
     */
    public function post(string $url, array $form = [], array $headers = [], array $options = []): array
    {
        $requestOptions = $this->prepareRequestOptions([
            'Content-Type' => 'application/x-www-form-urlencoded',
            ...$headers,
        ], $options);
        $requestOptions['form_params'] = $form;

        return $this->request('POST', $url, $requestOptions);
    }

    /**
     * Send a JSON POST request and parse the gateway response body.
     *
     * @param array<string, scalar|null> $json
     * @param array<string, string> $headers
     * @param array<string, mixed> $options
     *
     * @return array<string, mixed>
     */
    public function postJson(string $url, array $json = [], array $headers = [], array $options = []): array
    {
        $requestOptions = $this->prepareRequestOptions([
            'Content-Type' => 'application/json',
            ...$headers,
        ], $options);
        $requestOptions['json'] = $json;

        return $this->request('POST', $url, $requestOptions);
    }

    /**
     * Send a multipart POST request and parse the gateway response body.
     *
     * @param list<array{name:string, contents:mixed, filename?:string, headers?:array<string, string>}> $multipart
     * @param array<string, string> $headers
     * @param array<string, mixed> $options
     *
     * @return array<string, mixed>
     */
    public function upload(string $url, array $multipart, array $headers = [], array $options = []): array
    {
        $requestOptions = $this->prepareRequestOptions($headers, $options);
        $requestOptions['multipart'] = $multipart;

        return $this->request('POST', $url, $requestOptions);
    }

    /**
     * Send an HTTP request through the configured transport.
     *
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
     * Dispatch the signed gateway payload using the configured body transport mode.
     *
     * @param array<string, scalar|null> $params
     * @param array<string, mixed> $transportOptions
     *
     * @return array<string, mixed>
     */
    private function sendGatewayBody(string $url, array $params, string $contentType, array $transportOptions = []): array
    {
        $normalizedContentType = $this->normalizeContentType($contentType);

        if (isset($transportOptions['multipart']) && is_array($transportOptions['multipart'])) {
            return $this->upload(
                $url,
                $this->mergeMultipartFields($params, $transportOptions['multipart']),
                $this->headersFromOptions($transportOptions),
                $this->withoutOption($transportOptions, 'multipart')
            );
        }

        if (str_starts_with($normalizedContentType, 'multipart/')) {
            return $this->upload(
                $url,
                $this->normalizeMultipart($params),
                $this->headersFromOptions($transportOptions),
                $transportOptions
            );
        }

        if ($normalizedContentType === 'application/json') {
            return $this->postJson($url, $params, $this->headersFromOptions($transportOptions), $transportOptions);
        }

        return $this->post($url, $params, $this->headersFromOptions($transportOptions), $transportOptions);
    }

    /**
     * Create a pending request wrapper for a resolved RPC request class.
     *
     * @param class-string<RpcRequest> $className
     */
    private function createPendingRequest(string $className): PendingRequest
    {
        return new PendingRequest(new $className($this));
    }

    /**
     * Forward an explicitly generated API method to the shared pending-request factory.
     *
     * @param array<int, mixed> $arguments
     * @param class-string<RpcRequest> $className
     *
     * @throws ValidationException
     */
    private function forwardExplicitApiCall(string $method, array $arguments, string $className): PendingRequest
    {
        if ($arguments !== []) {
            throw new ValidationException(sprintf(
                'Dynamic API method [%s] does not accept constructor arguments.',
                $method
            ));
        }

        return $this->createPendingRequest($className);
    }

    /** Build the immutable runtime config from constructor credentials and options. */
    private function buildConfigFromOptions(
        string $appKey,
        ?string $appSecret,
        string $signSecret,
        array $options
    ): Config {
        if ($options !== [] && array_is_list($options)) {
            throw new ValidationException('options must be an associative array.');
        }

        $unsupportedKeys = array_values(array_diff(array_keys($options), self::SUPPORTED_OPTIONS));
        if ($unsupportedKeys !== []) {
            throw new ValidationException(sprintf(
                'Unsupported client options: %s. Supported options are: %s.',
                implode(', ', array_map('strval', $unsupportedKeys)),
                implode(', ', self::SUPPORTED_OPTIONS)
            ));
        }

        return Config::fromArray([
            ...$options,
            'appKey' => $appKey,
            'appSecret' => $appSecret,
            'signSecret' => $signSecret,
        ]);
    }

    /**
     * Convert scalar request parameters to a multipart payload.
     *
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
     * Extract request headers from arbitrary transport options.
     *
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
     * Merge explicit headers into the outgoing transport options array.
     *
     * @param array<string, string> $headers
     * @param array<string, mixed> $options
     *
     * @return array<string, mixed>
     */
    private function prepareRequestOptions(array $headers, array $options): array
    {
        $requestOptions = $options;
        $requestOptions['headers'] = array_merge(
            is_array($requestOptions['headers'] ?? null) ? $requestOptions['headers'] : [],
            $headers
        );

        return $requestOptions;
    }

    /**
     * Return a copy of the options array without a given key.
     *
     * @param array<string, mixed> $options
     *
     * @return array<string, mixed>
     */
    private function withoutOption(array $options, string $key): array
    {
        unset($options[$key]);

        return $options;
    }

    /** Normalize a content type value to its lowercase media type. */
    private function normalizeContentType(string $contentType): string
    {
        $mediaType = explode(';', strtolower(trim($contentType)), 2)[0] ?? '';

        return trim($mediaType);
    }

    /**
     * Merge signed gateway fields into a user-provided multipart request body.
     *
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

    /**
     * Resolve a dynamic API method name to its request class.
     *
     * @throws ValidationException
     *
     * @return class-string<RpcRequest>
     */
    private function resolveApiClass(string $method): string
    {
        if (array_key_exists($method, self::$apiClassMap)) {
            $className = self::$apiClassMap[$method];

            if ($className === null) {
                throw new ValidationException(sprintf('Undefined API endpoint [%s].', $method));
            }

            return $className;
        }

        $matches = glob(dirname(__DIR__) . '/Api/*/' . $method . '.php') ?: [];

        if ($matches === []) {
            self::$apiClassMap[$method] = null;

            throw new ValidationException(sprintf('Undefined API endpoint [%s].', $method));
        }

        if (count($matches) > 1) {
            throw new ValidationException(sprintf('Ambiguous API endpoint [%s].', $method));
        }

        $category = basename(dirname($matches[0]));
        $className = sprintf('KwaiShopSDK\\Api\\%s\\%s', $category, $method);

        if (!class_exists($className)) {
            throw new ValidationException(sprintf('API endpoint class [%s] could not be loaded.', $className));
        }

        self::$apiClassMap[$method] = $className;

        return $className;
    }
}
