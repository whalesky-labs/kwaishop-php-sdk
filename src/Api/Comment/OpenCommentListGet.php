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
 * 查询评价列表
 * 更新时间: 2025-04-15 15:21:28
 * 查询当前商家的评价列表
 */
final class OpenCommentListGet extends RpcRequest
{
    protected string $apiMethod = 'open.comment.list.get';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
