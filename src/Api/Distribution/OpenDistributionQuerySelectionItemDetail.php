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
 * 查询选品库商品详情
 * 更新时间: 2024-10-11 16:29:04
 * 查询选品库商品详情
 */
final class OpenDistributionQuerySelectionItemDetail extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.query.selection.item.detail';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
