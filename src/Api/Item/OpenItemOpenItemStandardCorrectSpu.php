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
 * 纠错标品（新）
 * 更新时间: 2025-06-20 17:18:01
 * 纠错标品
 */
final class OpenItemOpenItemStandardCorrectSpu extends RpcRequest
{
    protected string $apiMethod = 'open.item.open.item.standard.correct.spu';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
