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
 * 商家批量取消分配代发订单
 * 更新时间: 2022-11-30 20:10:38
 * 商家取消已分配给厂家的代发订单
 */
final class OpenDropshippingOrderBatchAllocateCancel extends RpcRequest
{
    protected string $apiMethod = 'open.dropshipping.order.batch.allocate.cancel';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
