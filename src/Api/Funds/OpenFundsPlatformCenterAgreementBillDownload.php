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
 * 辛选年框账单下载
 * 更新时间: 2025-04-10 19:50:14
 * 辛选年框账单下载，仅用于获取下载链接
 */
final class OpenFundsPlatformCenterAgreementBillDownload extends RpcRequest
{
    protected string $apiMethod = 'open.funds.platform.center.agreement.bill.download';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
