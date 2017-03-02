<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title_CMS;
use App\AboutUs_CMS;

class HomesController extends Controller
{
    public function home()
    {
        $title_cms = Title_CMS::find(1);
        $aboutus_cms = AboutUs_CMS::find(1);
        if($title_cms && $aboutus_cms) {
            return view('home');/*,['title_cms' => $title_cms]*/
        } else {
            return back()->with('error','Something went wrong, please try again later!');
        }
    }
}
