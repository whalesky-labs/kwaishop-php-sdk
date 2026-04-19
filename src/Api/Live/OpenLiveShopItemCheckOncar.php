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

namespace KwaiShopSDK\Api\Live;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 商品是否在小黄车
 * 更新时间: 2022-07-22 15:29:40
 * 判断商品当前是否在主播直播间挂车
 */
final class OpenLiveShopItemCheckOncar extends RpcRequest
{
    protected string $apiMethod = 'open.live.shop.item.check.oncar';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
