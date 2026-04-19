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
 * 推广链接创建接口
 * 更新时间: 2021-12-30 15:33:30
 * 推广链接创建接口
 */
final class OpenDistributionCpsLinkCreate extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.cps.link.create';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
