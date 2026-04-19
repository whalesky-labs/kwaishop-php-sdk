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

namespace KwaiShopSDK\Api\Express;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 查询快递地址是否可达
 * 更新时间: 2022-06-08 20:19:24
 * 查询快递地址是否可达 支持的地址类型： 0、发货地址+收货地址 1、发货地址 2、收货地址
 */
final class OpenExpressReachableQuery extends RpcRequest
{
    protected string $apiMethod = 'open.express.reachable.query';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
