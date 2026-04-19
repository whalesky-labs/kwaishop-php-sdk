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

namespace KwaiShopSDK\Api\Distribution;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 获取站外分销商品列表
 * 更新时间: 2025-05-27 11:48:59
 * 获取站外分销商品列表
 */
final class OpenDistributionCpsKwaimoneySelectionItemList extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.cps.kwaimoney.selection.item.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
