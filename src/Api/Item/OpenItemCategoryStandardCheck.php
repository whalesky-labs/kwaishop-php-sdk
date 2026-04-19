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
 * 获取标品发品规则
 * 更新时间: 2025-12-11 14:18:57
 * 获取标品的发品规则，判断类目是否可以用来发布标品
 */
final class OpenItemCategoryStandardCheck extends RpcRequest
{
    protected string $apiMethod = 'open.item.category.standard.check';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
