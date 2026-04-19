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
 * 获取选品库页
 * 更新时间: 2022-06-30 11:52:57
 * 获取选品库页：生成的链接 需在登录状态下才能直接打开（或者生成二维码的方式，用户用快手app 扫描进去）
 */
final class OpenDistributionItemSelectionAddUrl extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.item.selection.add.url';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
