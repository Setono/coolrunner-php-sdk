# CoolRunner PHP SDK

[![Latest Version][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Build Status][ico-github-actions]][link-github-actions]
[![Code Coverage][ico-code-coverage]][link-code-coverage]
[![Mutation testing][ico-infection]][link-infection]

Consume the [CoolRunner API v3](https://docs.coolrunner.dk/#d1392cf1-6995-49c3-ae73-fd8525c541ad) in PHP.

## Installation

```bash
composer require setono/coolrunner-php-sdk
```

## Usage

```php
<?php

use Setono\CoolRunner\Client\Client;
use Setono\CoolRunner\DTO\Collection;
use Setono\CoolRunner\DTO\Servicepoint;

require_once '../vendor/autoload.php';

$client = new Client('USERNAME', 'TOKEN');
$response = $client
    ->servicepoints()
    ->find('gls', 'DK', 'Stigsborgvej 60 4. th.', '9400', 'Nørresundby')
;

/** @var list<Servicepoint> $servicepoints */
$servicepoints = Collection::fromResponse($response, Servicepoint::class);

foreach ($servicepoints as $servicepoint) {
    echo $servicepoint->name . "\n";
    echo $servicepoint->address->street . "\n";
    echo $servicepoint->address->zipCode . ' ' . $servicepoint->address->city . "\n";
    echo $servicepoint->address->countryCode . "\n\n";
}
```

will output something like:

```
Min Købmand Nørre Uttrup
Nørre Uttrup Torv 15
9400 Nørresundby
DK

Shell 7-Eleven Nørresundby
Østergade 27-29
9400 Nørresundby
DK

Next-Data.Dk
Østerbrogade 79
9400 Nørresundby
DK

...
```

[ico-version]: https://poser.pugx.org/setono/coolrunner-php-sdk/v/stable
[ico-license]: https://poser.pugx.org/setono/coolrunner-php-sdk/license
[ico-github-actions]: https://github.com/Setono/coolrunner-php-sdk/workflows/build/badge.svg
[ico-code-coverage]: https://codecov.io/gh/Setono/coolrunner-php-sdk/branch/master/graph/badge.svg
[ico-infection]: https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2FSetono%2Fcoolrunner-php-sdk%2Fmaster

[link-packagist]: https://packagist.org/packages/setono/coolrunner-php-sdk
[link-github-actions]: https://github.com/Setono/coolrunner-php-sdk/actions
[link-code-coverage]: https://codecov.io/gh/Setono/coolrunner-php-sdk
[link-infection]: https://dashboard.stryker-mutator.io/reports/github.com/Setono/coolrunner-php-sdk/master
