# Kwaishop PHP SDK

[简体中文](README.md) | [English](README.en.md)

[![PHP Version](https://img.shields.io/badge/PHP-%3E%3D8.1-777BB4?logo=php)](composer.json)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![Composer](https://img.shields.io/badge/Composer-westng%2Fkwaishop--php--sdk-885630?logo=composer)](https://packagist.org/packages/westng/kwaishop-php-sdk)

> 🚀 **Kuaishou E-commerce PHP SDK** - A complete Kuaishou E-commerce API integration solution for PHP developers

## Overview

In an era of rapid technological growth, the Kwaishop API SDK of the Kuaishou E-commerce Open Platform should have been a practical tool available to all developers. It covers Kuaishou E-commerce related open capabilities. From token acquisition to request packaging and response parsing, every step should help developers integrate efficiently.

Its localized design should have created a smoother path for developers of all experience levels, allowing them to move through API integration with far less friction. Yet the reality is surprising: in the highly active and mature PHP ecosystem, there is still no official PHP SDK.

That gap is hard to justify. PHP developers have contributed enormously to the internet, yet when developers in other languages can move faster with official SDK support, PHP teams are still left to push through the thorns by hand. It is the equivalent of running a marathon barefoot while everyone else has proper gear and full support.

Community-driven SDK work is what keeps PHP developers from falling behind, making it possible to build serious integration systems despite the extra effort required. A proper PHP SDK should not be an afterthought, and this project exists to provide the missing foundation.

Official docs:
<https://open.kwaixiaodian.com/zone/new/docs/dev>

## Features

- Supports PHP `8.1+`
- Built-in `Guzzle` transport implementation
- Supports `MD5` and `HMAC_SHA256` signing
- Unified `Config` object
- OAuth support for authorize URL building, code exchange, token refresh, and `client_credentials`
- Shared request factory and response parser
- Resource entry points: `orders()`, `items()`, `afterSales()`, `logistics()`, `shop()`
- Low-level `rawRequest()` fallback for direct API calls
- PHPUnit test foundation and manual debug scripts

## Installation

```bash
composer require westng/kwaishop-php-sdk
```

## Quick Start

```php
<?php

declare(strict_types=1);

use Kwaishop\PhpSdk\Config\Config;
use Kwaishop\PhpSdk\KwaiShopClient;

$config = new Config(
    appKey: 'your-app-key',
    appSecret: 'your-app-secret',
    signSecret: 'your-sign-secret',
);

$client = new KwaiShopClient($config);

$shop = $client->rawRequest(
    method: 'open.shop.info.get',
    params: [],
    accessToken: 'your-access-token',
);
```

Version `1.0.0` focuses on the SDK foundation first. Resource entry points are ready, and concrete endpoint wrappers will be added incrementally in later releases.

## Authentication

Typical platform credentials include:

- `app_key`
- `app_secret`
- `sign_secret`

If your integration also uses the platform message service or decryption workflows, the test environment template includes a message private key placeholder for local verification.

### Build an authorize URL

```php
$authorizeUrl = $client->oauth()->buildAuthorizeUrl(
    redirectUri: 'https://your-app.test/oauth/callback',
    scopes: ['merchant_order', 'merchant_item'],
    state: 'local-test',
);
```

### Exchange code for token

```php
$token = $client->oauth()->getAccessToken('authorization-code');

$accessToken = $token->accessToken();
$refreshToken = $token->refreshToken();
```

### Refresh token

```php
$token = $client->oauth()->refreshAccessToken('refresh-token');
```

### Get client credentials token

```php
$token = $client->oauth()->getClientCredentialsToken();
```

## Manual Debug

The repository includes a test-only environment template and manual helper scripts for local debugging.

### Test env template

```bash
cp .env.example .env
```

Notes:

- `.env.example` is only a template for test scenarios
- The SDK runtime does not read `.env`
- `tests/bootstrap.php` loads `.env` for PHPUnit and `tests/manual/*` scripts

### OAuth helper

```bash
php tests/manual/oauth_flow.php authorize --app-type=self https://your-callback.test/oauth/callback merchant_order,merchant_item local-test
php tests/manual/oauth_flow.php authorize --app-type=self merchant_order,merchant_item local-test
php tests/manual/oauth_flow.php authorize --app-type=service-market merchant_order,merchant_item local-test
php tests/manual/oauth_flow.php exchange YOUR_CODE
php tests/manual/oauth_flow.php refresh
php tests/manual/oauth_flow.php client-token
```

Notes:

- If `KWAISHOP_TEST_REDIRECT_URI` is set in `.env`, `authorize` can omit the redirect URI argument
- `--app-type=self` is for self-developed apps
- `--app-type=service-market` is for service-market apps

### Raw API helper

```bash
php tests/manual/api_call.php call open.shop.info.get '{}'
php tests/manual/api_call.php call open.seller.order.list '{"pageSize":20,"pageNum":1}' YOUR_ACCESS_TOKEN
```

If the access token argument is omitted, the script falls back to `KWAISHOP_TEST_ACCESS_TOKEN` from `.env`.

## Project Status

Current version: `1.0.0`

Completed:

- Configuration object
- Signing support
- OAuth client
- Guzzle transport layer
- Request factory
- Response parser
- Main client and resource entry points
- Base tests and manual debug helpers

Planned next:

- Incrementally wrap more Kuaishou E-commerce Open Platform endpoints
- Add more granular methods on resource classes
- Expand integration-style tests and debug examples

## License

This project is released under the [MIT License](LICENSE).
