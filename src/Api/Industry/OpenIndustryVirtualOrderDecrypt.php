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

namespace KwaiShopSDK\Api\Industry;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 批量解密虚拟订单
 * 更新时间: 2023-10-19 11:50:47
 * 仅用于解密虚拟发货订单密文数据为明文
 */
final class OpenIndustryVirtualOrderDecrypt extends RpcRequest
{
    protected string $apiMethod = 'open.industry.virtual.order.decrypt';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
