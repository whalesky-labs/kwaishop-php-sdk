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

namespace KwaiShopSDK\Api\Industry;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 外部同步spu信息接口
 * 更新时间: 2024-02-25 13:20:21
 * 用于外部同步增量spu信息
 */
final class OpenIndustryTradeInSyncSpuInfo extends RpcRequest
{
    protected string $apiMethod = 'open.industry.trade.in.sync.spu.info';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
