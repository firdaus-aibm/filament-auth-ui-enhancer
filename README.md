# Auth UI Enhancer for Filament Panels 🔥

[![Latest Version on Packagist](https://img.shields.io/packagist/v/diogogpinto/filament-auth-ui-enhancer.svg?style=flat-square)](https://packagist.org/packages/diogogpinto/filament-auth-ui-enhancer)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/diogogpinto/filament-auth-ui-enhancer/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/diogogpinto/filament-auth-ui-enhancer/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/diogogpinto/filament-auth-ui-enhancer/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/diogogpinto/filament-auth-ui-enhancer/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/diogogpinto/filament-auth-ui-enhancer.svg?style=flat-square)](https://packagist.org/packages/diogogpinto/filament-auth-ui-enhancer)

![Filament Auth UI Enhancer](/art/auth-ui-enhancer.png)

## Looking for an easy way to customize the UI of your Auth Pages in your Filament Panel?

This Filament plugin empowers you to transform your auth pages with ease, allowing you to make them truly stand out. It offers a flexible alternative to the default auth pages in the Filament Panels package.

Setting it up is a breeze, and it comes packed with a variety of customizable features—plus, there’s a lot more to come! 🔥

### Check out some examples you can create right out of the box:

![Auth UI Enhancer Examples](/art/auth-ui-enhancer-examples.png)

## Installation

First, starting by installing the plugin via composer:

```bash
composer require diogogpinto/filament-auth-ui-enhancer
```

After installation, run the following command to publish the assets:

```bash
php artisan filament:assets
```

### If you're using a custom theme

Add the vendor files to your tailwind config file:

```bash
    content: [
        './vendor/diogogpinto/filament-auth-ui-enhancer/resources/**/*.blade.php',
    ],
```

## Usage

To start using the plugin, you need to add the plugin to your plugins array in your filament panel.

```php
use DiogoGPinto\AuthUIEnhancer\AuthUIEnhancerPlugin;

 ->plugins([
    AuthUIEnhancerPlugin::make(),
])
```

### Auth Page Discovery

#### Default Auth Logic

If you don't have any custom classes on the auth methods of your Filament panel (login(), registration(), resetPassword() and emailVerification()), this plugin will work almost out of the box.

If your panel provider is setup like below, this plugin will automatically apply the changes to your UI.

```php
$panel
    ->login()
    ->registration()
```

#### Custom Auth Logic

If you have custom logic in the mentioned methods, there is a simple way to make that UI pop, using a simple trait from this plugin. If your panel looks like the below:

```php
$panel
    ->login(YourLoginClass::class)
```

Just add the following trait to `YouLoginClass`:

```php
use DiogoGPinto\AuthUIEnhancer\Pages\Auth\Concerns\HasCustomLayout;

class YourLoginClass extends BaseLogin
{
    use HasCustomLayout;
}
```

## Customizing the Auth UI

The view for this package divides your screen in two sections:
- Form Panel - The panel that contains the form
- Empty Panel - The panel that contains the image

### Customizing the Form Panel

#### Form Position

You can make the form appear on the left side of the page or in the right side of the page.

```php
->formPanelPosition('left')
````

#### Form Position on Mobile

On mobile devices, you can chose if the form appears above the empty container or below.

```php
->mobileFormPanelPosition('bottom')
```

This method accepts `top` or `bottom` as arguments. You can also hide the empty panel on mobile (see below).


#### Form Panel Width

The form panel width has a default value of `50%`. You can change it by adding the following method and passing the desired width.

```php
->formPanelWidth('40%')
```

Sizes must be expressed in rem, %, px, em, vw, vh or pt. 

#### Form Panel background color

You can change the form panel background color by using the following method:

```php
use Filament\Support\Colors\Color;

->formPanelBackgroundColor(Color::Zinc, '300')
```

In this case, 300 is the shade of the color you want to use.

You can also set the color using HEX or RGB, like in a typical filament panel:

```php
use Filament\Support\Colors\Color;

->formPanelBackgroundColor(Color::hex('#f0f0f0'))
```

#### 


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
