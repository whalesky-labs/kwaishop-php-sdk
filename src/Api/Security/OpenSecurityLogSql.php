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
 * 数据库操作日志上传接口
 * 更新时间: 2021-07-21 16:04:35
 * 数据库操作日志上传接口
 */
final class OpenSecurityLogSql extends RpcRequest
{
    protected string $apiMethod = 'open.security.log.sql';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
