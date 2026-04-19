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
 * 查询安心钱包账务明细
 * 更新时间: 2024-09-10 16:52:24
 * 查询安心钱包账务明细 商家如果开通安心钱包，后续货款结算都会到安心钱包。 查询安心钱包账务明细包含货款结算，还有余额提现，补结算等场景。
 */
final class OpenFundsFinancialPinganBill extends RpcRequest
{
    protected string $apiMethod = 'open.funds.financial.pingan.bill';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
