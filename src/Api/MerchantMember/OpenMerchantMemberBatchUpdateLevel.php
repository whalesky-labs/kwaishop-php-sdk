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
 * 更新会员等级
 * 更新时间: 2025-12-09 11:00:56
 * 更新会员等级
 */
final class OpenMerchantMemberBatchUpdateLevel extends RpcRequest
{
    protected string $apiMethod = 'open.merchant.member.batch.update.level';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
