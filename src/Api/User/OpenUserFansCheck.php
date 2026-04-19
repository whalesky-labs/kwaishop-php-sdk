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
 * 校验用户是否为粉丝
 * 更新时间: 2023-02-02 15:44:11
 * 校验用户是否为粉丝
 */
final class OpenUserFansCheck extends RpcRequest
{
    protected string $apiMethod = 'open.user.fans.check';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
