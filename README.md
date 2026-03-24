# kwaishop-php-sdk

PHP SDK for Kuaishou E-commerce Open Platform.

## Current Scope

The repository currently includes the `v1.0.0` core foundation:

- configuration
- signing with `MD5` and `HMAC_SHA256`
- OAuth client
- Guzzle transport
- request factory
- response parser
- main SDK client

## Planned Usage

```php
use Kwaishop\PhpSdk\Config\Config;
use Kwaishop\PhpSdk\KwaiShopClient;

$config = new Config(
    appKey: 'your-app-key',
    appSecret: 'your-app-secret',
    signSecret: 'your-sign-secret',
);

$client = new KwaiShopClient($config);
```
