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
 * 查询快赚客分销订单
 * 更新时间: 2024-10-17 19:37:51
 * 快赚客获取分销推广订单
 */
final class OpenDistributionCpsKwaimoneyOrderList extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.cps.kwaimoney.order.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
