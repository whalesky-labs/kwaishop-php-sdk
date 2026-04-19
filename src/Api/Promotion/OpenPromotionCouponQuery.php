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
 * 优惠券查询
 * 更新时间: 2025-02-13 15:32:57
 * 优惠券查询
 */
final class OpenPromotionCouponQuery extends RpcRequest
{
    protected string $apiMethod = 'open.promotion.coupon.query';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
