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

final class PendingRequest
{
    /**
     * Create a lazily configured RPC request wrapper.
     *
     * @param array<string, mixed> $params
     */
    public function __construct(
        private readonly RpcRequest $request,
        private array $params = [],
        private ?string $accessToken = null,
    ) {
    }

    /**
     * Replace the full parameter payload for the pending request.
     *
     * @param array<string, mixed> $params
     */
    public function setParams(array $params): self
    {
        $this->params = $params;

        return $this;
    }

    /**
     * Merge new parameters into the existing pending request payload.
     *
     * @param array<string, mixed> $params
     */
    public function mergeParams(array $params): self
    {
        $this->params = array_merge($this->params, $params);

        return $this;
    }

    /** Override the access token used when executing the pending request. */
    public function setAccessToken(?string $accessToken): self
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * Execute the underlying RPC request with the accumulated state.
     *
     * @return array<string, mixed>
     */
    public function send(): array
    {
        return $this->request->execute($this->params, $this->accessToken);
    }
}
