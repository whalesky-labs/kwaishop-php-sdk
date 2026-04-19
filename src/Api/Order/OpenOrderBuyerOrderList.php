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

namespace KwaiShopSDK\Api\Order;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 筛选买家在店铺的订单列表
 * 更新时间: 2022-06-09 16:39:37
 * 通过买家openId获取其在当前店铺的所有订单信息
 */
final class OpenOrderBuyerOrderList extends RpcRequest
{
    protected string $apiMethod = 'open.order.buyer.order.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
