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
 * 普通账单数据（待下线）
 * 更新时间: 2022-12-01 14:39:59
 * 待下线，请使用[open.funds.financial.settled.bill.detail(获取账单信息v2
 */
final class OpenFundsFinancialBillBatchDetail extends RpcRequest
{
    protected string $apiMethod = 'open.funds.financial.bill.batch.detail';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
