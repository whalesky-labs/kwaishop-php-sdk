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
 * 一级团长查看自己报名的招商活动列表
 * 更新时间: 2024-05-29 15:02:17
 * 一级团长查看自己报名的招商活动列表
 */
final class OpenDistributionSecondApplyInvestmentActivityList extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.second.apply.investment.activity.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
