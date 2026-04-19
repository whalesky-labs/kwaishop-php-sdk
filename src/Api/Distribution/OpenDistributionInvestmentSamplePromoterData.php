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
 * 团长查询寄样商品达人上架及挂车数据
 * 更新时间: 2025-08-05 13:47:57
 * 团长查询寄样商品达人上架及挂车数据
 */
final class OpenDistributionInvestmentSamplePromoterData extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.investment.sample.promoter.data';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
