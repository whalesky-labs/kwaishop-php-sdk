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

namespace KwaiShopSDK\Api\Comment;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 查询自评价
 * 更新时间: 2023-06-20 11:30:05
 * 根据主评价查询子评价详情
 */
final class OpenSubcommentListGet extends RpcRequest
{
    protected string $apiMethod = 'open.subcomment.list.get';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
