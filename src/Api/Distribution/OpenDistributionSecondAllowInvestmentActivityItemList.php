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
 * 一级团长查看能够报名招商活动的商品
 * 更新时间: 2024-05-29 19:23:38
 * 一级团长查看能够报名指定ID招商活动的商品
 */
final class OpenDistributionSecondAllowInvestmentActivityItemList extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.second.allow.investment.activity.item.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
