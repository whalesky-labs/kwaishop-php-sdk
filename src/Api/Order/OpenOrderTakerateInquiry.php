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

namespace KwaiShopSDK\Api\Order;

use KwaiShopSDK\Client\RpcRequest;

/**
 * 订单费率查询
 * 更新时间: 2023-12-28 15:59:47
 * 结算侧为开放平台提供计费试算查询服务，帮助商户通过开放平台可以在订单未发生前试查大概的TR收费情况。该试算接口查到的数据唯一等于下单时刻的TR费率，真实收取值还是按订单实际收取为准。
 */
final class OpenOrderTakerateInquiry extends RpcRequest
{
    protected string $apiMethod = 'open.order.takerate.inquiry';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
