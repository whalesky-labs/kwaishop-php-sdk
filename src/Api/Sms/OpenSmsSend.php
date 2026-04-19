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

namespace KwaiShopSDK\Api\Sms;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 发送短信
 * 更新时间: 2022-03-17 17:32:31
 * 根据用户密文手机号发送短信
 */
final class OpenSmsSend extends RpcRequest
{
    protected string $apiMethod = 'open.sms.send';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
