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
 * 用户观看时长是否符合阈值
 * 更新时间: 2022-07-22 15:29:04
 * 判断用户在当前主播的直播间观看时长是否达到了传入的时长阈值，非实时获取，每20s获取一次时长，因此误差值在0s-20s之间
 */
final class OpenLiveShopWatchTimeMatch extends RpcRequest
{
    protected string $apiMethod = 'open.live.shop.watch.time.match';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
