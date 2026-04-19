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

namespace KwaiShopSDK\Api\Dropshipping;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 商家获取商家与厂家代发关系列表
 * 更新时间: 2022-11-30 20:09:47
 * 【商家端】商家主动拉取其与厂家的所有绑定关系数据（包括申请中、已解绑等）
 */
final class OpenDropshippingRelationList extends RpcRequest
{
    protected string $apiMethod = 'open.dropshipping.relation.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
