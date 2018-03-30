# Techportal

A basic portal like website built with Laravel, Laravel-Admin, SimpleMDE and VitalCSS.

## Requirements
All the requirements of Laravel 5.5 https://laravel.com/docs/5.5

## Install
```shell
git clone git@github.com:tanyitibor/techportal.git
cd techportal
composer install
php artisan storage:link
npm install
npm run prod
```
If .env file isnt generated
```shell
php -r "file_exists('.env') || copy('.env.example', '.env');"
php artisan key:generate
```
Configure your .env file. Most importantly the APP_URL, database credentials and your cache driver.

For database data:
```shell
php artisan migrate
php artisan db:seed
```

For hosting http server recommended, but you can use laravel built in php server.
```shell
php artisan serve
```

## Admin Panel
To access the admin panel go to your domain /admin. To login you can use 3 predefined users.

Username | Password
-------- | --------
admin | admin
author1 | author1
author2 | author2

## Demo
http://techportal.ml
