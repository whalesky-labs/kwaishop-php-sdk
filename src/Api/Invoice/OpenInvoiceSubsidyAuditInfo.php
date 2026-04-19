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
 * 国补消费者发票信息查询新接口
 * 更新时间: 2025-05-29 11:41:08
 * 国补消费者发票信息查询最新接口，可直接获取明文，无需调用解密接口
 */
final class OpenInvoiceSubsidyAuditInfo extends RpcRequest
{
    protected string $apiMethod = 'open.invoice.subsidy.audit.info';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
