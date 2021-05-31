## Introduction

This package for the [Laravel Framework](https://laravel.com/) will make it easy to help you block specified IP
addresses from accessing your application.

## Installation

You can install the package via composer:

``` bash
composer require getlashified/laravel-firewall
```

Add the `FirewallServiceProvider` to you `config/app.php` file.

```php
'providers' => [
    ...
    Getlashified\Firewall\FirewallServiceProvider::class,
    ...
]
```

Publish the configuration file to your configuration path:

    php artisan vendor:publish --provider="Getlashified\Firewall\FirewallServiceProvider"

If you are using Laravel you can add the middleware to your middleware providers:

```php
// app/Http/Kernel.php
/**
 * The application's global HTTP middleware stack.
 *
 * @var array
 */
protected $middleware = [
    ...
    \Getlashified\Firewall\Middleware\IpAccess::class,
];
```

## Testing

``` bash
composer test
```

## Credits

The original author for this package is [Nick Goris](https://github.com/nckg/laravel-firewall). I have forked the
project to maintain it as he stopped developing and supporting it.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.