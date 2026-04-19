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
 * 获取商家可选类目列表
 * 更新时间: 2025-06-20 17:04:57
 * 获取完整的类目树信息，以及当前授权商家的每级类目开通情况
 */
final class OpenItemCategoryOptionalGet extends RpcRequest
{
    protected string $apiMethod = 'open.item.category.optional.get';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
