# Kwaishop PHP SDK

[简体中文](README.md) | [English](README.en.md)

[![PHP Version](https://img.shields.io/badge/PHP-%3E%3D8.1-777BB4?logo=php)](composer.json)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![Composer](https://img.shields.io/badge/Composer-westng%2Fkwaishop--php--sdk-885630?logo=composer)](https://packagist.org/packages/westng/kwaishop-php-sdk)

> 🚀 **快手电商 PHP SDK** - 为 PHP 开发者提供完整的快手电商 API 集成解决方案 

## 概述

在技术蓬勃发展的当下，快手电商开放平台的 Kwaishop API SDK，本应是普惠所有开发者的得力工具，涵盖快手电商相关开放能力，从 Token 获取到请求封装、响应解释，每个环节都暗藏助力高效开发的玄机。

其本地化设计，理应为开发者开辟便捷通道，无论经验如何，都能借它在 API 调用之路上畅行无阻。可现实却令人咋舌，面对 PHP 这片高手云集、活力满满的领域，官方竟然缺失 PHP 版本的 SDK！

这简直荒谬至极。PHP 开发者们为互联网立下汗马功劳，如今却像被抛弃的孩子。看着其他语言开发者仗着官方 SDK 大步快跑，自己只能徒手在荆棘中挣扎，太不公平！好比马拉松赛场，别人装备精良、补给充足，自己却赤脚前行、无水可饮。

幸有补救性 SDK，让 PHP 开发者不至于掉队，能凭本事搭起投放管理系统，但背后是他们付出的诸多额外心血。官方这种"偏心"做法，实在该反省，给 PHP 开发者们一个交代！

官方文档：
<https://open.kwaixiaodian.com/zone/new/docs/dev>

## 功能特性

- 支持 PHP `8.1+`
- 内置 `Guzzle` 传输实现
- 支持 `MD5` 与 `HMAC_SHA256` 签名
- 提供统一的 `Config` 配置对象
- 提供 OAuth 能力：授权地址生成、`code` 换取 token、刷新 token、`client_credentials`
- 提供统一请求工厂与响应解析器
- 提供资源式 API 入口：`orders()`、`items()`、`afterSales()`、`logistics()`、`shop()`
- 提供 `rawRequest()` 作为底层兜底调用能力
- 提供 PHPUnit 测试底座与本地手动调试脚本

## 安装

```bash
composer require westng/kwaishop-php-sdk
```

## 快速开始

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

当前 `1.0.0` 聚焦“可稳定复用的 SDK 底座”，资源类入口已经准备好，具体接口方法会在后续版本中逐步补齐。

## 认证与授权

快手电商开放平台当前接入的核心凭据主要包括：

- `app_key`
- `app_secret`
- `sign_secret`

如果你的接入场景涉及平台消息服务或加解密能力，本项目的测试环境模板中也预留了消息私钥相关配置位，便于本地联调。

### 构建授权地址

```php
$authorizeUrl = $client->oauth()->buildAuthorizeUrl(
    redirectUri: 'https://your-app.test/oauth/callback',
    scopes: ['merchant_order', 'merchant_item'],
    state: 'local-test',
);
```

### 通过 `code` 换取 token

```php
$token = $client->oauth()->getAccessToken('authorization-code');

$accessToken = $token->accessToken();
$refreshToken = $token->refreshToken();
```

### 刷新 token

```php
$token = $client->oauth()->refreshAccessToken('refresh-token');
```

### 获取应用 token

```php
$token = $client->oauth()->getClientCredentialsToken();
```

## 手动调试

项目提供了一套仅面向测试与本地联调的环境变量模板和命令行脚本。

### 环境变量模板

```bash
cp .env.example .env
```

说明：

- `.env.example` 只用于测试场景示例
- SDK 运行时不会主动读取 `.env`
- `tests/bootstrap.php` 会在 PHPUnit 与 `tests/manual/*` 脚本执行时加载 `.env`

### OAuth 联调脚本

```bash
php tests/manual/oauth_flow.php authorize --app-type=self https://your-callback.test/oauth/callback merchant_order,merchant_item local-test
php tests/manual/oauth_flow.php authorize --app-type=self merchant_order,merchant_item local-test
php tests/manual/oauth_flow.php authorize --app-type=service-market merchant_order,merchant_item local-test
php tests/manual/oauth_flow.php exchange YOUR_CODE
php tests/manual/oauth_flow.php refresh
php tests/manual/oauth_flow.php client-token
```

补充说明：

- 如果 `.env` 中设置了 `KWAISHOP_TEST_REDIRECT_URI`，`authorize` 可以省略回调地址参数
- `--app-type=self` 适用于自研应用
- `--app-type=service-market` 适用于服务市场应用

### 原始接口调试

```bash
php tests/manual/api_call.php call open.shop.info.get '{}'
php tests/manual/api_call.php call open.seller.order.list '{"pageSize":20,"pageNum":1}' YOUR_ACCESS_TOKEN
```

如果未显式传入 access token，脚本会回退读取 `.env` 中的 `KWAISHOP_TEST_ACCESS_TOKEN`。

## 开发状态

当前版本：`1.0.0`

已完成：

- 配置对象
- 签名能力
- OAuth 客户端
- Guzzle 传输层
- 请求工厂
- 响应解析器
- 主客户端与资源式入口
- 基础测试与手动调试脚本

后续计划：

- 逐步补齐快手电商开放平台接口封装
- 为资源类补充更细颗粒度的方法
- 增加更多集成测试与联调示例

## 开源协议

本项目基于 [MIT License](LICENSE) 开源。
