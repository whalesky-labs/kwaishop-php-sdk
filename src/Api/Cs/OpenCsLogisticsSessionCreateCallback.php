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

namespace KwaiShopSDK\Api\Cs;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 物流会话创建回调
 * 更新时间: 2024-09-25 13:03:19
 * 物流会话创建回调
 */
final class OpenCsLogisticsSessionCreateCallback extends RpcRequest
{
    protected string $apiMethod = 'open.cs.logistics.session.create.callback';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
