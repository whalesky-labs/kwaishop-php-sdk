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
 * 团长创建招商活动接口
 * 更新时间: 2026-01-14 16:31:08
 * 通过这个接口团长可以创建招商活动
 */
final class OpenDistributionInvestmentActivityOpenCreate extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.investment.activity.open.create';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
