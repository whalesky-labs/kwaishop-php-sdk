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
 * 申请现金户提现
 * 更新时间: 2025-01-06 11:37:09
 * 申请商家现金户提现（小店余额暂不支持提现）
 */
final class OpenFundsCenterWithdrawApply extends RpcRequest
{
    protected string $apiMethod = 'open.funds.center.withdraw.apply';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
