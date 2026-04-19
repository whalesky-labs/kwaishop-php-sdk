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
 * 查询现金户
 * 更新时间: 2021-09-24 16:26:39
 * 查询商家现金户状态和余额，渠道包括小店余额、微信、支付宝和安心钱包
 */
final class OpenFundsCenterAccountInfo extends RpcRequest
{
    protected string $apiMethod = 'open.funds.center.account.info';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
