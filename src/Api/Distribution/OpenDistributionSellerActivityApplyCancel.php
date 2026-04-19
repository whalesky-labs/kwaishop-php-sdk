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
 * 商家取消招商活动报名
 * 更新时间: 2024-08-21 10:51:08
 * 商家取消招商活动报名
 */
final class OpenDistributionSellerActivityApplyCancel extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.seller.activity.apply.cancel';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
