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
 * 批量脱敏订单
 * 更新时间: 2021-10-09 19:33:21
 * 根据订单密文信息返回订单脱敏信息，用于脱敏信息展示
 */
final class OpenOrderDesensitiseBatch extends RpcRequest
{
    protected string $apiMethod = 'open.order.desensitise.batch';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
