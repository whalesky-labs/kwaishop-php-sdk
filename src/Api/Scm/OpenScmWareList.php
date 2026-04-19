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
 * 查询货品列表
 * 更新时间: 2022-09-21 10:39:18
 * 查询货品列表
 */
final class OpenScmWareList extends RpcRequest
{
    protected string $apiMethod = 'open.scm.ware.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
