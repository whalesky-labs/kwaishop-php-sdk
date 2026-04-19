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
 * 追加包裹
 * 更新时间: 2022-11-10 16:35:32
 * 订单追加发货包裹，入参oid只支持主品订单id 1.普通订单状态为”已发货“后，可以使用追加包裹 2.主品赠品订单为”已发货“，并且所有主品赠品商品都”全部发货“后，可以使用追加包裹
 */
final class OpenSellerOrderGoodsLogisticsAppend extends RpcRequest
{
    protected string $apiMethod = 'open.seller.order.goods.logistics.append';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
