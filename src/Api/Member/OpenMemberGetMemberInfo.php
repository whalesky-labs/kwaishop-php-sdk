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

namespace KwaiShopSDK\Api\Member;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 【会员通商家】批量获取会员信息
 * 更新时间: 2025-12-09 17:54:33
 * 【会员通商家】批量获取会员信息
 */
final class OpenMemberGetMemberInfo extends RpcRequest
{
    protected string $apiMethod = 'open.member.get.member.info';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
