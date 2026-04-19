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
 * 增减招商活动达人信息
 * 更新时间: 2023-08-03 15:28:04
 * 增减招商活动达人信息
 */
final class OpenDistributionInvestmentActivityAdjustActivityPromoter extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.investment.activity.adjustActivityPromoter';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
