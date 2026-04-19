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
 * 分销达人推广订单列表(游标方式)
 * 更新时间: 2025-04-29 17:20:12
 * 分销达人推广订单列表(游标方式) 24.10.15 新增上线 出参cpsOrderStatus分销订单状态＝40为已发货。若之前使用其他方案判断已发货，请尽快更新逻辑进行兼容，并更新数据，以防使用有误。
 */
final class OpenDistributionCpsDistributorOrderCursorList extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.cps.distributor.order.cursor.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
