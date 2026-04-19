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
 * 快赚客转链转化接口
 * 更新时间: 2023-06-29 10:14:47
 * 快赚客转链转化接口
 */
final class OpenDistributionCpsKwaimoneyLinkTransfer extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.cps.kwaimoney.link.transfer';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
