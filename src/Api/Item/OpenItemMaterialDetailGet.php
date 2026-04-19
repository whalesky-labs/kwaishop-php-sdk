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
 * 查询商品素材详情
 * 更新时间: 2025-09-04 16:23:42
 * 查询商品素材详情
 */
final class OpenItemMaterialDetailGet extends RpcRequest
{
    protected string $apiMethod = 'open.item.material.detail.get';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
