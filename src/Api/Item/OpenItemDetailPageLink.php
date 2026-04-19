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

namespace KwaiShopSDK\Api\Item;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 获取商品详情页跳转链接
 * 更新时间: 2025-06-20 17:11:20
 * 根据商品id跳转到商品详情页，支持直接跳转商品详情页或跳转到直播间后打开商品详情页
 */
final class OpenItemDetailPageLink extends RpcRequest
{
    protected string $apiMethod = 'open.item.detail.page.link';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
