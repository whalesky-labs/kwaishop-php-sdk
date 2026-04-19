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
 * 发布视频
 * 更新时间: 2022-12-16 14:03:46
 * 发布视频
 */
final class OpenPhotoPublish extends RpcRequest
{
    protected string $apiMethod = 'open.photo.publish';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
