<p align="center">
    <h1 align="center">EasyDingTalk</h1>
</p>

<p align="center">
    <a href="https://travis-ci.org/mingyoung/dingtalk"><img src="https://travis-ci.org/mingyoung/dingtalk.svg" alt="Build Status"></a>
    <a href="https://scrutinizer-ci.com/g/mingyoung/dingtalk/?branch=master"><img src="https://scrutinizer-ci.com/g/mingyoung/dingtalk/badges/quality-score.png?b=master" alt="Scrutinizer Code Quality"></a>
    <a href="https://packagist.org/packages/mingyoung/dingtalk"><img src="https://poser.pugx.org/mingyoung/dingtalk/v/stable.svg" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/mingyoung/dingtalk"><img src="https://poser.pugx.org/mingyoung/dingtalk/d/total.svg" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/mingyoung/dingtalk"><img src="https://poser.pugx.org/mingyoung/dingtalk/license.svg" alt="License"></a>
</p>

## 介绍

EasyDingTalk 封装了钉钉身份验证、通讯录管理、消息通知、审批、群机器人、业务事件回调管理等服务端接口，让开发者可以使用简单的配置，提供简洁的 API 以供方便快速地调用钉钉接口。

由于项目需求，找了好几个第三方包，维护基本都处于停滞状态，好多接口已不能使用，故fork了此库

forked from [https://github.com/jerminegao/dingtalk](jerminegao/dingtalk)

```此库目前为自用版本，如需使用，请谨慎选择```

```此库目前为自用版本，如需使用，请谨慎选择```
```此库目前为自用版本，如需使用，请谨慎选择```
```此库目前为自用版本，如需使用，请谨慎选择```
## 环境要求

- PHP 7.0+
- [Composer](https://getcomposer.org/)

## 安装

```bash
composer require mizhenning/dingtalk
```

## 使用

```php
use EasyDingTalk\Application;

$config = [
    'corp_id' => 'dingd3ir8195906jfo93',

    'app_key' => 'dingwu33fo1fjc0fszad',
    'app_secret' => 'RsuMFgEIY3jg5UMidkvwpzEobWjf9Fcu3oLqLyCUIgzULm54WcV7j9fi3fJlUshk',
];

$app = new Application($config);
```

## 文档

[https://easydingtalk.github.io/start.html](https://easydingtalk.github.io/start.html)


## License

MIT
