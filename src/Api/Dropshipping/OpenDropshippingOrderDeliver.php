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
 * 代发订单发货
 * 更新时间: 2024-10-31 16:03:18
 * 代发订单发货
 */
final class OpenDropshippingOrderDeliver extends RpcRequest
{
    protected string $apiMethod = 'open.dropshipping.order.deliver';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
