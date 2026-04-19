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
 * 更新电子面单信息
 * 更新时间: 2022-05-16 21:38:29
 * 更新电子面单信息
 */
final class OpenExpressEbillUpdate extends RpcRequest
{
    protected string $apiMethod = 'open.express.ebill.update';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
