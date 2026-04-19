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
 * 分销计划新增达人佣金
 * 更新时间: 2021-12-30 16:07:38
 * 分销计划新增达人佣金
 */
final class OpenDistributionDistributionPlanAddPromoter extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.distribution.plan.add.promoter';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
