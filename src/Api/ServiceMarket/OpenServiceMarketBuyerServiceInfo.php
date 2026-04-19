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

namespace KwaiShopSDK\Api\ServiceMarket;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 获取买家服务关系
 * 更新时间: 2023-05-10 14:07:04
 * 获取买家服务关系
 */
final class OpenServiceMarketBuyerServiceInfo extends RpcRequest
{
    protected string $apiMethod = 'open.service.market.buyer.service.info';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
