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
 * 国补消费者发票信息查询接口
 * 更新时间: 2025-03-20 19:37:36
 * 国补消费者发票信息查询接口
 */
final class OpenFundsSubsidyAuditInvoiceInfo extends RpcRequest
{
    protected string $apiMethod = 'open.funds.subsidy.audit.invoice.info';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
