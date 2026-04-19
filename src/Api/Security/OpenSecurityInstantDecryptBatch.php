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

namespace KwaiShopSDK\Api\Security;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 批量解密时效密文信息
 * 更新时间: 2022-07-19 14:02:41
 * 批量解密时效密文信息
 */
final class OpenSecurityInstantDecryptBatch extends RpcRequest
{
    protected string $apiMethod = 'open.security.instant.decrypt.batch';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
