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
 * 搜索标品申报列表（新）
 * 更新时间: 2025-06-20 17:29:11
 * 查询商家申报及纠错的标品信息
 */
final class OpenItemStandardApplyQuerySpu extends RpcRequest
{
    protected string $apiMethod = 'open.item.standard.apply.query.spu';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
