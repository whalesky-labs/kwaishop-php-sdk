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
 * 新增商品预校验
 * 更新时间: 2025-06-20 17:14:48
 * 商家新增商品前，可以进行店铺与类目维度的前置发品规则预校验
 */
final class OpenItemNewPrecheck extends RpcRequest
{
    protected string $apiMethod = 'open.item.new.precheck';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
