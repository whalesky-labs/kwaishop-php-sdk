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

namespace KwaiShopSDK\Api\Distribution;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 获取达人直播间小黄车上的商品列表
 * 更新时间: 2022-07-28 11:28:38
 * 获取达人直播间小黄车商品列表。 1.达人必须设有有效的站外直播推广需求 2.达人未直播则返回空列表 3.同时返回分销商品和自建商品
 */
final class OpenDistributionKwaimoneyLiveItemList extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.kwaimoney.live.item.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
