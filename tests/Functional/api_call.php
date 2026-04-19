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

require_once dirname(__DIR__) . '/bootstrap.php';

use KwaiShopSDK\Client\KwaiShopClient;
use KwaiShopSDK\Tests\Fixtures\TestConfigFactory;

$usage = <<<'TEXT'
Kuaishou Open API manual caller

Usage:
  php tests/Functional/api_call.php call <method> <params_json> [access_token] [version]

Examples:
  php tests/Functional/api_call.php call open.shop.info.get '{}'
  php tests/Functional/api_call.php call open.seller.order.list '{"pageSize":20,"pageNum":1}' YOUR_ACCESS_TOKEN
  php tests/Functional/api_call.php call open.item.list '{"pageSize":20,"pageNum":1}' YOUR_ACCESS_TOKEN 1

Notes:
  - If [access_token] is omitted, the script uses KWAISHOP_TEST_ACCESS_TOKEN from .env.
  - Leave [access_token] empty only for APIs that do not require user authorization.
TEXT;

$command = $argv[1] ?? null;
if ($command !== 'call') {
    fwrite(STDOUT, $usage . PHP_EOL);
    exit(1);
}

$method = $argv[2] ?? null;
$paramsJson = $argv[3] ?? null;
$accessToken = $argv[4] ?? TestConfigFactory::accessToken();
$version = $argv[5] ?? '1';

if ($method === null || $paramsJson === null) {
    fwrite(STDERR, "[InvalidArgumentException] call requires <method> and <params_json>\n");
    exit(1);
}

try {
    $params = json_decode($paramsJson, true, 512, JSON_THROW_ON_ERROR);
    if (!is_array($params)) {
        throw new InvalidArgumentException('params_json must decode to an object/array.');
    }

    $client = new KwaiShopClient(
        TestConfigFactory::appKey(),
        TestConfigFactory::appSecret(),
        TestConfigFactory::signSecret(),
        TestConfigFactory::clientOptions()
    );
    $response = $client->rawRequest($method, $params, $accessToken, $version);

    fwrite(STDOUT, json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . PHP_EOL);
} catch (Throwable $throwable) {
    fwrite(STDERR, sprintf("[%s] %s\n", $throwable::class, $throwable->getMessage()));
    exit(1);
}
