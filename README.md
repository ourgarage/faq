# Package FAQ for Engin CMS
### Installation manual for developer
* Insert the file `composer.json` next string:

    ``` JSON
    "require": {
            "ourgarage/faq": "dev-master"
        },
    ```

* Add a file `composer.json` next block:

    ``` JSON
    "repositories": [
            {
                "type": "git",
                "url": "git@github.com:ourgarage/faq.git"
            }
        ],
    ```

* Run `php composer.phar update`
* Add in your `config/app.php` file in providers:

    ``` PHP
    Ourgarage\Faq\FaqServiceProvider::class,
    ```

* Run `php artisan vendor:publish --tag=faq`
* Run `php artisan migrate`
