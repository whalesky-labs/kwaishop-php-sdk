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
 * [已废弃]修改商品报名服务费率
 * 更新时间: 2025-04-22 19:20:33
 * 修改商品报名服务费率，该接口用于一级团长报二级团长时，修改服务费率。
 */
final class OpenDistributionSecondActionEditApplyInvestmentActivity extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.second.action.edit.apply.investment.activity';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
