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
 * 查询我发起的招商活动
 * 更新时间: 2024-10-15 17:38:52
 * (团长使用)查询我发起的招商活动
 */
final class OpenDistributionInvestmentMyCreateActivityList extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.investment.my.create.activity.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
