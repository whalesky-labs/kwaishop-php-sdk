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
 * 获取站外分销商品详情
 * 更新时间: 2023-03-09 16:41:58
 * 获取站外分销商品详情
 */
final class OpenDistributionCpsKwaimoneySelectionItemDetail extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.cps.kwaimoney.selection.item.detail';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
