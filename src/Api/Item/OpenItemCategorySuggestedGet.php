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
 * 获取商品类目预测结果
 * 更新时间: 2025-06-25 10:32:41
 * 根据商品图片、标题和描述信息获取推荐的发品类目
 */
final class OpenItemCategorySuggestedGet extends RpcRequest
{
    protected string $apiMethod = 'open.item.category.suggested.get';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
