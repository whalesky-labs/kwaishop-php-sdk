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

namespace KwaiShopSDK\Api\Express;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 追加电子面单子单
 * 更新时间: 2022-04-01 20:43:25
 * 追加电子面单(暂时只支持顺丰)
 */
final class OpenExpressEbillAppend extends RpcRequest
{
    protected string $apiMethod = 'open.express.ebill.append';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
