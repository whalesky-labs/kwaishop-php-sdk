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

namespace KwaiShopSDK\Api\Shop;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 获取带货口碑分信息
 * 更新时间: 2023-12-28 10:12:38
 * 获取带货口碑分信息，包括总分和多维度分
 */
final class OpenScoreMasterGet extends RpcRequest
{
    protected string $apiMethod = 'open.score.master.get';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
