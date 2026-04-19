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
 * 审核虚拟订单
 * 更新时间: 2023-01-10 14:55:13
 * 商家回传订单审核结果
 */
final class OpenIndustryVirtualOrderReview extends RpcRequest
{
    protected string $apiMethod = 'open.industry.virtual.order.review';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
