<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;    // Must Must use
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ### ADMIN BLADE DIRECTIVES ###

        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->is_admin == 1 ;
        });

        ### USER BLADE DIRECTIVES ###
        Blade::if('user', function () {
            return auth()->check() && auth()->user()->is_admin == 2 ;
        });

        ### whereExist ###
        Collection::macro('toFilter', function () {
            $dots = Arr::dot($this->toArray());
            return collect($dots)->map(function ($value, $key) {
                return [$key, $value];
            })->toArray();
        });

    }
}
