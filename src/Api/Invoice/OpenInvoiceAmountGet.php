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

namespace KwaiShopSDK\Api\Invoice;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 查询商家开票金额
 * 更新时间: 2023-04-10 19:41:21
 * 查询商家开票金额
 */
final class OpenInvoiceAmountGet extends RpcRequest
{
    protected string $apiMethod = 'open.invoice.amount.get';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
