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
 * 申请短信模板
 * 更新时间: 2022-07-20 13:14:25
 * 申请短信模板，营销推广类短信必须以”拒收请回复R”结尾
 */
final class OpenSmsTemplateApplyCreate extends RpcRequest
{
    protected string $apiMethod = 'open.sms.template.apply.create';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
