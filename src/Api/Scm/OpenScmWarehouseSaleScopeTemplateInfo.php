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

namespace KwaiShopSDK\Api\Scm;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 查询仓库覆盖范围
 * 更新时间: 2022-09-20 17:41:17
 * 根据外部编码查询仓库覆盖范围
 */
final class OpenScmWarehouseSaleScopeTemplateInfo extends RpcRequest
{
    protected string $apiMethod = 'open.scm.warehouse.saleScopeTemplate.info';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
