<p align="center">
  <img src="https://avatars.githubusercontent.com/u/277389313?s=200&v=4" width="128" height="128" alt="KwaiShopSDK">
</p>

<h1 align="center">KwaiShopSDK</h1>

<p align="center">
  快手电商开放平台 PHP SDK。
</p>

<p align="center">
  PHP SDK · 快手电商开放平台 · Composer 包 · API 集成
</p>

<p align="center">
  <a href="composer.json"><img src="https://img.shields.io/badge/PHP-%3E%3D8.1-777BB4?logo=php" alt="PHP Version"></a>
  <a href="LICENSE"><img src="https://img.shields.io/badge/License-MIT-green.svg" alt="License"></a>
  <a href="https://packagist.org/packages/whalesky-labs/kwaishop-php-sdk"><img src="https://img.shields.io/badge/Composer-whalesky--labs%2Fkwaishop--php--sdk-885630?logo=composer" alt="Composer"></a>
</p>

<p align="center">
  简体中文 | <a href="README.en.md">English</a>
</p>

---

> 🚀 **快手电商 PHP SDK** - 为 PHP 开发者提供完整的快手电商 API 集成解决方案

## 概述

在技术蓬勃发展的当下，快手电商开放平台的 KwaiShopSDK，本应是普惠所有开发者的得力工具，涵盖快手电商相关开放能力，从 Token 获取到请求封装、响应解释，每个环节都暗藏助力高效开发的玄机。

其本地化设计，理应为开发者开辟便捷通道，无论经验如何，都能借它在 API 调用之路上畅行无阻。可现实却令人咋舌，面对 PHP 这片高手云集、活力满满的领域，官方竟然缺失 PHP 版本的 SDK！

这简直荒谬至极。PHP 开发者们为互联网立下汗马功劳，如今却像被抛弃的孩子。看着其他语言开发者仗着官方 SDK 大步快跑，自己只能徒手在荆棘中挣扎，太不公平！好比马拉松赛场，别人装备精良、补给充足，自己却赤脚前行、无水可饮。

幸有补救性 SDK，让 PHP 开发者不至于掉队，能凭本事搭起投放管理系统，但背后是他们付出的诸多额外心血。官方这种"偏心"做法，实在该反省，给 PHP 开发者们一个交代！

## 功能特性

- 支持 PHP `8.1+`
- 支持 `FPM`
- 支持 `Swoole Coroutine`
- 内置 `Guzzle` 传输实现
- 支持 `MD5` 与 `HMAC_SHA256` 签名
- 提供统一的 `Config` 配置对象
- 提供 OAuth 能力：授权地址生成、`code` 换取 token、刷新 token、`client_credentials`
- 提供统一请求工厂与响应解析器
- 提供按文档分类组织的接口实现目录：`src/Api/*`
- 提供标准请求基座：`get()`、`post()`、`postJson()`、`upload()`
- 提供 `rawRequest()` 作为网关兜底调用能力
- 提供 PHPUnit 测试底座与本地手动调试脚本

## 使用条件

### 开发者条件

- 使用 SDK 需要首先注册成为快手电商开发者，请参考 [开发者快速入门文档](https://open.kwaixiaodian.com/zone/new/docs/dev)
- 使用 SDK 需要先拥有 API 的访问权限，所有 SDK 的使用与应用拥有的权限组相关联

## SDK 目录

```text
src/
├── Api/                    # 按官方文档分类组织的接口封装
│   ├── Comment/            # 评价 API
│   ├── Cs/                 # 客服 / 会话 API
│   ├── Distribution/       # 分销 / 招商 / CPS API
│   ├── Dropshipping/       # 代打代发 API
│   ├── Express/            # 电子面单 / 打印 API
│   ├── Funds/              # 资金 / 对账 / 提现 API
│   ├── Industry/           # 行业能力 API
│   ├── Invoice/            # 发票 API
│   ├── Item/               # 商品 API
│   ├── Live/               # 直播场景 API
│   ├── Logistics/          # 地址 / 运费模板 / 物流 API
│   ├── Member/             # 会员 API
│   ├── MerchantMember/     # 商家会员 API
│   ├── Order/              # 订单 API
│   ├── Photo/              # 图文 / 图片素材 API
│   ├── Promotion/          # 营销 API
│   ├── Refund/             # 售后 / 退款 API
│   ├── Scm/                # 供应链 / 库存 / 仓储 API
│   ├── Security/           # 安全日志 / 解密 API
│   ├── ServiceMarket/      # 服务市场 API
│   ├── Shop/               # 店铺 API
│   ├── Sms/                # 短信 API
│   ├── Tool/               # 工具类开放能力 API
│   ├── User/               # 用户 / 商家信息 API
│   └── Virtual/            # 虚拟商品 API
├── Auth/                   # OAuth 鉴权与 Token 对象
├── Client/                 # SDK 主客户端、请求基座与请求流水线
│   └── Pipeline/           # 请求构建与响应解析流水线
├── Config/                 # 配置对象
├── Exception/              # SDK 异常体系
├── Generated/              # 自动生成的客户端方法映射
├── Runtime/                # FPM / CLI / Swoole 运行时识别
├── Signing/                # MD5 / HMAC_SHA256 签名实现
├── Support/                # 通用辅助工具
└── Transport/              # HTTP 传输抽象与 Guzzle 实现
```

说明：

- `Api/*` 目录按官方文档分类组织，方便快速定位对应接口
- `Client/*` 目录提供 SDK 入口、请求抽象与请求处理流水线
- `Generated/*` 目录用于承载自动生成的客户端方法映射
- `KwaiShopClient` 当前位于 `KwaiShopSDK\Client\KwaiShopClient`
- 如果你想查看某个接口是否已封装，优先到对应分类目录中检索

## 安装

```bash
composer require whalesky-labs/kwaishop-php-sdk
```

## 快速开始

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
    echo "错误: {$e->getMessage()}";
}
```

`KwaiShopClient` 统一通过 `new KwaiShopClient($appKey, $appSecret, $signSecret, $options)` 创建。

- 第 4 个参数是关联数组形式的 `options`
- 常用选项包括：`accessToken`、`baseUrl`、`connectTimeout`、`readTimeout`、`autoDetectRuntime`、`signMethod`、`userAgent`

当前 `1.0.0` 已完成可稳定复用的 SDK 底座，并按官方文档分类提供接口封装。

## Hyperf 集成（推荐）

如果你的项目运行在 `Hyperf / Swoole Coroutine` 场景，建议在项目里封装一个初始化类，统一管理凭据和运行时选项，业务代码只拿现成客户端。

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

这样业务层只需要依赖这个工厂；如果你的 Hyperf 项目已经自行管理协程 hook 或运行时策略，可以在 `options` 中把 `autoDetectRuntime` 设为 `false`。

## 运行环境

本 SDK 以 `FPM` 与 `Swoole Coroutine` 双运行时为目标进行约束设计。

- SDK 核心对象保持无状态，不在静态变量、全局单例中存放请求上下文
- `KwaiShopClient`、`Config`、请求工厂、响应解析器都可以在多请求场景下安全复用
- 默认传输层基于 `Guzzle`
- SDK 会自动识别当前运行时；当检测到 `Swoole Coroutine` 且 hook 未开启时，默认传输层会自动尝试开启 coroutine hook
- SDK 会自动识别 `FPM / CLI / Swoole` 运行环境并调整连接复用策略：
- `FPM / CLI` 默认保持连接复用
- `Swoole / Swoole Coroutine` 默认关闭跨请求连接复用，避免长驻 worker 中复用陈旧连接
- 如果你的项目已经有自定义协程 HTTP 客户端，也可以直接注入自定义 `TransportInterface` 实现

### Swoole Coroutine 示例

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

如果你明确不希望 SDK 自动处理运行时识别，可以关闭：

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

## 认证与授权

快手电商开放平台接入时常用的核心凭据包括：

- `app_key`
- `app_secret`
- `sign_secret`

- 需商家授权的接口通常还需要 `accessToken`
- 推荐在初始化 `Config` 时传入默认 `accessToken`
- 如果是多商家场景，也可以在单次请求时通过 `setAccessToken()` 临时覆盖

SDK 当前提供的 OAuth 能力包括：

- 构建授权地址：`buildAuthorizeUrl()`
- 通过 `code` 换取 token：`getAccessToken()`
- 刷新 token：`refreshAccessToken()`
- 获取应用 token：`getClientCredentialsToken()`

以上方法通过 `$client->oauth()` 返回的 OAuth 客户端调用，例如：

```php
$oauth = $client->oauth();

$authorizeUrl = $oauth->buildAuthorizeUrl(
    'https://your-callback.test/oauth/callback',
    ['merchant_order', 'merchant_item'],
    'your-state'
);
```

如果你需要本地联调 OAuth 或功能测试，可以再结合项目中的测试脚本使用。

## 常见问题

### 1. 没有官方 PHP SDK，可以直接用于生产吗？

可以。本项目就是为 PHP 场景补齐快手电商开放平台 SDK 能力而设计，已提供签名、鉴权、请求封装、响应解析和官方接口分类封装。

### 2. SDK 会自动帮我申请接口权限吗？

不会。SDK 只负责接口调用封装，具体能否调用成功，取决于你的应用是否已经获得对应权限组，以及当前商家是否完成授权。

### 3. 所有接口都需要传 `accessToken` 吗？

不是。需商家授权的接口需要 `accessToken`，无商家授权要求的接口则按开放平台文档要求调用。推荐在初始化 `Config` 时传入默认 `accessToken`。

### 4. SDK 会主动读取项目里的 `.env` 吗？

不会。`.env.example` 和 `.env` 仅用于测试与本地联调脚本，SDK 运行时不会主动加载环境变量文件。

### 5. 如何确认某个接口是否已经封装？

优先到 `src/Api/*` 对应分类目录中检索，类名通常与官方接口名保持一致，例如 `open.shop.info.get` 对应 `OpenShopInfoGet`。

## 贡献指南

- 欢迎通过 Issue 提交 Bug 反馈、接口补充建议或文档改进建议
仓库已内置中文 Issue 表单与自动评论机器人，规则如下：

- 新建 Issue 时会先发送欢迎与分流提示
- Bug 类 Issue 信息不完整时会提醒补充 SDK 版本、PHP 版本、复现步骤与报错信息
- 命中指定 Label 时会自动回复对应说明
- 长时间无人继续跟进时会自动发送提醒评论
- Issue 关闭时会自动致谢
- 机器人不会自动关闭任何 Issue
- 提交 PR 前请先确认变更目标明确，避免一次性混入无关修改
- 新增接口时，请按官方文档分类放入对应 `src/Api/*` 目录
- 提交代码时请保持命名、目录结构和现有 SDK 风格一致
- 涉及行为变更时，请同步补充或更新测试与 README 文档
- 提交前请至少执行与本次改动相关的测试，避免提交明显不可用的变更
- 提交前请检查代码风格，必要时执行 `composer cs-check` 或 `composer cs-fix`

### 提交规范

- Commit Message 请使用规范前缀：`feat`、`fix`、`docs`、`style`、`refactor`、`test`、`chore`
- 提交标题建议使用 `type: subject` 格式，例如 `feat: add open shop info api`
- 需要触发大版本升级时，请在提交标题中使用 `type!:`，或在提交正文中写入 `BREAKING CHANGE:`
- 一次提交只处理一个明确职责，避免把接口新增、重构、文档修改混在同一个提交里
- 提交信息应直接说明本次改动结果，避免使用含糊描述，如“update”或“modify”
- 不要提交 `.env`、本地缓存文件、IDE 配置或其他与功能无关的临时文件

### Pull Request 规范

- Pull Request 标题请清楚说明本次变更主题，并尽量与主要 Commit 保持一致
- Pull Request 内容请说明变更目的、核心改动、影响范围，以及是否存在兼容性影响
- 如果 Pull Request 涉及新接口、行为调整或文档变化，请同步更新对应测试或 README 内容
- Pull Request 描述中建议说明已执行的测试范围，以及是否执行了代码风格检查
- 一个 Pull Request 只解决一类问题，避免把多个不相关需求合并提交
- 提交 Pull Request 前请先自查代码风格、命名、目录归类和基础可用性

### 发布流程

- 仓库已提供手动触发的 GitHub Release 工作流：进入 GitHub `Actions` 页面，选择 `Release` 后点击 `Run workflow`
- 请在默认分支 `main` 上执行发布；工作流不会在日常提交时自动发版
- `release_as` 建议保持默认 `auto`：`feat` 自动升级次版本，`BREAKING CHANGE:` 或 `type!:` 自动升级大版本，其余提交默认升级补丁版本
- `initial_version` 仅在仓库还没有任何 `v*` tag 时生效，默认首个版本为 `v1.0.0`
- `prerelease` 可用于标记预发布版本，`dry_run` 可先预览本次将生成的版本号而不真正创建 tag 和 Release
- `notes_en` 与 `notes_zh` 用于手动填写英文/中文 Release Notes，支持 Markdown；如果 Actions 表单不方便换行，可使用字面量 `\n`
- Release 标题固定为版本号，例如 `v1.2.3`
- Release Notes 采用双语结构：每段顶部版本号自动生成，中间正文由 `notes_en` / `notes_zh` 手动填写，末尾 `Contributors` / `贡献者` 自动生成
- `Contributors` 会自动汇总发版范围内的 PR 作者；如果没有 PR，则回退为提交作者
- 如果未填写 `notes_en` 或 `notes_zh`，工作流会回退为自动汇总的变更列表

## 运行测试

测试目录说明：

- `tests/Unit`：单元测试
- `tests/Integration`：集成测试
- `tests/Functional`：功能测试 / 本地联调脚本

运行默认测试集：

```bash
composer test
```

执行完成后会自动生成 HTML 测试报告：

```text
test-report.html
```

运行单元测试：

```bash
./vendor/bin/phpunit --testsuite unit
```

运行集成测试：

```bash
./vendor/bin/phpunit --testsuite integration
```

运行功能测试：

```bash
./vendor/bin/phpunit --testsuite functional
```

运行指定测试：

```bash
./vendor/bin/phpunit --filter OpenShopInfoGetTest
```

代码风格检查：

```bash
composer cs-check
composer cs-fix
```

说明：

- `composer test` 默认会包含集成测试
- 运行集成测试前请先在 `.env` 中配置真实的测试凭据
- `composer test` 会自动生成最新的 HTML 测试报告

## 开源协议

本项目基于 [MIT License](LICENSE) 开源。
