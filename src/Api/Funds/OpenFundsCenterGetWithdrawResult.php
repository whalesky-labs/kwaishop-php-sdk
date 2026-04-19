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
 * 查询现金户提现申请结果
 * 更新时间: 2022-05-10 16:06:40
 * 查询现金户提现申请结果（支持小店余额和安心钱包提现申请结果，微信和支付宝提现结果查询时暂不支持）
 */
final class OpenFundsCenterGetWithdrawResult extends RpcRequest
{
    protected string $apiMethod = 'open.funds.center.get.withdraw.result';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
