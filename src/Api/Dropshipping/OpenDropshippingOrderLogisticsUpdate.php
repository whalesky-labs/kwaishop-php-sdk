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

namespace KwaiShopSDK\Api\Dropshipping;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 代发订单更新运单号
 * 更新时间: 2022-09-08 10:58:09
 * 代发订单更新运单号
 */
final class OpenDropshippingOrderLogisticsUpdate extends RpcRequest
{
    protected string $apiMethod = 'open.dropshipping.order.logistics.update';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
