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

namespace KwaiShopSDK\Api\Order;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 添加订单插旗备注
 * 更新时间: 2021-12-22 10:56:13
 * 添加订单插旗和备注信息，插旗颜色无法清除，默认GREY，备注为追加逻辑，可添加空备注
 */
final class OpenSellerOrderNoteAdd extends RpcRequest
{
    protected string $apiMethod = 'open.seller.order.note.add';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
