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
 * 创建视频
 * 更新时间: 2022-12-16 14:04:21
 * 创建视频
 */
final class OpenPhotoStartUpload extends RpcRequest
{
    protected string $apiMethod = 'open.photo.start.upload';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'multipart/form-data';
}
