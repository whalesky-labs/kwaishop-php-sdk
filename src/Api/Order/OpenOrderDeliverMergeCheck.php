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

namespace KwaiShopSDK\Api\Order;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 订单合并发货检查
 * 更新时间: 2025-08-14 10:56:03
 * open_address_id 判断：一致的订单可直接合单。若不一致，则可通过 open
 */
final class OpenOrderDeliverMergeCheck extends RpcRequest
{
    protected string $apiMethod = 'open.order.deliver.merge.check';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
