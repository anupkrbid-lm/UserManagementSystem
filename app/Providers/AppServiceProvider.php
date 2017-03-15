<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // view()->composer('includes.home.footer_home', function ($view){
        //     $cookie = cookie('name', 'defaultCookie', '30');
              $value = request()->cookie('guest');
             dd($value);
              // if($value){


              // }
    }

    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
