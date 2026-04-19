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

namespace KwaiShopSDK\Api\Order;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 订单拆单发货
 * 更新时间: 2024-08-30 16:26:45
 * 1.支持主品订单、支持赠品订单、支持整单发、支持拆单发，可以完全兼容发货API逻辑 2.订单为"待发货"状态&&无正在执行的退款&&订单API出参disableDeliveryReasonCode和riskCode没有值时，允许操作订单拆单发货API 3.主品/赠品订单有各自的订单状态，只要发了订单...
 */
final class OpenOrderGoodsSplitDeliver extends RpcRequest
{
    protected string $apiMethod = 'open.order.goods.split.deliver';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
