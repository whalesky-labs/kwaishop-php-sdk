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

namespace KwaiShopSDK\Api\MerchantMember;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 获取会员信息
 * 更新时间: 2025-12-09 20:14:28
 * 获取会员信息
 */
final class OpenMerchantMemberGetMemberInfo extends RpcRequest
{
    protected string $apiMethod = 'open.merchant.member.get.member.info';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
