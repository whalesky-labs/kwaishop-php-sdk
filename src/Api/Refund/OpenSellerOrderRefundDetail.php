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

namespace KwaiShopSDK\Api\Refund;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 获取售后单详情
 * 更新时间: 2024-10-27 17:45:05
 * 获取售后单详情
 */
final class OpenSellerOrderRefundDetail extends RpcRequest
{
    protected string $apiMethod = 'open.seller.order.refund.detail';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
