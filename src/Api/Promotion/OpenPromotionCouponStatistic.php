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

namespace KwaiShopSDK\Api\Promotion;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 查询优惠券使用详情
 * 更新时间: 2025-02-13 15:51:20
 * 根据优惠券id查询优惠券的使用和消耗统计信息
 */
final class OpenPromotionCouponStatistic extends RpcRequest
{
    protected string $apiMethod = 'open.promotion.coupon.statistic';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
