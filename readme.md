
## Install

git clone git@github.com:some-pablo/press.git

create .env file from example and set path to database

- composer install

and

- php artisan db:create 
- php artisan migrate
- php artisan db:seed 
- ./vendor/bin/phpunit

or

php artisan db:create; php artisan migrate; php artisan db:seed; ./vendor/bin/phpunit
