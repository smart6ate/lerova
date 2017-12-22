## About Lerova

Lerova is an easy-to-use content manager for Laravel

## Components

Lerova is using the following components to make writing your blog a breeze

* [Uploadcare](https://uploadcare.com)

* [WYSIWYG - Imperavi - Redactor](https://imperavi.com)


## Installation

First of all get yourself a fresh Laravel-installation. At the moment the packages using Laravel 5.5.

```
composer create-project laravel/laravel your-project-name
```

#### Lerova Package
Pull in Lerova in jour composer file
```
composer require smart6ate/lerova

php artisan lerova:install

```

### Adjust your config/lerova.php file


### .env File

Insert your Public & Secret Keys in the .env file
```
FACEBOOK_URL=
FACEBOOK_ADMIN_ID=
FACEBOOK_PAGE_ID=
FACEBOO_APP_ID=
FACEBOOK_PIXEL_ID=

GOOGLE_ANALYTICS_ID=
GOOGLE_MAPS_URL=

TWITTER_ACCOUNT=
TWITTER_URL=

GITHUB_URL=

MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=

MAIL_DRIVER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=

UPLOADCARE_PUBLIC_KEY=
UPLOADCARE_SECRET_KEY=
```

### WYSIWYG Imperavi - Redactor

You must hold an valid licence from Redactor to using their editor. So the core files are not integrated within this package. Drop your existing redactor.min.css.min.css & redactor.min.js into the folder. 
```
public/redactor

```
Plugins under /redactor/plugins

```
public/redactor/plugins

```

Language-Files under /redactor/lang

```
public/redactor/lang

```

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send us an e-mail: info@smartgate.ch. All security vulnerabilities will be promptly addressed.

## License

The Lerova-Package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
