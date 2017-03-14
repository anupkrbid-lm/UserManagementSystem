<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title_CMS;
use App\AboutUs_CMS;
use App\Portfolio_CMS;
use App\PortfolioPublish;

class HomesController extends Controller
{
    public function home(Request $request)
    {
     //   dd($request->session()->get('key'), );
        $title_cms = Title_CMS::find(1);
        $aboutus_cms = AboutUs_CMS::find(1);
        $portfolios = Portfolio_CMS::leftJoin('portfolio_publishes', function($join) {
                $join->on('portfolio_cms.id', '=', 'portfolio_publishes.p_id');
            })->orderBy('p_pos')->get();

        if($title_cms && $aboutus_cms && $portfolios) {
            return view('home',['title_cms' => $title_cms,'aboutus_cms' => $aboutus_cms,'portfolios' => $portfolios]);
        } else {
            return back()->with('error','Something went wrong, please try again later!');
        }
    }

    public function guests()
    {


    }
}
