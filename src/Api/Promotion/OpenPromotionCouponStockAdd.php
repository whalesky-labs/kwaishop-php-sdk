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
 * 修改券库存
 * 更新时间: 2025-02-13 15:43:01
 * 修改商家券库存
 */
final class OpenPromotionCouponStockAdd extends RpcRequest
{
    protected string $apiMethod = 'open.promotion.coupon.stock.add';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
