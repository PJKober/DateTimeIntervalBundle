# DateTimeIntervalBundle
PHP and TWIG functions to convert and show interval for date and datetime data.

[![Build Status](https://travis-ci.org/PJKober/DateTimeIntervalBundle.svg?branch=master)](https://travis-ci.org/PJKober/DateTimeIntervalBundle)
[![Total Downloads](https://poser.pugx.org/PJKober/DateTimeIntervalBundle/downloads.svg)](https://packagist.org/packages/PJKober/DateTimeIntervalBundle) 
[![Latest Stable Version](https://poser.pugx.org/PJKober/DateTimeIntervalBundle/v/stable.svg)](https://packagist.org/packages/PJKober/DateTimeIntervalBundle)


# INSTALLATION & CONFIGURATION

## INSTALLATION via Composer
```
composer require pjkober/datetimeintervalbundle
```
	
## CONFIGURATION

Register the bundle:

```php
<?php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        // ...
        new pjkober\datetimeintervalbundle\EinsteDateTimeIntervalBundle(),
    );
    // ...
}
```

Enable the Service component configuration:

```yaml
# app/config/services.yml
services:
   date_time_interval_twig_extension:
            class: pjkober\datetimeintervalbundle\Twig\TwigFunctionExtension
            public: false
            tags:
                - { name: twig.extension }

```


## USAGE

### In PHP!

```php
<?php
// Use the helper with Php
echo $view['time']-> **dateToDays($dateTime)**; // returns something like "10", count interval between $dateTime and now
echo $view['time']-> **dateToDays($dateTime1, $dateTime1)**; // returns something like "10", count interval between $dateTime1 and  $dateTime2
```


### In Twig!

``` php
{{ someDateTimeVariable**|days** }}
//... or use the equivalent function
{{ dateToDays(someDateTimeVariable) }}
//... or
{{ dateToDays(someDateTimeVariable1, someDateTimeVariable2) }}
```

## TESTS [x]

If you want to run tests, please check that you have installed dev dependencies.

```bash
./vendor/bin/simple-phpunit
```
## License

The MIT License (MIT). Please see [License File](./LICENSE) for more information.

