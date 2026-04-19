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
 * 用户是否点击和加购小黄车
 * 更新时间: 2022-07-26 13:10:27
 * 判断用户是否在当前主播的直播间点击和加购了小黄车
 */
final class OpenLiveShopUserCarAction extends RpcRequest
{
    protected string $apiMethod = 'open.live.shop.user.car.action';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
