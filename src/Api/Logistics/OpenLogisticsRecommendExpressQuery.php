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
 * 订单快递推荐
 * 更新时间: 2025-12-30 14:24:19
 * 用于打单发货场景的订单快递推荐查询
 */
final class OpenLogisticsRecommendExpressQuery extends RpcRequest
{
    protected string $apiMethod = 'open.logistics.recommend.express.query';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
