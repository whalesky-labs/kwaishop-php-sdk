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
 * 上传商品图片
 * 更新时间: 2025-06-20 17:12:24
 * 上传商品主图或商品详情图，Content-Type必须为multipart/form-data;charset=utf-8
 */
final class OpenItemImageUpload extends RpcRequest
{
    protected string $apiMethod = 'open.item.image.upload';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'multipart/form-data';
}
