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
 * 优惠券发放
 * 更新时间: 2025-02-13 15:43:18
 * 给特定用户定向发放已创建好的优惠券，发放渠道为创建优惠券时可支持的渠道
 */
final class OpenPromotionCouponSend extends RpcRequest
{
    protected string $apiMethod = 'open.promotion.coupon.send';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
