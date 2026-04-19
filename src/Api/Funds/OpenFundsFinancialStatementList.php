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
 * 查询货款账单明细
 * 更新时间: 2024-01-03 10:53:51
 * 查询商家货款账单明细 (只有安心钱包渠道) 查询货款账单明细只有货款结算的账单 在安心钱包账单的基础上，扩展了一些账单计费项的数据。
 */
final class OpenFundsFinancialStatementList extends RpcRequest
{
    protected string $apiMethod = 'open.funds.financial.statement.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
