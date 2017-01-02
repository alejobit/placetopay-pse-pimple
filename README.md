# PlacetoPay PSE Pimple Service Provider

PlacetoPay PSE service provider for Pimple based project

## Installattion

To install this library, run the command below and you will get the latest version:

```bash
composer require alejobit/placetopay-pse-pimple
```

And enable it in your application:

```php
use PlacetoPay\PSE\PSEServiceProvider;

$app->register(new PSEServiceProvider(), array(
    'pse.login' => '6dd490faf9cb87a9862245da41170ff2',
    'pse.tranKey' => '024h1IlD',
));
```

This library assumes that a service provider called ``cache`` has been defined, otherwise, it must be defined as follows:

```php
// using symfony/cache as caching library
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

$app['cache'] = function () {
    return new FilesystemAdapter();
};
```
