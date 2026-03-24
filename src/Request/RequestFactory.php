<?php

declare(strict_types=1);

namespace Kwaishop\PhpSdk\Request;

use Kwaishop\PhpSdk\Config\Config;
use Kwaishop\PhpSdk\Sign\HmacSha256Signer;
use Kwaishop\PhpSdk\Sign\Md5Signer;
use Kwaishop\PhpSdk\Sign\SignerInterface;
use Kwaishop\PhpSdk\Support\Clock;
use Kwaishop\PhpSdk\Support\Json;

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
     * @return array{url:string, form_params:array<string, scalar|null>}
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
            'url' => sprintf('%s/%s', $this->config->baseUrl(), str_replace('.', '/', ltrim($method, '.'))),
            'form_params' => $publicParams,
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
