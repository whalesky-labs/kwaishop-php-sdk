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
 * 删除sku货品关联关系
 * 更新时间: 2025-06-20 17:23:13
 * 删除sku与货品关联关系
 */
final class OpenItemSkuGoodsRelationDelete extends RpcRequest
{
    protected string $apiMethod = 'open.item.sku.goods.relation.delete';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
