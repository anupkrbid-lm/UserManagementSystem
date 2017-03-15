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
            //dd($value);
           
                if($value) {
                    if (session()->has('id')) {
                        
                    } else {
                        session(['id' => $value]);
                        
                     //   dd($user_ip);
                    //    dd(session()->all());
                    }
                } 
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
