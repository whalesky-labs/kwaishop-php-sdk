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
 * 批量加密订单
 * 更新时间: 2024-03-28 20:02:02
 * 批量加密订单明文信息为密文
 */
final class OpenOrderEncryptBatch extends RpcRequest
{
    protected string $apiMethod = 'open.order.encrypt.batch';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
