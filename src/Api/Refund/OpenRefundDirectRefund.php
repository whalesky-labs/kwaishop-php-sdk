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

namespace KwaiShopSDK\Api\Refund;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 商家直接退款给买家
 * 更新时间: 2023-05-15 15:13:00
 * 适用于退货退款和换货场景，商家操作直接退款给消费者，无需寄回商品，因此请谨慎操作： 1.退货退款场景，待商家处理买家退货退款诉求时，可以直接退款给买家。 2.换货场景，换货单在待处理状态、商家同意换货后、商家拒绝换货后、买家申请平台介入后，都可以直接退款给买家；换货单在商家确认收货并发货后、完整的换...
 */
final class OpenRefundDirectRefund extends RpcRequest
{
    protected string $apiMethod = 'open.refund.direct.refund';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
