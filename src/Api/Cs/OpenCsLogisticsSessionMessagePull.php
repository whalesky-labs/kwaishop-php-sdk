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
 * 物流会话消息拉取
 * 更新时间: 2024-09-24 17:15:07
 * 物流会话消息拉取
 */
final class OpenCsLogisticsSessionMessagePull extends RpcRequest
{
    protected string $apiMethod = 'open.cs.logistics.session.message.pull';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
