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
 * 一级团长可报名的招商活动列表
 * 更新时间: 2024-10-15 17:39:03
 * (二级团长业务)一级团长可报名的招商活动列表
 */
final class OpenDistributionSecondInvestmentActivityList extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.second.investment.activity.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
