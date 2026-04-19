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

namespace KwaiShopSDK\Tests\Integration\Api\Shop;

use KwaiShopSDK\Exception\BusinessException;
use KwaiShopSDK\Exception\ValidationException;
use KwaiShopSDK\Client\KwaiShopClient;
use KwaiShopSDK\Tests\Fixtures\TestConfigFactory;
use PHPUnit\Framework\TestCase;

final class OpenScoreMasterGetIntegrationTest extends TestCase
{
    /** Execute the real API call and persist the response artifact for inspection. */
    public function testExecutePrintsRealApiResponse(): void
    {
        if (!TestConfigFactory::hasIntegrationCredentials()) {
            self::markTestSkipped(
                'Missing required integration envs: KWAISHOP_TEST_APP_KEY, KWAISHOP_TEST_APP_SECRET, '
                . 'KWAISHOP_TEST_SIGN_SECRET, KWAISHOP_TEST_ACCESS_TOKEN'
            );
        }

        $client = new KwaiShopClient(
            TestConfigFactory::appKey(),
            TestConfigFactory::appSecret(),
            TestConfigFactory::signSecret(),
            TestConfigFactory::clientOptions(TestConfigFactory::accessToken()),
        );

        try {
            $response = $client
                ->OpenScoreMasterGet()
                ->setParams([])
                ->send();

            $body = json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR);
            $artifact = $response;
        } catch (BusinessException $exception) {
            $body = $exception->rawResponseBody()
                ?? json_encode($exception->payload(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR);
            $artifact = $this->decodeArtifactBody($body);
        } catch (ValidationException $exception) {
            if (!str_contains($exception->getMessage(), 'Failed to decode JSON response.')) {
                throw $exception;
            }

            $body = $exception->rawResponseBody() ?? $exception->getMessage();
            $artifact = $this->decodeArtifactBody($body);
        }

        $this->emitApiResponse($body);
        TestConfigFactory::writeJsonArtifact('open-score-master-get-integration', $artifact);

        self::assertNotSame('', trim($body));
    }

    /**
     * Decode an artifact body to structured data when possible.
     *
     * @return array<string, mixed>
     */
    private function decodeArtifactBody(string $body): array
    {
        $decoded = json_decode($body, true);

        if (is_array($decoded)) {
            return $decoded;
        }

        return [
            'response_body' => $body,
        ];
    }

    /** Emit the captured API response to the active test output channel. */
    private function emitApiResponse(string $responseBody): void
    {
        $content = "OpenScoreMasterGet API Response\n" . $responseBody . PHP_EOL;

        if ($this->isTeamCityMode()) {
            fwrite(
                STDOUT,
                sprintf(
                    "##teamcity[testStdOut name='%s' out='%s']\n",
                    $this->escapeTeamCity('testExecutePrintsRealApiResponse'),
                    $this->escapeTeamCity($content)
                )
            );

            return;
        }

        fwrite(STDOUT, $content);
    }

    /** Detect whether the current PHPUnit run is using TeamCity output mode. */
    private function isTeamCityMode(): bool
    {
        return in_array('--teamcity', $_SERVER['argv'] ?? [], true);
    }

    /** Escape a string for safe TeamCity service-message output. */
    private function escapeTeamCity(string $value): string
    {
        return strtr($value, [
            '|' => '||',
            "'" => "|'",
            "\n" => '|n',
            "\r" => '|r',
            '[' => '|[',
            ']' => '|]',
        ]);
    }
}
