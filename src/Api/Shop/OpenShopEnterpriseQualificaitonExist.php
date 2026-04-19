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

namespace KwaiShopSDK\Api\Shop;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 校验店铺资质
 * 更新时间: 2023-07-14 11:37:28
 * 1.用于校验店铺社会信用码是否存在并且和授权商家一致
 * 2.仅用于校验商家和社会信用码资质在平台是否经过验证，店铺经营状态请使用open.shop.info.get（获取店铺信息API）
 */
final class OpenShopEnterpriseQualificaitonExist extends RpcRequest
{
    protected string $apiMethod = 'open.shop.enterprise.qualificaiton.exist';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
