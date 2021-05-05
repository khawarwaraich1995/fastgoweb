# FoodTiger | QR SaaS | WhatsApp

[![FT](https://i.imgur.com/gcgJEb2.jpg)](https://codecanyon.net/user/mobidonia/portfolio)
[![QR](https://i.imgur.com/bqpWgnU.jpg)](https://codecanyon.net/user/mobidonia/portfolio)
[![WP](https://i.imgur.com/VgHDizv.jpg)](https://codecanyon.net/user/mobidonia/portfolio)


## Test
sail artisan test --testsuite=Feature

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## ENV
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=laravel


MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=

## Updates

git diff --name-only 49b736c231b1de9ae4ecdce31307960a9d13b087 0abba369fa214151892283d938f8e58dacabd592 > .diff-files.txt && npm run zipupdate

COMPOSER_MEMORY_LIMIT=-1 composer require */**

## Clearing cache
sail artisan cache:clear
sail artisan config:cache
sail artisan config:clear
sail artisan route:clear
sail artisan config:cache
sail artisan route:cache
sail artisan optimize