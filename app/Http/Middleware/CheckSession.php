<?php

namespace App\Http\Middleware;

use Closure;
use App\Guest;
use Illuminate\Support\Facades\Session;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
     //   dd(Session::all());
       // dd(Session::get('_token'));
     /*   if (Session::has('ums')) {

            //dd(Session::get('ums'));

        }  else if($request->hasCookie('ums')){
            Session::put('ums', $request->cookie('ums'));
           // dd(Session::all());
           // dd('123');
        }
*/
        if($request->hasCookie('ums')) {
          //  dd($request->cookie('ums'));
            return $next($request);
        } else {

            $ums_set_cookie = bcrypt('ums');
            $response = $next($request);
            return $response->withCookie(cookie()->forever('ums', Session::get('_token')));
        }
    }
/*

        $value = request()->cookie('guest');
        dd($value);
        if($value) {                 
        //    $request_uri = 'http://jsonip.com';
            $details_ip = json_decode(file_get_contents('http://ip-api.com/json'));

            $request_uri_ua='https://useragentapi.com/api/v4/json/23d50b97/'.urlencode($_SERVER['HTTP_USER_AGENT']);
            $details_ua = json_decode(file_get_contents($request_uri_ua));
            if ( session()->has('c_id')) {
                $findGuest=Guest::where('cookie_id', '=', session('c_id'))->first();
                if ($findGuest) {
                    $findGuest->path = request()->path();
                    $findGuest->save(); 
                }
                
            } else {
                Session::put('c_id', $value);

                if ($details_ip->status = "success") {

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
                }
            }  
        }      
        return $next($request);*/
    

    // public function terminate($request, $response) 
    // {
    //  if (!Session::has('ums')) {
    //          Session::put('ums', $request->cookie('ums'));
    //       //  $request->session()->put('ums', $request->cookie('ums'));
    //           // dd(1234);
    //         //dd($request->session()->all());
    //         //dd($request->session()->get('ums'));
    //         // user value cannot be found in session
    //     }
    
}
