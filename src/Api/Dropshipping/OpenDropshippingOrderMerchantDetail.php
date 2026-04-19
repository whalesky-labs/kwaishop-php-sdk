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
 * 商家获取代发订单详情
 * 更新时间: 2022-11-30 20:41:19
 * 【商家端】商家主动查询自己的代发订单详情
 */
final class OpenDropshippingOrderMerchantDetail extends RpcRequest
{
    protected string $apiMethod = 'open.dropshipping.order.merchant.detail';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
