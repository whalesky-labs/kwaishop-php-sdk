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
 * 查询与物流商的订购和使用信息
 * 更新时间: 2022-05-25 22:07:44
 * 查询授权商家和物流商的订购关系以及面单使用情况
 */
final class OpenExpressSubscribeQuery extends RpcRequest
{
    protected string $apiMethod = 'open.express.subscribe.query';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
