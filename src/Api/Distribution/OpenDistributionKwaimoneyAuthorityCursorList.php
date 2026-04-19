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

namespace KwaiShopSDK\Api\Distribution;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 站外推广达人列表
 * 更新时间: 2021-12-23 11:17:12
 * 获取有权限或者曾经有权限的站外推广达人列表(游标方式)
 */
final class OpenDistributionKwaimoneyAuthorityCursorList extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.kwaimoney.authority.cursor.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
