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
 * 查询账单信息（新）
 * 更新时间: 2025-10-30 21:26:03
 * 查询商家账单信息，支持基于order_id的单个查询和基于结算时间的批量订单查询
 */
final class OpenFundsFinancialSettledBillDetail extends RpcRequest
{
    protected string $apiMethod = 'open.funds.financial.settled.bill.detail';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
