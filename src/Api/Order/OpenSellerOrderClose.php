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
 * 关闭订单
 * 更新时间: 2021-12-13 17:41:21
 * 关闭订单，待付款订单可关闭
 */
final class OpenSellerOrderClose extends RpcRequest
{
    protected string $apiMethod = 'open.seller.order.close';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
