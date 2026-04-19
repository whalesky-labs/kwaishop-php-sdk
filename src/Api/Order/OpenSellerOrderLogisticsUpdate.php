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
 * 更新订单物流信息
 * 更新时间: 2024-06-24 17:31:28
 * 根据订单id和包裹id更新订单的物流信息，支持主赠订单
 */
final class OpenSellerOrderLogisticsUpdate extends RpcRequest
{
    protected string $apiMethod = 'open.seller.order.logistics.update';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
