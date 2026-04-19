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
 * 二级团长审核一级团长对某商品取消推广
 * 更新时间: 2024-08-21 10:52:00
 * 二级团长审核一级团长对某商品取消推广的申请
 */
final class OpenDistributionSecondActionHandleCooperation extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.second.action.handle.cooperation';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
