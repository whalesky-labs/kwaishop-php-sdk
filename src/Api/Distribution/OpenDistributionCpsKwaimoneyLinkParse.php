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
 * 解析快赚客分享口令
 * 更新时间: 2022-12-01 21:07:05
 * 解析快赚客分享口令
 */
final class OpenDistributionCpsKwaimoneyLinkParse extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.cps.kwaimoney.link.parse';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
