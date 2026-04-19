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
 * 商家同意退款
 * 更新时间: 2022-05-10 20:17:14
 * [open.seller.order.refund.returngoods.approve(商家同意退货API)@https
 */
final class OpenSellerOrderRefundApprove extends RpcRequest
{
    protected string $apiMethod = 'open.seller.order.refund.approve';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
