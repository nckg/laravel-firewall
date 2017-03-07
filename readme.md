# HTML minifier
[![Build Status](https://travis-ci.org/nckg/laravel-firewall.svg?branch=master)](https://travis-ci.org/nckg/laravel-firewall) [![Packagist](https://img.shields.io/packagist/v/nckg/laravel-firewall.svg?maxAge=2592000?style=flat-square)](https://github.com/nckg/laravel-firewall) [![Packagist](https://img.shields.io/packagist/dt/nckg/laravel-firewall.svg?maxAge=2592000?style=flat-square)](https://github.com/nckg/laravel-firewall)

## Introduction

Very simple package to allow access to your Laravel application by IP.

## Installation

You can install the package via composer:

``` bash
composer require nckg/laravel-firewall
```
If you are using Laravel you can add the middleware to your middleware providers

```php
// app/Http/Kernel.php
/**
 * The application's global HTTP middleware stack.
 *
 * @var array
 */
protected $middleware = [
    ...
    \Nckg\Firewall\Middleware\IpAccess.php::class,
];
```

## Testing

``` bash
composer test
```

## License

The MIT License (MIT).
