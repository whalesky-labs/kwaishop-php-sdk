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
 * 获取类目相关配置信息
 * 更新时间: 2025-06-20 17:03:46
 * 获取类目相关配置信息，返回范围与店铺类型相关
 */
final class OpenItemCategoryConfig extends RpcRequest
{
    protected string $apiMethod = 'open.item.category.config';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
