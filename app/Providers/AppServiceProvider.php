<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.app', function ($view){
            $value = request()->cookie('name');
            if(!$value){
                /**Create a response instance*/
               // $response = new Response($view);

                /**Call the withCookie() method with the response method*/
            //    $response->withCookie(cookie('name', 'value', $minutes));

                /**To set the cookie forever*/
               // $response->withCookie(cookie()->forever('name', 'value'));
                //return the response
           //     return $view->with('response',  $response);
                $minutes =30;
                return response($view)->cookie('name', 'value', $minutes);
            
           //     return $response;

                    //Documentation
            //     $cookie = cookie('name', 'value', $minutes, $path);
            //    $view()->response()->cookie($cookie);
            } else {
                return $view;
            }
        });
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
