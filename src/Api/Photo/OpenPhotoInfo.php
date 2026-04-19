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

namespace KwaiShopSDK\Api\Photo;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 查询单一视频详情
 * 更新时间: 2022-12-16 14:04:07
 * 查询单一视频详情（商家子账号不能调用该接口）
 */
final class OpenPhotoInfo extends RpcRequest
{
    protected string $apiMethod = 'open.photo.info';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
