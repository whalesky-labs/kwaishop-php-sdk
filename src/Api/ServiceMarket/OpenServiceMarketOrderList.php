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
 * 获取服务市场订单列表
 * 更新时间: 2023-05-10 14:07:15
 * 获取服务市场订单列表
 */
final class OpenServiceMarketOrderList extends RpcRequest
{
    protected string $apiMethod = 'open.service.market.order.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
