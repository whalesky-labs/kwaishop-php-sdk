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

namespace KwaiShopSDK\Api\Shop;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 获取店铺名称和类型
 * 更新时间: 2024-12-06 15:57:26
 * 获取当前用户的店铺信息，包括店铺名称和店铺类型
 */
final class OpenShopInfoGet extends RpcRequest
{
    protected string $apiMethod = 'open.shop.info.get';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
