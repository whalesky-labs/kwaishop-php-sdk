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
 * 站外分销快赚客订单详情查询
 * 更新时间: 2024-10-17 19:38:02
 * 站外分销快赚客订单详情查询
 */
final class OpenDistributionCpsKwaimoneyOrderDetail extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.cps.kwaimoney.order.detail';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
