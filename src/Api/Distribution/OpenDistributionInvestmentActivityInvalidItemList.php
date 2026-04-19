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
 * 招商活动失效商品列表
 * 更新时间: 2024-08-21 10:52:51
 * 招商活动失效商品列表
 */
final class OpenDistributionInvestmentActivityInvalidItemList extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.investment.activity.invalid.item.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
