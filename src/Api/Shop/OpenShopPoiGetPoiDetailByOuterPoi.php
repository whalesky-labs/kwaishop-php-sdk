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

namespace KwaiShopSDK\Api\Shop;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 获取门店poi详情
 * 更新时间: 2023-07-21 18:01:19
 * 通过图商poi获取快手poi详情
 */
final class OpenShopPoiGetPoiDetailByOuterPoi extends RpcRequest
{
    protected string $apiMethod = 'open.shop.poi.getPoiDetailByOuterPoi';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
