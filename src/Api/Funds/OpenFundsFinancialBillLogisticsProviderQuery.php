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
 * 物流供应商账单明细
 * 更新时间: 2025-08-27 10:52:22
 * 物流供应商账单明细，只包括已结算账单
 */
final class OpenFundsFinancialBillLogisticsProviderQuery extends RpcRequest
{
    protected string $apiMethod = 'open.funds.financial.bill.logistics.provider.query';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
