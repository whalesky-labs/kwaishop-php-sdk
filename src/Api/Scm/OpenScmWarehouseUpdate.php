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

namespace KwaiShopSDK\Api\Scm;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 更新仓库
 * 更新时间: 2022-09-20 17:40:53
 * 根据仓库外部编码更新仓库
 */
final class OpenScmWarehouseUpdate extends RpcRequest
{
    protected string $apiMethod = 'open.scm.warehouse.update';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
