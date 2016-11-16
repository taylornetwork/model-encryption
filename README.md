# Model Encryption Trait

This is a trait for Laravel that overrides the default getter and setters to encrypt and decrypt the values using Laravel's builtin encrypt and decrypt functions.

## Install

Via Composer

``` bash
$ composer require taylornetwork/model-encryption
```

## Usage

Include `Encryptable` trait in any model you want to add encryption and add a `$encryptable` property with an array of attributes to encrypt/decrypt.

``` php

use TaylorNetwork\ModelEncryption\Encryptable;

class DummyModel extends Model
{
    use Encryptable;

    /**
     * Model attributes to encrypt/decrypt
     *
     * @var array
     */
    protected $encryptable = [
        'dummy_attribute'
    ];

    // Code

}
```

When accessing any property, the Encryptable trait will determine if the attribute is in the `$encryptable` array, if so, encrypt/decrypt. Otherwise get/set as normal.

## Credits

- Main Author: [Sam Taylor][link-author]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[link-author]: https://github.com/taylornetwork