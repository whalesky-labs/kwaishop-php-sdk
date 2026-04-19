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

namespace KwaiShopSDK\Api\Dropshipping;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 商家获取代发订单列表
 * 更新时间: 2022-11-30 20:10:39
 * 【商家端】商家主动拉取需要代发的订单列表信息
 */
final class OpenDropshippingOrderMerchantList extends RpcRequest
{
    protected string $apiMethod = 'open.dropshipping.order.merchant.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
