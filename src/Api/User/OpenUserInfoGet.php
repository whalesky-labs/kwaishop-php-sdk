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

namespace KwaiShopSDK\Api\User;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 获取用户公开信息
 * 更新时间: 2022-07-28 20:47:54
 * 获取用户公开信息
 */
final class OpenUserInfoGet extends RpcRequest
{
    protected string $apiMethod = 'open.user.info.get';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
