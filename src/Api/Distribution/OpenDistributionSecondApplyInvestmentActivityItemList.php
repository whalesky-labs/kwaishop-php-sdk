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
 * 一级团长查看报名其它招商活动的商品
 * 更新时间: 2025-09-23 16:13:59
 * 一级团长查看自己报名其它招商活动的商品
 */
final class OpenDistributionSecondApplyInvestmentActivityItemList extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.second.apply.investment.activity.item.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
