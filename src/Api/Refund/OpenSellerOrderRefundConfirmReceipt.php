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
 * 商家确认收货
 * 更新时间: 2023-08-16 15:47:59
 * 仅适用于[退货退款@red]售后单 1.仅支持售后单类型为退货退款调用，此API会确认收货并直接给买家退款 2.仅支持在退款单状态为“22平台介入-已确认退货退款”“30商品回寄信息待买家更新”“40商品回寄信息待卖家确认”时调用此API 3.当售后单详情的returnFreightInfo没有值时...
 */
final class OpenSellerOrderRefundConfirmReceipt extends RpcRequest
{
    protected string $apiMethod = 'open.seller.order.refund.confirm.receipt';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
