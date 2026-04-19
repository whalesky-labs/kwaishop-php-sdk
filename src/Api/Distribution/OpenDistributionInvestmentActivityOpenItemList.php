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
 * 团长招商活动已报名商品列表
 * 更新时间: 2025-07-30 16:18:35
 * 团长招商活动已报名商品列表
 */
final class OpenDistributionInvestmentActivityOpenItemList extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.investment.activity.open.item.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
