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

namespace KwaiShopSDK\Core;

use KwaiShopSDK\Exception\ValidationException;
use KwaiShopSDK\KwaiShopClient;

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
     * @param array<string, mixed> $params
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
     * @param array<string, mixed> $params
     *
     * @return array<string, mixed>
     */
    protected function transportOptions(array $params): array
    {
        return [];
    }
}
