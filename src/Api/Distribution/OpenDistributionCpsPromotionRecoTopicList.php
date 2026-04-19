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
 * 获取推荐专题列表
 * 更新时间: 2021-12-28 11:16:48
 * 平台通过商品近期表现，多维度全方面评估后适宜不同属性模块的推荐商品
 */
final class OpenDistributionCpsPromotionRecoTopicList extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.cps.promotion.reco.topic.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
