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
 * 批量达人的站外推广需求列表
 * 更新时间: 2022-07-01 14:01:09
 * 批量获取达人的站外推广需求列表，两种用法： 1.queryBeginTime和queryEndTime置空，查询当前生效的需求。注意，在分页场景下每页请求对“当前”的定义不一定一致。 2.若queryBeginTime为空，则查询queryEndTime时生效的需求。若queryBeginTime不...
 */
final class OpenDistributionKwaimoneyRequirementBatchCursorList extends RpcRequest
{
    protected string $apiMethod = 'open.distribution.kwaimoney.requirement.batch.cursor.list';

    protected string $httpMethod = 'GET';

    protected string $version = '1';

    protected string $contentType = 'application/json';
}
