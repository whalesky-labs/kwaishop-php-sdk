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
 * 获取售后拒绝原因列表
 * 更新时间: 2022-05-10 19:22:46
 * 根据售后单ID获取仅退款和退货退款拒绝原因列表
 */
final class OpenRefundRejectReason extends RpcRequest
{
    protected string $apiMethod = 'open.refund.reject.reason';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
