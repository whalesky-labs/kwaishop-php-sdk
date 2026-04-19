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

namespace KwaiShopSDK\Api\Item;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 获取商品资质采集配置
 * 更新时间: 2025-06-20 17:21:16
 * 根据当前叶子类目ID获取当前类目是否需要采集相关资质以及资质配置信息
 */
final class OpenItemQualificationCollectionConfig extends RpcRequest
{
    protected string $apiMethod = 'open.item.qualification.collection.config';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
