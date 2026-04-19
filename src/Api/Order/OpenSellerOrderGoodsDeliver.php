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
 * 订单发货
 * 更新时间: 2024-05-30 18:01:37
 * ://open.kwaixiaodian.com/zone/docs/api?name
 */
final class OpenSellerOrderGoodsDeliver extends RpcRequest
{
    protected string $apiMethod = 'open.seller.order.goods.deliver';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
