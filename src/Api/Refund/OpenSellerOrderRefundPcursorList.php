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
 * 获取售后单列表
 * 更新时间: 2024-03-28 14:34:22
 * 查询商家售后单列表(游标方式)，可根据订单id查询关联的全量售后单列表，handlingway为售后方式，status为售后状态
 */
final class OpenSellerOrderRefundPcursorList extends RpcRequest
{
    protected string $apiMethod = 'open.seller.order.refund.pcursor.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
