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
 * 批量查询运费模板
 * 更新时间: 2024-07-16 11:46:46
 * 根据偏移量、查询结果数、是否被使用 批量查询运费模板
 */
final class OpenLogisticsExpressTemplateList extends RpcRequest
{
    protected string $apiMethod = 'open.logistics.express.template.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
