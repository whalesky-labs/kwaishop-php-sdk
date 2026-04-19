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

namespace KwaiShopSDK\Api\Funds;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 查询用户钱包账单（平安、聚力、支付宝、微信）
 * 更新时间: 2026-03-05 14:52:30
 * 查询用户钱包账单（平安、聚力、支付宝、微信），支持达人、商家
 */
final class OpenFundsFinancialBillQueryAccount extends RpcRequest
{
    protected string $apiMethod = 'open.funds.financial.bill.query.account';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
