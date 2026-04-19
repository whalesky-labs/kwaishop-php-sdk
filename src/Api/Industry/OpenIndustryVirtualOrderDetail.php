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

namespace KwaiShopSDK\Api\Industry;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 查询虚拟订单详情
 * 更新时间: 2023-01-10 14:55:12
 * 查询虚拟订单详情信息
 */
final class OpenIndustryVirtualOrderDetail extends RpcRequest
{
    protected string $apiMethod = 'open.industry.virtual.order.detail';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
