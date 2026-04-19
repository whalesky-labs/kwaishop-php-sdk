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
Kuaishou OAuth flow helper

Usage:
  php tests/Functional/oauth_flow.php authorize [--app-type=self|service-market] [redirect_uri] <scope_csv> [state]
  php tests/Functional/oauth_flow.php exchange <code>
  php tests/Functional/oauth_flow.php refresh <refresh_token>
  php tests/Functional/oauth_flow.php client-token

Examples:
  php tests/Functional/oauth_flow.php authorize --app-type=self https://example.com/callback merchant_order,merchant_item local-test
  php tests/Functional/oauth_flow.php authorize --app-type=self merchant_order,merchant_item local-test
  php tests/Functional/oauth_flow.php authorize --app-type=service-market merchant_order,merchant_item local-test
  php tests/Functional/oauth_flow.php exchange YOUR_CODE
  php tests/Functional/oauth_flow.php refresh YOUR_REFRESH_TOKEN
  php tests/Functional/oauth_flow.php client-token
TEXT;

$command = $argv[1] ?? null;

if ($command === null) {
    fwrite(STDOUT, $usage . PHP_EOL);
    exit(1);
}

$client = new KwaiShopClient(
    TestConfigFactory::appKey(),
    TestConfigFactory::appSecret(),
    TestConfigFactory::signSecret(),
    TestConfigFactory::clientOptions()
);
$oauth = $client->oauth();

try {
    switch ($command) {
        case 'authorize':
            $redirectUri = TestConfigFactory::redirectUri();
            $appType = 'self';
            $scopeCsv = null;
            $state = null;
            $arguments = array_slice($argv, 2);

            if (($arguments[0] ?? null) !== null && str_starts_with((string) $arguments[0], '--app-type=')) {
                $appType = substr((string) array_shift($arguments), strlen('--app-type='));
            }

            if (!in_array($appType, ['self', 'service-market'], true)) {
                throw new InvalidArgumentException('authorize supports --app-type=self or --app-type=service-market.');
            }

            if (($arguments[0] ?? null) !== null && str_contains((string) $arguments[0], '://')) {
                $redirectUri = (string) array_shift($arguments);
                $scopeCsv = $arguments[0] ?? null;
                $state = $arguments[1] ?? null;
            } else {
                $scopeCsv = $arguments[0] ?? null;
                $state = $arguments[1] ?? null;
            }

            if ($redirectUri === null || $scopeCsv === null) {
                throw new InvalidArgumentException(
                    'authorize requires [--app-type=...] [redirect_uri] <scope_csv> [state], or KWAISHOP_TEST_REDIRECT_URI in .env.'
                );
            }

            $scopes = array_values(array_filter(array_map('trim', explode(',', $scopeCsv))));
            $url = $oauth->buildAuthorizeUrl($redirectUri, $scopes, $state);

            fwrite(STDOUT, "App Type: {$appType}\n");

            if ($appType === 'self') {
                fwrite(STDOUT, "Notes: self app flow requires the user to be added in 授权管理 -> 测试用户 / 授权用户 before opening the URL.\n");
            } else {
                fwrite(STDOUT, "Notes: service-market flow requires the app to be linked to a service and authorized through service-market ordering/usage.\n");
            }

            fwrite(STDOUT, "Authorize URL:\n{$url}\n");
            break;

        case 'exchange':
            $code = $argv[2] ?? null;
            if ($code === null) {
                throw new InvalidArgumentException('exchange requires <code>.');
            }

            $token = $oauth->getAccessToken($code);
            fwrite(STDOUT, json_encode($token->raw(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . PHP_EOL);
            break;

        case 'refresh':
            $refreshToken = $argv[2] ?? TestConfigFactory::refreshToken();
            if ($refreshToken === null) {
                throw new InvalidArgumentException('refresh requires <refresh_token> or KWAISHOP_TEST_REFRESH_TOKEN in .env.');
            }

            $token = $oauth->refreshAccessToken($refreshToken);
            fwrite(STDOUT, json_encode($token->raw(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . PHP_EOL);
            break;

        case 'client-token':
            $token = $oauth->getClientCredentialsToken();
            fwrite(STDOUT, json_encode($token->raw(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . PHP_EOL);
            break;

        default:
            throw new InvalidArgumentException(sprintf('Unknown command "%s".', $command));
    }
} catch (Throwable $throwable) {
    fwrite(STDERR, sprintf("[%s] %s\n", $throwable::class, $throwable->getMessage()));
    exit(1);
}
