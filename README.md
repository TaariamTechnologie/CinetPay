# :package_description

[![Latest Version on Packagist](https://img.shields.io/packagist/v/:vendor_slug/:package_slug.svg?style=flat-square)](https://packagist.org/packages/:vendor_slug/:package_slug)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/:vendor_slug/:package_slug/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/:vendor_slug/:package_slug/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/:vendor_slug/:package_slug/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/:vendor_slug/:package_slug/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/:vendor_slug/:package_slug.svg?style=flat-square)](https://packagist.org/packages/:vendor_slug/:package_slug)
<!--delete-->
---
# CinetPay Laravel Package

## Introduction

Ce package permet d'intégrer facilement l'SDK CinetPay dans un projet Laravel. Il fournit une interface simple pour initier et gérer les paiements via CinetPay.

<!--/delete-->
This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/:package_name.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/:package_name)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require taariam/cinetpay
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag=":package_slug-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="cinetpay"
```

This is the contents of the published config file:

```php
return [
	'api_key' => env('CINETPAY_API_KEY'),
    'site_id' => env('CINETPAY_SITE_ID'),
    'base_url' => env('CINETPAY_BASE_URL', 'https://api.cinetpay.com/v1/'),
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="cinetpay-views"
```

## Usage Controller

```php
namespace App\Http\Controllers;

use VotreNom\Cinetpay\Cinetpay;

class PaymentController extends Controller
{
    public function initiatePayment()
    {
        $cinetpay = app('cinetpay');

        // Configurer le paiement
        $paymentData = [
            'amount' => 1000,
            'transaction_id' => '123456789',
            'currency' => 'XOF',
            'description' => 'Payment description',
            'return_url' => route('payment.success'),
            'notify_url' => route('payment.notify')
        ];

        // Initier le paiement
        $response = $cinetpay->makePayment($paymentData);

        return redirect($response['payment_url']);
    }
}

```

## Usage Controller

```php
use App\Http\Controllers\PaymentController;

Route::get('initiate-payment', [PaymentController::class, 'initiatePayment'])->name('payment.initiate');
Route::get('payment-success', function () {
    return 'Payment was successful!';
})->name('payment.success');
Route::post('payment-notify', function () {
    // Logique pour gérer la notification de paiement
})->name('payment.notify');


```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [:author_name](https://github.com/rikudosama)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
