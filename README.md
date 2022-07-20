# Picsmize - Image Optimizer Facade for Laravel 4|5|6|7|8|9

### Installation

To install the most recent version:

```bash
$ composer require picsmize/picsmize-laravel
```

or add the following entry to your `composer.json`:

```js
"require": {
    "picsmize/picsmize-laravel": "dev-main"
}
```

and then run `composer update`.

Laravel uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider. If you don't use auto-discovery, add the ServiceProvider to the providers array in `config/app.php`:

```php
Picsmize\PicsmizeLaravel\PicsmizeServiceProvider::class,
```

You may also add the following aliases to your `config/app.php`:

```php
'Picsmize' => Picsmize\PicsmizeLaravel\Facades\Picsmize::class,
```

### Configuration

Publish the configuration for the package which will create the config file `config/picsmize.php`:

```bash
php artisan vendor:publish --provider="Picsmize\PicsmizeLaravel\PicsmizeServiceProvider"
```

The last step is to provide your Picsmize API Key by either setting app variable `picsmize_apikey` in your `config/app.php` file or by directly editing the `config/picsmize.php` file.

If you don't have your API Key just yet, you can [Sign Up](https://picsmize.com/register) for a free account.
And That's it! Start optimizing..!

### Quick example

```php
use Picsmize;

Picsmize::fetch('https://www.example.com/image.jpg')

->compress(Picsmize::get("COMPRESS_MEDIUM")

->resize(Picsmize::get("RESIZE_AUTO"), array(
	'width' => 400
))

->filter(Picsmize::get("FILTER_BLUR"), array(
	'mode' => "gaussian",
	'value' => 10
))

->flip(Picsmize::get("FLIP_HORIZONTAL"))

->toJSON(function($response){
	
	dd($response);

});
```

## Debugging Mode

To enable debugging mode, just set `APP_DEBUG=true` and the package will include the queries and inputs used when processing the table.

**IMPORTANT:** Please make sure that APP_DEBUG is set to false when your app is on production.

## Security

If you discover any security related issues, please email [picsmize@gmail.com](mailto:picsmize@gmail.com) instead of using the issue tracker.
