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
 * 商家批量申请绑定厂家
 * 更新时间: 2022-11-30 20:09:50
 * 【商家端】商家线上申请与厂家建立代发绑定关系
 */
final class OpenDropshippingRelationMerchantBatchApply extends RpcRequest
{
    protected string $apiMethod = 'open.dropshipping.relation.merchant.batch.apply';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
