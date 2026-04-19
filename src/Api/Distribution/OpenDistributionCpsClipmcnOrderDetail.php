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
 * getMcnOrderDetail
 * 更新时间: 2025-06-12 21:25:36
 * 获取二创机构订单详情
 */
final class OpenDistributionCpsClipmcnOrderDetail extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.cps.clipmcn.order.detail';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
