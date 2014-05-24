<?php namespace Haska\Cart;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

use Haska\Cart\Storage\LaravelSession as SessionStore;
use Haska\Cart\Storage\LaravelCache as CacheStore;
use Haska\Cart\Identifier\Cookie as CookieIdentifier;
use Haska\Cart\Identifier\RequestCookie as CookieRequestIdentifier;

class CartServiceProvider extends ServiceProvider
{
    public function getStorageService()
    {
        switch(Config::get('laravel-cart::storage', 'session'))
        {
            case 'cache':
                return new CacheStore;
                break;
            default:
            case 'session':
                return new SessionStore;
                break;
        }
    }

    public function getIdentifierService()
    {
        switch(Config::get('laravel-cart::identifier', 'cookie'))
        {
            case 'requestcookie':
                return new CookieRequestIdentifier;
                break;
            default:
            case 'cookie':
                return new CookieIdentifier;
                break;
        }
    }

    public function register()
    {
        $this->package('haska/laravel-cart');

        $that = $this;

        $this->app->singleton('cart', function() use ($that) {
            return new Cart($that->getStorageService(), $that->getIdentifierService());
        });
    }

}
