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
 * 国补审计提交发票附带文件
 * 更新时间: 2025-07-15 20:55:10
 * 国补审计提交发票附带文件 调用方式见：https://docs.qingque.cn/d/home/eZQBHsmmNHWDQ2VF6_zr4Zjzo?identityId=1zcQPfssrKt
 */
final class OpenFundsSubsidyOpenApplyInvoiceFile extends RpcRequest
{
    protected string $apiMethod = 'open.funds.subsidy.open.apply.invoice.file';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
