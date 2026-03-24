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

namespace KwaiShopSDK\Core\Pipeline;

use KwaiShopSDK\Core\Profile\Config;
use KwaiShopSDK\Core\Signing\HmacSha256Signer;
use KwaiShopSDK\Core\Signing\Md5Signer;
use KwaiShopSDK\Core\Signing\SignerInterface;
use KwaiShopSDK\Support\Clock;
use KwaiShopSDK\Support\Json;

final class RequestFactory
{
    public function __construct(
        private readonly Config $config,
        private readonly ?SignerInterface $signer = null,
    ) {
    }

    /**
     * @param array<string, mixed> $params
     *
     * @return array{url:string, params:array<string, scalar|null>}
     */
    public function build(string $method, array $params, ?string $accessToken = null, string $version = '1'): array
    {
        $publicParams = [
            'appkey' => $this->config->appKey(),
            'method' => $method,
            'version' => $version,
            'param' => Json::encode($params),
            'access_token' => $accessToken,
            'timestamp' => Clock::currentMilliseconds(),
            'signMethod' => $this->signer()->name(),
        ];

        $publicParams['sign'] = $this->signer()->sign($publicParams, $this->config->signSecret());

        return [
            'url' => $this->config->baseUrl(),
            'params' => $publicParams,
        ];
    }

    private function signer(): SignerInterface
    {
        if ($this->signer !== null) {
            return $this->signer;
        }

        return $this->config->signMethod() === Config::SIGN_METHOD_MD5
            ? new Md5Signer()
            : new HmacSha256Signer();
    }
}
