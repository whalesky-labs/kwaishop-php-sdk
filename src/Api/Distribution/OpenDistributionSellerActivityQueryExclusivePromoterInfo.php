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
 * 查询专属活动达人信息
 * 更新时间: 2023-08-03 15:27:55
 * 查询专属活动达人信息
 */
final class OpenDistributionSellerActivityQueryExclusivePromoterInfo extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.seller.activity.queryExclusivePromoterInfo';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
