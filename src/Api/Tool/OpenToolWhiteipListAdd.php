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

namespace KwaiShopSDK\Api\Tool;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 新增应用ip白名单
 * 更新时间: 2022-11-01 17:29:38
 * 新增应用ip白名单
 */
final class OpenToolWhiteipListAdd extends RpcRequest
{
    protected string $apiMethod = 'open.tool.whiteip.list.add';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
