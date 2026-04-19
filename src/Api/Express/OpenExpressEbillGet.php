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
 * 获取电子面单号
 * 更新时间: 2023-05-29 17:35:12
 * 获取电子面单号
 */
final class OpenExpressEbillGet extends RpcRequest
{
    protected string $apiMethod = 'open.express.ebill.get';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
