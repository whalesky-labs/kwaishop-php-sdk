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

namespace KwaiShopSDK\Api\Order;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 批量获取密文索引串
 * 更新时间: 2021-10-11 16:55:18
 * 根据明文信息批量获取密文索引串，可根据密文索引串进行比对合单
 */
final class OpenOrderSearchIndexBatch extends RpcRequest
{
    protected string $apiMethod = 'open.order.search.index.batch';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
