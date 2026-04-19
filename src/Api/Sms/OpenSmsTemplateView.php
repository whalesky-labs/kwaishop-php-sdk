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
 * 查询短信模板
 * 更新时间: 2022-06-09 14:29:15
 * 查询短信模板
 */
final class OpenSmsTemplateView extends RpcRequest
{
    protected string $apiMethod = 'open.sms.template.view';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
