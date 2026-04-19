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
 * 分销达人推广订单评论（批量）
 * 更新时间: 2021-12-30 15:34:35
 * 分销达人推广订单评论（批量）
 */
final class OpenDistributionCpsDistributorOrderCommentList extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.cps.distributor.order.comment.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
