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
 * 回复评价
 * 更新时间: 2023-01-05 10:37:34
 * 商家回复订单的评价，当前支持文字回复 1.商家在买家评价后30天内允许回复评价，请注意追加评价前注意时间 2.商家不允许修改评价 3.商家回复评价仅支持回复首次的评价 4.“确认收货“且未评价的订单也支持评价 5.买家评价后的180天允许买家追加评价
 */
final class OpenCommentAdd extends RpcRequest
{
    protected string $apiMethod = 'open.comment.add';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
