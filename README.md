# Aivo Test

## Objective

Build a service which retrieves the profile of one facebook user, using the Facebook API Graph.

## Conditions

* The project should be developed using PHP 5.4+
* If necessary, you can use any web framework of your choice, We recommend SlimPHP
* You can use the data store solution of your choice if you need one
* The full project should be correctly revisioned using GIT. That GIT repository should be accesible by us (publicly or privately) on GitHub or BitBucket.
* You don't need to serve the project to the internet but it should be testeable locally using the php built-in webserver or similar solution with the proper documentation on how to do it
* Unit Tests are a big plus!
* All added value you can give to the original idea is highly appreciated
* Have Fun!

## Install

- Download / clone this repository

```shell
git clone https://github.com/ivanenoriega/aivo.git
```

- Install dependencies with composer

```shell
composer install
```

- Replace the APP_ID_ENV_NAME and APP_SECRET_ENV_NAME environment variables with your Facebook App Credentials in [app/controllers/facebookController.php](https://github.com/ivanenoriega/aivo/blob/master/app/controllers/facebookController.php)

- Start development server: 
```shell
php -S localhost:8080 -t public public/index.php
```

## Try it out

Ej: http://localhost:8080/profile/facebook/100006276904983

## Unit Testing

```shell
 php  vendor/phpunit/phpunit/phpunit
``` 

```shell
 vendor/bin/phpunit
``` 