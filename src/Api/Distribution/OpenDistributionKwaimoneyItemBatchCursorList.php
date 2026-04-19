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
 * 批量获取站外推广需求商品信息
 * 更新时间: 2022-07-28 11:27:32
 * 批量获取站外推广需求商品信息
 */
final class OpenDistributionKwaimoneyItemBatchCursorList extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.kwaimoney.item.batch.cursor.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
