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
 * 更新分销计划
 * 更新时间: 2025-02-25 16:29:20
 * 特殊说明： 1.开启分销计划的前提是需要该计划处在关闭的状态下，并且商品处于上架状态才可以开启； 2.普通计划、商品定向计划、店铺定向计划：开启状态下，下调佣金率次日0点生效，在23:50-24:00期间，不允许下调佣金率； 3.如果接口调用不成功，都有具体的详细的业务报错信息。
 */
final class OpenDistributionPlanUpdate extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.plan.update';

    protected string $httpMethod = 'POST';

    protected string $version = '1';

    protected string $contentType = 'application/x-www-form-urlencoded';
}
