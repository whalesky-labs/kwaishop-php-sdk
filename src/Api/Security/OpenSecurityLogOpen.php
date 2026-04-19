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

namespace KwaiShopSDK\Api\Security;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 开放场景订单日志上传接口
 * 更新时间: 2021-07-30 12:17:05
 * 开放场景订单日志上传接口
 */
final class OpenSecurityLogOpen extends RpcRequest
{
    protected string $apiMethod = 'open.security.log.open';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
