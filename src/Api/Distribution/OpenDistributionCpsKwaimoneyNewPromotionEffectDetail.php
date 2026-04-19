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
 * 查询快赚客拉新推广效果数据明细
 * 更新时间: 2023-04-26 18:19:25
 * 查询快赚客拉新推广效果数据明细
 */
final class OpenDistributionCpsKwaimoneyNewPromotionEffectDetail extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.cps.kwaimoney.new.promotion.effect.detail';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
