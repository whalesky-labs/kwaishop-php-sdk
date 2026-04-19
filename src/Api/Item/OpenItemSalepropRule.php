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
 * 商品销售属性填写规则
 * 更新时间: 2025-06-20 17:22:20
 * 商品发布和编辑时拉取销售属性填写限制
 */
final class OpenItemSalepropRule extends RpcRequest
{
    protected string $apiMethod = 'open.item.saleprop.rule';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
