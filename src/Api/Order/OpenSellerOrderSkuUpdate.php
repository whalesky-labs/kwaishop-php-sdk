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
 * 修改订单规格信息
 * 更新时间: 2021-12-13 17:41:43
 * 根据订单id和商品id修改订单的商品规格信息，需要买家同意后，商家可进行修改
 */
final class OpenSellerOrderSkuUpdate extends RpcRequest
{
    protected string $apiMethod = 'open.seller.order.sku.update';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
