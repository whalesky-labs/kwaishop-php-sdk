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

use KwaiShopSDK\Exception\ValidationException;
use KwaiShopSDK\Client\KwaiShopClient;

abstract class RpcRequest
{
    protected string $apiMethod = '';
    protected string $httpMethod = 'POST';
    protected string $version = '1';
    protected string $contentType = 'application/x-www-form-urlencoded';

    public function __construct(
        protected readonly KwaiShopClient $client,
    ) {
    }

    /**
     * Execute the RPC request against the gateway.
     *
     * @param array<string, mixed> $params
     *
     * @throws ValidationException
     *
     * @return array<string, mixed>
     */
    public function execute(array $params = [], ?string $accessToken = null): array
    {
        if ($this->apiMethod === '') {
            throw new ValidationException('apiMethod cannot be blank.');
        }

        return $this->client->rawRequest(
            method: $this->apiMethod,
            params: $params,
            accessToken: $accessToken,
            version: $this->version,
            httpMethod: $this->httpMethod,
            contentType: $this->contentType,
            transportOptions: $this->transportOptions($params),
        );
    }

    /**
     * Provide additional transport options for this request.
     *
     * @param array<string, mixed> $params
     *
     * @return array<string, mixed>
     */
    protected function transportOptions(array $params): array
    {
        return [];
    }
}
