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

namespace KwaiShopSDK\Api\Item;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 免审编辑商品
 * 更新时间: 2026-03-12 11:11:30
 * 更改商品的库存、价格和服务承诺等信息，无需审核直接生效
 */
final class OpenItemAutopassEdit extends RpcRequest
{
    protected string $apiMethod = 'open.item.autopass.edit';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
