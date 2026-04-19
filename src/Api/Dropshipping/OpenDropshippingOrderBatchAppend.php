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

namespace KwaiShopSDK\Api\Dropshipping;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 商家批量追加代发订单
 * 更新时间: 2022-11-30 20:11:11
 * 商家基于交易主单追加代发订单，举例场景：赠品、补货、换货、其它等
 */
final class OpenDropshippingOrderBatchAppend extends RpcRequest
{
    protected string $apiMethod = 'open.dropshipping.order.batch.append';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
