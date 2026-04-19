<p align="center">
  <img src="https://avatars.githubusercontent.com/u/277389313?s=200&v=4" width="128" height="128" alt="KwaiShopSDK">
</p>

<h1 align="center">KwaiShopSDK</h1>

<p align="center">
  PHP SDK for the Kuaishou E-commerce Open Platform.
</p>

<p align="center">
  PHP SDK &middot; Kuaishou E-commerce Open Platform &middot; Composer Package &middot; API Integration
</p>

<p align="center">
  <a href="composer.json"><img src="https://img.shields.io/badge/PHP-%3E%3D8.1-777BB4?logo=php" alt="PHP Version"></a>
  <a href="LICENSE"><img src="https://img.shields.io/badge/License-MIT-green.svg" alt="License"></a>
  <a href="https://packagist.org/packages/whalesky-labs/kwaishop-php-sdk"><img src="https://img.shields.io/badge/Composer-whalesky--labs%2Fkwaishop--php--sdk-885630?logo=composer" alt="Composer"></a>
</p>

<p align="center">
  English | <a href="README.md">简体中文</a>
</p>

---

> 🚀 **Kuaishou E-commerce PHP SDK** - A complete Kuaishou E-commerce API integration solution for PHP developers

## Overview

In an era of rapid technological growth, the KwaiShopSDK of the Kuaishou E-commerce Open Platform should have been a practical tool available to all developers. It covers Kuaishou E-commerce related open capabilities. From token acquisition to request packaging and response parsing, every step should help developers integrate efficiently.

Its localized design should have created a smoother path for developers of all experience levels, allowing them to move through API integration with far less friction. Yet the reality is surprising: in the highly active and mature PHP ecosystem, there is still no official PHP SDK.

That gap is hard to justify. PHP developers have contributed enormously to the internet, yet when developers in other languages can move faster with official SDK support, PHP teams are still left to push through the thorns by hand. It is the equivalent of running a marathon barefoot while everyone else has proper gear and full support.

Community-driven SDK work is what keeps PHP developers from falling behind, making it possible to build serious integration systems despite the extra effort required. A proper PHP SDK should not be an afterthought, and this project exists to provide the missing foundation.

## Features

- Supports PHP `8.1+`
- Supports `FPM`
- Supports `Swoole Coroutine`
- Built-in `Guzzle` transport implementation
- Supports `MD5` and `HMAC_SHA256` signing
- Unified `Config` object
- OAuth support for authorize URL building, code exchange, token refresh, and `client_credentials`
- Shared request factory and response parser
- API implementations organized by documentation category under `src/Api/*`
- Standard request primitives: `get()`, `post()`, `postJson()`, `upload()`
- Low-level `rawRequest()` fallback for gateway calls
- PHPUnit test foundation and manual debug scripts

## Usage Requirements

### Developer Requirements

- Before using the SDK, you must first register as a Kuaishou E-commerce developer. Please refer to the [developer quick start documentation](https://open.kwaixiaodian.com/zone/new/docs/dev).
- Before using the SDK, you must already have access to the target APIs. All SDK usage is tied to the permission groups granted to your application.

## SDK Structure

```text
src/
├── Api/                    # Endpoint wrappers organized by official documentation category
│   ├── Comment/            # Comment APIs
│   ├── Cs/                 # Customer service / session APIs
│   ├── Distribution/       # Distribution / investment / CPS APIs
│   ├── Dropshipping/       # Dropshipping APIs
│   ├── Express/            # E-bill / printing APIs
│   ├── Funds/              # Funds / settlement / withdrawal APIs
│   ├── Industry/           # Industry-specific APIs
│   ├── Invoice/            # Invoice APIs
│   ├── Item/               # Item APIs
│   ├── Live/               # Live-commerce APIs
│   ├── Logistics/          # Address / freight template / logistics APIs
│   ├── Member/             # Member APIs
│   ├── MerchantMember/     # Merchant member APIs
│   ├── Order/              # Order APIs
│   ├── Photo/              # Photo / media APIs
│   ├── Promotion/          # Promotion APIs
│   ├── Refund/             # Refund / after-sale APIs
│   ├── Scm/                # Supply chain / inventory / warehouse APIs
│   ├── Security/           # Security log / decrypt APIs
│   ├── ServiceMarket/      # Service market APIs
│   ├── Shop/               # Shop APIs
│   ├── Sms/                # SMS APIs
│   ├── Tool/               # Tooling capability APIs
│   ├── User/               # User / seller info APIs
│   └── Virtual/            # Virtual goods APIs
├── Auth/                   # OAuth and token objects
├── Client/                 # Main SDK client, request primitives, and request pipeline
│   └── Pipeline/           # Request building and response parsing pipeline
├── Config/                 # Configuration objects
├── Exception/              # SDK exception hierarchy
├── Generated/              # Auto-generated client method mappings
├── Runtime/                # FPM / CLI / Swoole runtime detection
├── Signing/                # MD5 / HMAC_SHA256 signing implementations
├── Support/                # Shared utility helpers
└── Transport/              # HTTP transport abstraction and Guzzle implementation
```

Notes:

- `Api/*` is organized by official documentation category, making endpoint lookup easier
- `Client/*` contains the SDK entry point, request abstractions, and request pipeline
- `Generated/*` contains auto-generated client method mappings
- `KwaiShopClient` now lives at `KwaiShopSDK\Client\KwaiShopClient`
- If you want to check whether an endpoint is already wrapped, look in the matching category directory first

## Installation

```bash
composer require whalesky-labs/kwaishop-php-sdk
```

## Quick Start

```php
<?php

declare(strict_types=1);

use KwaiShopSDK\Exception\KwaiShopException;
use KwaiShopSDK\Client\KwaiShopClient;

$client = new KwaiShopClient(
    'your-app-key',
    'your-app-secret',
    'your-sign-secret',
    [
        'accessToken' => 'your-access-token',
    ]
);

try {
    $response = $client
        ->OpenShopInfoGet()
        ->setParams([])
        ->send();

    print_r($response);
} catch (KwaiShopException $e) {
    echo "Error: {$e->getMessage()}";
}
```

`KwaiShopClient` is created through the unified entrypoint `new KwaiShopClient($appKey, $appSecret, $signSecret, $options)`.

- The fourth argument is an associative `options` array
- Common options include `accessToken`, `baseUrl`, `connectTimeout`, `readTimeout`, `autoDetectRuntime`, `signMethod`, and `userAgent`

Version `1.0.0` already includes the reusable SDK foundation and endpoint wrappers organized by official documentation category.

## Hyperf Integration (Recommended)

If your project runs on `Hyperf / Swoole Coroutine`, a practical approach is to wrap client initialization in one factory so credentials and runtime options stay centralized and your application code only consumes ready-made clients.

```php
namespace App\Support;

use Hyperf\Contract\ConfigInterface;
use KwaiShopSDK\Client\KwaiShopClient;

final class KwaiShopClientFactory
{
    public function __construct(
        private readonly ConfigInterface $config,
    ) {
    }

    public function make(?string $accessToken = null): KwaiShopClient
    {
        $config = $this->config->get('kwaishop', []);
        $options = is_array($config['options'] ?? null) ? $config['options'] : [];

        $token = $accessToken ?? ($config['access_token'] ?? null);
        if (is_string($token) && $token !== '') {
            $options['accessToken'] = $token;
        }

        return new KwaiShopClient(
            (string) ($config['app_key'] ?? ''),
            ($config['app_secret'] ?? null) !== null ? (string) $config['app_secret'] : null,
            (string) ($config['sign_secret'] ?? ''),
            $options
        );
    }
}
```

Your application layer can then depend on this factory. If your Hyperf project already manages coroutine hooks or runtime policy on its own, set `autoDetectRuntime` to `false` inside `options`.

## Runtime Compatibility

This SDK is designed with both `FPM` and `Swoole Coroutine` runtimes in mind.

- Core SDK objects remain stateless and do not store request context in static variables or global singletons
- `KwaiShopClient`, `Config`, the request factory, and the response parser are safe to reuse across concurrent requests
- The default transport uses `Guzzle`
- The SDK auto-detects the current runtime; when it detects `Swoole Coroutine` and hooks are not enabled yet, the default transport will try to enable coroutine hooks automatically
- The SDK auto-detects `FPM / CLI / Swoole` and adjusts connection reuse strategy automatically:
- `FPM / CLI` keep connection reuse enabled by default
- `Swoole / Swoole Coroutine` disable cross-request connection reuse by default to avoid stale reused connections in long-lived workers
- If your project already has a coroutine-native HTTP client, you can inject a custom `TransportInterface` implementation directly

### Swoole Coroutine Example

```php
use KwaiShopSDK\Client\KwaiShopClient;
use Swoole\Runtime;

Runtime::enableCoroutine(true);

$client = new KwaiShopClient(
    'your-app-key',
    'your-app-secret',
    'your-sign-secret',
);
```

If you explicitly do not want the SDK to adapt the runtime automatically, you can disable it:

```php
use KwaiShopSDK\Client\KwaiShopClient;

$client = new KwaiShopClient(
    'your-app-key',
    'your-app-secret',
    'your-sign-secret',
    [
        'autoDetectRuntime' => false,
    ]
);
```

## Authentication

Typical platform credentials include:

- `app_key`
- `app_secret`
- `sign_secret`

- Merchant-authorized endpoints usually also require an `accessToken`
- The recommended approach is to configure a default `accessToken` when initializing `Config`
- In multi-merchant scenarios, you can override the token per request with `setAccessToken()`

The SDK currently provides these OAuth capabilities:

- Build authorize URLs with `buildAuthorizeUrl()`
- Exchange `code` for token with `getAccessToken()`
- Refresh tokens with `refreshAccessToken()`
- Get application tokens with `getClientCredentialsToken()`

These methods are called through the OAuth helper returned by `$client->oauth()`, for example:

```php
$oauth = $client->oauth();

$authorizeUrl = $oauth->buildAuthorizeUrl(
    'https://your-callback.test/oauth/callback',
    ['merchant_order', 'merchant_item'],
    'your-state'
);
```

If you need local OAuth verification or functional debugging, you can still combine these capabilities with the repository test scripts separately.

## FAQ

### 1. There is no official PHP SDK. Can this be used in production?

Yes. This project exists to fill the PHP SDK gap for the Kuaishou E-commerce Open Platform, and already provides signing, authentication, request packaging, response parsing, and endpoint wrappers organized by official documentation categories.

### 2. Will the SDK apply for API permissions automatically?

No. The SDK only wraps the API calls. Whether a request can succeed depends on whether your application has the required permission groups and whether the merchant has completed authorization.

### 3. Do all endpoints require an `accessToken`?

No. Merchant-authorized endpoints require an `accessToken`, while endpoints without merchant authorization should be called according to the official platform documentation. The recommended approach is to configure a default `accessToken` in `Config`.

### 4. Does the SDK read `.env` automatically?

No. `.env.example` and `.env` are only used for tests and local debugging scripts. The SDK runtime does not load environment variable files automatically.

### 5. How can I check whether an endpoint has already been wrapped?

Start by checking the matching category under `src/Api/*`. Class names usually stay aligned with the official endpoint name, for example `open.shop.info.get` maps to `OpenShopInfoGet`.

## Contribution Guide

- Issues are welcome for bug reports, missing endpoint requests, and documentation improvements
The repository includes Chinese issue forms and automated issue comments with the following behavior:

- New issues receive a welcome and triage message automatically
- Bug-like issues with incomplete details receive a reminder to add SDK version, PHP version, reproduction steps, and error output
- Applying configured labels triggers an automatic reply
- Long-inactive issues receive follow-up comments automatically
- Closed issues receive a thank-you comment automatically
- The bot does not close issues automatically
- Before opening a PR, keep the change scope clear and avoid mixing unrelated edits
- When adding a new endpoint, place it under the matching official documentation category in `src/Api/*`
- Keep naming, directory structure, and SDK style consistent with the existing project
- If your change affects behavior, update the related tests and README documentation together
- Before submitting, run at least the tests related to your change to avoid shipping obviously broken updates
- Check code style before submitting, and run `composer cs-check` or `composer cs-fix` when needed

### Commit Convention

- Use a conventional commit prefix in the commit message: `feat`, `fix`, `docs`, `style`, `refactor`, `test`, or `chore`
- The title should preferably follow the `type: subject` format, for example `feat: add open shop info api`
- To trigger a major release, use `type!:` in the commit title or add `BREAKING CHANGE:` to the commit body
- Keep each commit focused on one clear responsibility instead of mixing endpoint additions, refactors, and documentation changes together
- Commit messages should describe the actual outcome of the change and should avoid vague descriptions such as `update` or `modify`
- Do not commit `.env`, local cache files, IDE settings, or other temporary files unrelated to the SDK itself

### Pull Request Convention

- The Pull Request title should clearly describe the change and should stay aligned with the main commit whenever possible
- The Pull Request description should explain the purpose, key changes, affected scope, and whether there is any compatibility impact
- If the Pull Request includes new endpoints, behavior changes, or documentation updates, update the related tests or README content together
- The Pull Request description should ideally mention what tests were run and whether code style checks were performed
- Keep one Pull Request focused on one class of change instead of merging unrelated requirements together
- Before opening a Pull Request, do a basic self-check on code style, naming, directory placement, and general usability

### Release Flow

- The repository now provides a manual GitHub Release workflow: open GitHub `Actions`, choose `Release`, and click `Run workflow`
- Run releases from the default branch `main`; normal commits do not publish a release automatically
- Keep `release_as` on the default `auto` in most cases: `feat` bumps the minor version, `BREAKING CHANGE:` or `type!:` bumps the major version, and all other commits fall back to a patch release
- `initial_version` is only used when the repository has no `v*` tag yet, and the default first release is `v1.0.0`
- Use `prerelease` to mark preview builds, and `dry_run` to preview the computed version without creating a tag or GitHub Release
- Release notes are loaded from `.github/release-notes.md` by default, and you can override the path with `notes_file`
- The Release title is always the resolved version number, for example `v1.2.3`
- The Release Notes now use a Chinese-only layout: the version heading is generated automatically, the body comes from the release notes file, and the trailing `贡献者` section is generated automatically
- `Contributors` are collected automatically from PR authors in the release range, or from commit authors when no PRs are found

## Run Tests

Test directories:

- `tests/Unit`: unit tests
- `tests/Integration`: integration tests
- `tests/Functional`: functional tests / local debugging scripts

Run the default suite:

```bash
composer test
```

After the run completes, an HTML test report is generated automatically at:

```text
test-report.html
```

Run unit tests:

```bash
./vendor/bin/phpunit --testsuite unit
```

Run integration tests:

```bash
./vendor/bin/phpunit --testsuite integration
```

Run functional tests:

```bash
./vendor/bin/phpunit --testsuite functional
```

Run a specific test:

```bash
./vendor/bin/phpunit --filter OpenShopInfoGetTest
```

Code style checks:

```bash
composer cs-check
composer cs-fix
```

Notes:

- `composer test` includes integration tests by default
- Configure real test credentials in `.env` before running integration tests
- `composer test` automatically generates the latest HTML test report

## License

This project is released under the [MIT License](LICENSE).
