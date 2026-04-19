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
 * 商品取消合作后，再次报名(二级团长业务)
 * 更新时间: 2024-12-25 18:11:37
 * 商品取消合作后，再次报名，此接口只能以之前报名的费率重新报名，若要修改报名费率，请先使用修改商品报名服务费率接口修改，在使用该接口再次报名
 */
final class OpenDistributionSecondActionApplyAgainInvestmentActivity extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.second.action.apply.again.investment.activity';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
