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
 * 团长招商活动商品分享链接生成
 * 更新时间: 2025-08-06 14:25:26
 * 团长普通/专属招商活动一级团商品选品中心分享链接
 */
final class OpenDistributionActivityItemShareCreate extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.activity.item.share.create';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
