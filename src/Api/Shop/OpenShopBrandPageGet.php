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
 * 获取店铺授权品牌列表
 * 更新时间: 2023-07-14 11:36:04
 * 1.获取用户对应的店铺已经授权的品牌资质，当返回状态为无效，表示该品牌资质已过期
 * 2.在店铺下找不到品牌，请确认该品牌资质是否已经审核通过，商家查询入口-品牌申报查询
 */
final class OpenShopBrandPageGet extends RpcRequest
{
    protected string $apiMethod = 'open.shop.brand.page.get';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
