# floatval

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

Correctly parse float like strings to float values. This library is based on the `tofloat` function originally from http://codepad.org/hBpKZC5C .

## Install

Via Composer

``` bash
$ composer require victorlap/floatval
```

## Usage

``` php
$float = Victorlap\Floatval::parse('123,456');
```

## Warning about Floating point precision
The default warnings apply when working with floating point numbers. Quoted from php.net:

> Floating point numbers have limited precision. Although it depends on the system, PHP typically uses the IEEE 754 double precision format, which will give a maximum relative error due to rounding in the order of 1.11e-16. Non elementary arithmetic operations may give larger errors, and, of course, error propagation must be considered when several operations are compounded.
>
> Additionally, rational numbers that are exactly representable as floating point numbers in base 10, like `0.1` or `0.7`, do not have an exact representation as floating point numbers in base 2, which is used internally, no matter the size of the mantissa. Hence, they cannot be converted into their internal binary counterparts without a small loss of precision. This can lead to confusing results: for example, `floor((0.1+0.7)*10)` will usually return `7` instead of the expected 8, since the internal representation will be something like `7.9999999999999991118...`.
>
> So never trust floating number results to the last digit, and do not compare floating point numbers directly for equality. If higher precision is necessary, the [arbitrary precision math functions](https://www.php.net/manual/en/ref.bc.php) and [gmp](https://www.php.net/manual/en/ref.gmp.php) functions are available.
>
> For a "simple" explanation, see the [» floating point guide](http://floating-point-gui.de/) that's also titled "Why don’t my numbers add up?" 

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email victorlap@outlook.com instead of using the issue tracker.

## Credits

- [Victor Lap][link-author]
- [Gaabora](http://codepad.org/users/gaabora)
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/victorlap/floatval.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/victorlap/floatval.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/victorlap/floatval
[link-downloads]: https://packagist.org/packages/victorlap/floatval
[link-author]: https://github.com/victorlap
[link-contributors]: ../../contributors
