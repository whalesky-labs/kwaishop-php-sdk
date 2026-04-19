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

namespace KwaiShopSDK\Api\Virtual;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 查询电子凭证校验结果
 * 更新时间: 2022-05-25 17:06:25
 * 检查电子凭证是否有效
 */
final class OpenVirtualEticketCheckavailable extends RpcRequest
{
    protected string $apiMethod = 'open.virtual.eticket.checkavailable';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
