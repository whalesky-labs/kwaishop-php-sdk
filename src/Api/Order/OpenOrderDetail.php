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
 * 获取订单详情
 * 更新时间: 2026-03-05 16:07:15
 * 获取订单详情
 */
final class OpenOrderDetail extends RpcRequest
{
    protected string $apiMethod = 'open.order.detail';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
