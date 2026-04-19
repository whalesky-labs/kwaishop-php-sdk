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
 * 商家查询商品维度团长推广效果
 * 更新时间: 2023-08-24 14:34:54
 * 商家查询商品维度团长推广效果
 */
final class OpenDistributionSellerActivityPromotionEffectItem extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.seller.activity.promotion.effect.item';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
