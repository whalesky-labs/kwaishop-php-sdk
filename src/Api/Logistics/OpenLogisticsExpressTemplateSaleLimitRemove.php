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

namespace KwaiShopSDK\Api\Logistics;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 一键解除全部模板限售
 * 更新时间: 2025-06-05 15:49:56
 * 一键解除全部模板限售
 */
final class OpenLogisticsExpressTemplateSaleLimitRemove extends RpcRequest
{
    protected string $apiMethod = 'open.logistics.express.template.sale.limit.remove';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
