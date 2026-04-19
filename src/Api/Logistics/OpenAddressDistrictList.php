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

namespace KwaiShopSDK\Api\Logistics;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 查询快手行政区划库
 * 更新时间: 2023-05-29 12:11:08
 * 查询快手行政区划库
 */
final class OpenAddressDistrictList extends RpcRequest
{
    protected string $apiMethod = 'open.address.district.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
