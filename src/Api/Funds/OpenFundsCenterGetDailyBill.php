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
 * 下载日账单（待下线）
 * 更新时间: 2024-05-21 16:09:13
 * 「待下线，请使用open.funds.financial.settled.bill.detail查询账单信息（新
 */
final class OpenFundsCenterGetDailyBill extends RpcRequest
{
    protected string $apiMethod = 'open.funds.center.get.daily.bill';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
