<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use App\Guest;

class SetCookies
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
       // dd(Session::has("ROCPoa6qolo6v2sONWyZZtFXl4wGZLu2WSIyN5p8"));
        if($request->hasCookie('ums_token')) {
        //   echo request()->cookie('ums_token');
            dd(Session::get('ums_session'));
            if(Session::has('ums_session')) {
                $findGuest=Guest::where('cookie_id', '=', request()->cookie('ums_token'))->first();
                if ($findGuest) {
                    $findGuest->path = request()->path();
                    $findGuest->save(); 
                } 
            } else {
                Session::put('ums_session', Session::get('_token'));
                try {
                    /** Getting Info related to IP */
                    $curlHandler = curl_init('http://ip-api.com/json'); 
                    curl_setopt_array($curlHandler, [
                        CURLOPT_HEADER => 0,
                        CURLOPT_HTTPHEADER => [
                            'Accept: application/json',
                            'Content-Type: application/json',
                            ],
                        CURLOPT_CUSTOMREQUEST => 'GET',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_TIMEOUT => 10,
                    ]);
                    $reponseString = curl_exec($curlHandler);
                    $details_ip = json_decode($reponseString);
                    curl_close($curlHandler);

                    /** Getting Info related to user Agent */
                    $curlHandler = curl_init('https://useragentapi.com/api/v4/json/23d50b97/'.urlencode($_SERVER['HTTP_USER_AGENT'])); 
                    curl_setopt_array($curlHandler, [
                        CURLOPT_HEADER => 0,
                        CURLOPT_HTTPHEADER => [
                            'Accept: application/json',
                            'Content-Type: application/json',
                            ],
                        CURLOPT_CUSTOMREQUEST => 'GET',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_TIMEOUT => 10,
                    ]);
                    $reponseString = curl_exec($curlHandler);
                    $details_ua = json_decode($reponseString);
                    curl_close($curlHandler);

                    if ($details_ip->status == "success") {
                        $newGuest = new Guest();

                        $newGuest->cookie_id = Session::get('_token');
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
                } catch (\Exception $e) {
                    \Log::info($e->getMessage());
                    //Session::flush('ums_session');
                }
            }
            return $next($request);
        } else {
            $response = $next($request);
            /** Setting Session */
            Session::put('ums_session', Session::get('_token'));
            try {
                /** Getting Info related to IP */
                $curlHandler = curl_init('http://ip-api.com/json'); 
                curl_setopt_array($curlHandler, [
                    CURLOPT_HEADER => 0,
                    CURLOPT_HTTPHEADER => [
                        'Accept: application/json',
                        'Content-Type: application/json',
                        ],
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_TIMEOUT => 10,
                ]);
                $reponseString = curl_exec($curlHandler);
                $details_ip = json_decode($reponseString);
                curl_close($curlHandler);

                /** Getting Info related to user Agent */
                $curlHandler = curl_init('https://useragentapi.com/api/v4/json/23d50b97/'.urlencode($_SERVER['HTTP_USER_AGENT'])); 
                curl_setopt_array($curlHandler, [
                    CURLOPT_HEADER => 0,
                    CURLOPT_HTTPHEADER => [
                        'Accept: application/json',
                        'Content-Type: application/json',
                        ],
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_TIMEOUT => 10,
                ]);
                $reponseString = curl_exec($curlHandler);
                $details_ua = json_decode($reponseString);
                curl_close($curlHandler);

                if ($details_ip->status == "success") {
                    $newGuest = new Guest();

                    $newGuest->cookie_id = Session::get('_token');
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
            } catch (\Exception $e) {
                \Log::info($e->getMessage());
                //Session::flush('ums_session');
            }

            return $response->withCookie(cookie()->forever('ums_token', Session::get('_token')));           
        }
    }
}