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
 * 标品信息查询
 * 更新时间: 2025-06-20 17:07:44
 * 查询标品的属性信息、标品ID、类目ID和类目路径信息
 */
final class OpenItemCategoryStandardSearch extends RpcRequest
{
    protected string $apiMethod = 'open.item.category.standard.search';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
