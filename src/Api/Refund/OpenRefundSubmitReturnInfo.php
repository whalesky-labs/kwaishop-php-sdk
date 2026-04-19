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

namespace KwaiShopSDK\Api\Refund;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 商家代客填写退货单号
 * 更新时间: 2023-08-10 16:51:59
 * 商家代客填写退货单号
 */
final class OpenRefundSubmitReturnInfo extends RpcRequest
{
    protected string $apiMethod = 'open.refund.submit.returnInfo';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
