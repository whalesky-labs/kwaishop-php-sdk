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
 * 查询快赚客拉新推广效果趋势数据
 * 更新时间: 2023-03-17 15:19:36
 * 查询快赚客拉新推广效果趋势数据
 */
final class OpenDistributionCpsKwaimoneyNewPromotionEffectTrend extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.cps.kwaimoney.new.promotion.effect.trend';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
