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

namespace KwaiShopSDK\Api\Distribution;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 一级团长取消某商品的推广
 * 更新时间: 2024-08-14 10:50:51
 * 一级团长取消某商品的推广
 */
final class OpenDistributionSecondActionCancelCooperation extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.second.action.cancel.cooperation';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
