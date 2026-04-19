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

namespace KwaiShopSDK\Api\Logistics;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 差网点分页查询
 * 更新时间: 2024-11-11 16:36:52
 * 分页查询差网点管控信息
 */
final class OpenLogisticsTroubleNetSitePageQuery extends RpcRequest
{
    protected string $apiMethod = 'open.logistics.trouble.net.site.page.query';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
