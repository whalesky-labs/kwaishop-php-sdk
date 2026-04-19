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

namespace KwaiShopSDK\Api\Item;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 同一尺码模板类型下的尺码模板列表获取
 * 更新时间: 2025-09-01 19:43:15
 * 同一尺码模板类型下的尺码模板列表获取
 */
final class OpenItemSizeChartTemplateListGet extends RpcRequest
{
    protected string $apiMethod = 'open.item.size.chart.template.list.get';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
