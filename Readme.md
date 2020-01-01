## installing the package

### From CLI
```$xslt
$ composer config repositories.apirone-php-sdk vcs https://github.com/eavilesmejia/apirone-php-sdk.git
$ composer require apirone/sdk:dev-master
```

### From composer.json
```$xslt
"require": {
        "apirone/sdk": "dev-master"
 },
 "repositories": {
     "apirone/sdk": {
         "type": "vcs",
         "url": "https://github.com/eavilesmejia/apirone-php-sdk.git"
     }
 },

```

## Unit testing

### Install in your local
```$xslt
$ composer install
```
### Run Tests
```$xslt
$ php vendor/bin/phpunit --bootstrap vendor/autoload.php tests/unit/Services/WalletTest.php
$ php vendor/bin/phpunit --bootstrap vendor/autoload.php tests/unit/Services/NetworkFeeTest.php
```