# SendPlex PHP SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sohaibilyas/sendplex-php-sdk.svg?style=flat-square)](https://packagist.org/packages/sohaibilyas/sendplex-php-sdk)
[![Total Downloads](https://img.shields.io/packagist/dt/sohaibilyas/sendplex-php-sdk.svg?style=flat-square)](https://packagist.org/packages/sohaibilyas/sendplex-php-sdk)

This SDK will let you easily interact with SendPlex API.

## Installation

You can install the package via composer:

```bash
composer require sohaibilyas/sendplex-php-sdk
```

## Usage

```php
<?php
session_start();

use SohaibIlyas\SendPlexPhpSdk\SendPlex;

require './vendor/autoload.php';

// initialize
$sendplex = new SendPlex();

// check if user is not logged in then login and store access token somewhere e.g. session, database
if (empty($_SESSION['access_token'])) {
    
    if (!$sendplex->auth('user@email.com', '123123123')) {

        exit('invalid credentials');
    }

    $_SESSION['access_token'] = $sendplex->getAccessToken();
}

// fetch stored token and set it to be used for following calls
$sendplex->setAccessToken($_SESSION['access_token']);

// fetch user information
echo $sendplex->account();
```

### Testing

```bash
composer test
```

## Credits

- [Sohaib Ilyas](https://github.com/sohaibilyas)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
