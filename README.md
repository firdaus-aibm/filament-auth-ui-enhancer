# Filament Auth UI Enhancer

[![Latest Version on Packagist](https://img.shields.io/packagist/v/diogogpinto/filament-auth-ui-enhancer.svg?style=flat-square)](https://packagist.org/packages/diogogpinto/filament-auth-ui-enhancer)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/diogogpinto/filament-auth-ui-enhancer/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/diogogpinto/filament-auth-ui-enhancer/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/diogogpinto/filament-auth-ui-enhancer/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/diogogpinto/filament-auth-ui-enhancer/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/diogogpinto/filament-auth-ui-enhancer.svg?style=flat-square)](https://packagist.org/packages/diogogpinto/filament-auth-ui-enhancer)

This FilamentPHP plugin allows you to customize your login page with a split layout. It lets you display an image on the left side and the login form on the right, giving your page a modern and sleek design.

## Installation

You can install the package via composer:

```bash
composer require diogogpinto/filament-auth-ui-enhancer
```

## Usage

To start using the plugin, you need to add the plugin to your plugins array in your filament panel.

```php
use DiogoGPinto\AuthUIEnhancer\AuthUIEnhancerPlugin;

 ->plugins([
    AuthUIEnhancerPlugin::make(),
])
```

The form panel width has default value of `50%`. You can change it by adding the following method and passing the desired width.

```php
->formPanelWidth('60%')
```

### Empty Panel

You can set the empty panel background color by using the following method.

```php
->emptyPanelBackgroundColor('bg-primary-900')
```

You can also set an image to be displayed on the left side of the login form.

```php
->emptyPanelBackgroundImage('images/login.png')
```

If you would like to chance the image opacity.

```php
->emptyPanelBackgroundImageOpacity('50%')
```

You can change the login form background color by using the following method.

### Login Panel

```php
->loginPanelBackgroundColor('bg-success-500')
```

You can also change the position of the form.

```php
->formPosition('left')
````

### Mobile Form Panel

By default, the form panel will be displayed on the top of the page on mobile devices.

```php
->mobileFormPosition('bottom')
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Diogo Pinto](https://github.com/diogogpinto)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
