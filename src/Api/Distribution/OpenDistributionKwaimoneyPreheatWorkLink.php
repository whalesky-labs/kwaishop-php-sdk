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
 * 获取推广需求的预热作品链接信息
 * 更新时间: 2022-01-04 11:28:28
 * 获取推广需求的预热作品链接信息
 */
final class OpenDistributionKwaimoneyPreheatWorkLink extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.kwaimoney.preheat.work.link';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
