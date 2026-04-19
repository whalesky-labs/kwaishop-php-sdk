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
 * 结束优惠券
 * 更新时间: 2025-02-13 15:43:59
 * 结束优惠券
 */
final class OpenPromotionCouponOver extends RpcRequest
{
    protected string $apiMethod = 'open.promotion.coupon.over';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
