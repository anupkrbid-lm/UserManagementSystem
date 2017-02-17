<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartsController extends Controller
{
    //

    public function testWebsite()
	{
		return view('index');
	}

	public function website()
	{
		return view('homepage');
	}

}
