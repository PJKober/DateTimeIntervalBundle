# DateTimeIntervalBundle
PHP and TWIG functions & filters to convert dates interval to number: secounds, minutes, hours, days.
Example usage in TWIG: {{ your_date **|days** }} if your_date = yesterday the result is -1.

[![Latest Version][badge-release]][release]
[![Build Status][badge-build]][build]
[![Coverage Status][badge-coverage]][coverage]
[![Total Downloads][badge-downloads]][downloads]

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
// Use the functions with PHP
echo $view['time']->dateToDays($dateTime); 
// returns something like "10" or "-10", count days interval between $dateTime and now

echo $view['time']->dateToDays($dateTime1, $dateTime1); 
// count days interval between $dateTime1 and  $dateTime2

echo $view['time']->dateToHours($dateTime); 
// returns something like "24" or "-36", count interval between $dateTime and now
echo $view['time']->dateToHours($dateTime1, $dateTime1); 
// count hours interval between $dateTime1 and  $dateTime2

echo $view['time']->dateToMinutes($dateTime); 
// returns something like "1140" or "-1140" minutunt interval between $dateTime and now
echo $view['time']->dateToMinutes($dateTime1, $dateTime1); 
// count minutes interval between $dateTime1 and  $dateTime2

echo $view['time']->dateToSeconds($dateTime); 
// returns something like "1140" or "-1140", count interval between $dateTime and now
echo $view['time']-> dateToSeconds($dateTime1, $dateTime1); 
// count Seconds interval between $dateTime1 and  $dateTime2

```


### In Twig!

``` php
{{ someDateTime |days }}
{{ someDateTime |hours }}
{{ someDateTime |minutes }}
{{ someDateTime |ceconds }}


//... or use the equivalent function. Secound date is now
{{ dateToDays( date() | date_modify("-1 day")) }}   = 1 
{{ dateToHours( date() | date_modify("-1 day")) }}  = 24
{{ dateToMinutes( date() | date_modify("-1 day")) }}  = 1140
{{ dateToSeconds( date() | date_modify("-1 day")) }}  = 86400

//... or put two dates
 {{ dateToDays( fromDate ,  toDate ) }}
{{ dateToDays( fromDateTime ,  toDateTime ) }}
{{ dateToHours( fromDate ,  toDate ) }}
{{ dateToHours( fromDateTime ,  toDateTime ) }}
{{ dateToMinutes( fromDate ,  toDate ) }}
{{ dateToMinutes( fromDateTime ,  toDateTime ) }}
{{ dateToSeconds( fromDate ,  toDate ) }}
{{ dateToSeconds( fromDateTime ,  toDateTime ) }}
```

## TESTS [x]

If you want to run tests, please check that you have installed dev dependencies.

```bash
./vendor/bin/simple-phpunit
```
## License

The MIT License (MIT). Please see [License File](./LICENSE) for more information.


[badge-build]: https://img.shields.io/travis/PJKober/DateTimeIntervalBundle/master.svg?style=flat-square
[badge-coverage]: https://img.shields.io/coverallsPJKober/DateTimeIntervalBundle/master.svg?style=flat-square
[badge-downloads]: https://img.shields.io/packagist/dt/PJKober/DateTimeIntervalBundle.svg?style=flat-square
[badge-release]: https://img.shields.io/github/release/PJKober/DateTimeIntervalBundle.svg?style=flat-square
[badge-source]: http://img.shields.io/badge/source-PJKober/DateTimeIntervalBundle.svg?style=flat-square
[build]: https://travis-ci.org/PJKober/DateTimeIntervalBundle
[conduct]: https://github.com/PJKober/DateTimeIntervalBundle/blob/master/CODE_OF_CONDUCT.md
[contributing]: https://github.com/PJKober/DateTimeIntervalBundle/blob/master/CONTRIBUTING.md
[coverage]: https://coveralls.io/r/PJKober/DateTimeIntervalBundle?branch=master
[downloads]: https://packagist.org/packages/PJKober/DateTimeIntervalBundle
[release]: https://github.com/PJKober/DateTimeIntervalBundle/releases
[source]: https://github.com/PJKober/DateTimeIntervalBundle
