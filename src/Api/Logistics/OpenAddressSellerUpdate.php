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

namespace KwaiShopSDK\Api\Logistics;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 更新商家地址
 * 更新时间: 2023-06-07 11:15:45
 * 根据地址id更新商家地址管理里的地址信息，若更新时设为默认地址，则将其它地址都设为非默认；更新时不允许将默认地址设为非默认地址。
 */
final class OpenAddressSellerUpdate extends RpcRequest
{
    protected string $apiMethod = 'open.address.seller.update';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
