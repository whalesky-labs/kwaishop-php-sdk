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
 * 代发用户查询身份类型
 * 更新时间: 2022-12-14 21:10:28
 * 代发用户查询身份类型，身份类型包括： 0.未知身份； 1.商家； 2.厂家
 */
final class OpenDropshippingRoleQuery extends RpcRequest
{
    protected string $apiMethod = 'open.dropshipping.role.query';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
