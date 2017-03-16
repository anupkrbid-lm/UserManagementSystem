<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Guest;

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
        //    $request_uri = 'http://jsonip.com';
                $request_uri_ip = 'http://ip-api.com/json';
                $document_ip = file_get_contents($request_uri_ip);
                $details_ip = json_decode($document_ip);
                
                $request_uri_ua='https://useragentapi.com/api/v4/json/23d50b97/Mozilla%2F5.0+%28X11%3B+Linux+x86_64%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Chrome%2F56.0.2924.87+Safari%2F537.36';
                $document_ua = file_get_contents($request_uri_ua);
                $details_ua = json_decode($document_ua);

                if (session()->has('id')) {

                    $findGuest=Guest::where('cookie_id', '=', session('id'))->first();
                    if ($findGuest) {
                        dd($findGuest);
                        $findGuest->path = request()->path(); 

                        $findGuest->save(); 
                    }
                    
                } else {
                    if ($details_ip->status = "success") {
                        session(['id' => $value]);
                        session(['ip' => $details_ip->query]); 

                        $newGuest = new Guest();

                        $newGuest->cookie_id = $value;
                        $newGuest->ip_address = $details_ip->query;
                        $newGuest->city = $details_ip->city;                        
                        $newGuest->region = $details_ip->regionName;
                        $newGuest->region_code = $details_ip->region;
                        $newGuest->country = $details_ip->country;
                        $newGuest->country_code = $details_ip->countryCode;
                        $newGuest->timezone = $details_ip->timezone;
                        $newGuest->isp = $details_ip->isp;
                        $newGuest->latitide = $details_ip->lat;
                        $newGuest->longitude = $details_ip->lon;
                        $newGuest->ua_type = $details_ua->data->ua_type;
                        $newGuest->ua_os = $details_ua->data->os_name;;
                        $newGuest->ua_browser = $details_ua->data->browser_name;   
                        $newGuest->path = request()->path(); 

                        $newGuest->save(); 

                    } else if($details->status = "fail") {
                        session(['id' => $value]);
                        session(['ip' => $details_ip->query]);
                    }
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
