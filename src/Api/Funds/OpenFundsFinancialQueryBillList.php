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
 * 查询达人账单列表
 * 更新时间: 2026-03-05 14:52:12
 * 导出场景，根据账单类型查询账单列表。
 */
final class OpenFundsFinancialQueryBillList extends RpcRequest
{
    protected string $apiMethod = 'open.funds.financial.query.bill.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
