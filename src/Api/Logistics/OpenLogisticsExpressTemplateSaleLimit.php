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
 * 查询商家所有运费模板限售信息
 * 更新时间: 2025-06-05 15:50:34
 * 查询商家所有运费模板限售信息
 */
final class OpenLogisticsExpressTemplateSaleLimit extends RpcRequest
{
    protected string $apiMethod = 'open.logistics.express.template.sale.limit';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
