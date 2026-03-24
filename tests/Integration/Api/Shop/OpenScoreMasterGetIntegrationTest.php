<?php

declare(strict_types=1);

/**
 * This file is part of KwaiShopSDK.
 *
 * @link     https://github.com/westng/kwaishop-php-sdk
 * @document https://github.com/westng/kwaishop-php-sdk
 * @contact  westng
 * @license  https://github.com/westng/kwaishop-php-sdk/blob/main/LICENSE
 */

namespace KwaiShopSDK\Tests\Integration\Api\Shop;

use PHPUnit\Framework\TestCase;
use KwaiShopSDK\Api\Shop\OpenScoreMasterGet;
use KwaiShopSDK\Core\Profile\Config;
use KwaiShopSDK\Exception\TransportException;
use KwaiShopSDK\KwaiShopClient;
use KwaiShopSDK\Tests\Fixtures\TestConfigFactory;

final class OpenScoreMasterGetIntegrationTest extends TestCase
{
    public function testExecutePrintsRealApiResponse(): void
    {
        $client = new KwaiShopClient(
            new Config(
                appKey: TestConfigFactory::make()->appKey(),
                appSecret: TestConfigFactory::make()->requiredAppSecret(),
                signSecret: TestConfigFactory::make()->signSecret(),
                baseUrl: TestConfigFactory::make()->baseUrl()
            )
        );

        $accessToken = TestConfigFactory::accessToken();
        if ($accessToken === null) {
            self::markTestSkipped('Missing required env: KWAISHOP_TEST_ACCESS_TOKEN');
        }

        $api = new OpenScoreMasterGet($client);
        try {
            $response = $api->execute([], $accessToken);
        } catch (TransportException $exception) {
            if (str_contains($exception->getMessage(), 'Could not resolve host')) {
                self::markTestSkipped('Network/DNS unavailable for integration test in current environment.');
            }

            throw $exception;
        }

        fwrite(STDERR, json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR) . PHP_EOL);

        self::assertSame(1, $response['result']);
        self::assertArrayHasKey('data', $response);
    }
}
