<?php

declare(strict_types=1);

namespace Kwaishop\PhpSdk;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Kwaishop\PhpSdk\Config\Config;
use Kwaishop\PhpSdk\Http\GuzzleTransport;
use Kwaishop\PhpSdk\Http\TransportInterface;
use Kwaishop\PhpSdk\OAuth\OAuthClient;
use Kwaishop\PhpSdk\Request\RequestFactory;
use Kwaishop\PhpSdk\Resource\AfterSalesResource;
use Kwaishop\PhpSdk\Resource\ItemsResource;
use Kwaishop\PhpSdk\Resource\LogisticsResource;
use Kwaishop\PhpSdk\Resource\OrdersResource;
use Kwaishop\PhpSdk\Resource\ShopResource;
use Kwaishop\PhpSdk\Response\ResponseParser;

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

    public function orders(): OrdersResource
    {
        return new OrdersResource($this);
    }

    public function items(): ItemsResource
    {
        return new ItemsResource($this);
    }

    public function afterSales(): AfterSalesResource
    {
        return new AfterSalesResource($this);
    }

    public function logistics(): LogisticsResource
    {
        return new LogisticsResource($this);
    }

    public function shop(): ShopResource
    {
        return new ShopResource($this);
    }

    /**
     * @param array<string, mixed> $params
     *
     * @return array<string, mixed>
     */
    public function rawRequest(string $method, array $params, ?string $accessToken = null, string $version = '1'): array
    {
        $request = $this->requestFactory->build($method, $params, $accessToken, $version);
        $response = $this->transport->sendForm($request['url'], $request['form_params']);

        return $this->responseParser->parse($response['status'], $response['body']);
    }
}
