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
 * 卖家查看推广效果总览
 * 更新时间: 2023-08-24 14:34:38
 * 卖家查看推广效果总览
 */
final class OpenDistributionSellerActivityPromotionEffectSummary extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.seller.activity.promotion.effect.summary';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
