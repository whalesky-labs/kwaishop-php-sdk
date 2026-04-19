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
 * 获取品牌好货品牌商品
 * 更新时间: 2021-12-30 16:11:46
 * 平台运营人员根据专题模块属性不同，人工招商后，配置的商品
 */
final class OpenDistributionCpsPromotionBrandThemeItemList extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.cps.promotion.brand.theme.item.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
