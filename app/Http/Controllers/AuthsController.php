<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AuthsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth_page');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
       
        //dd(request()->all());
        $users=User::where('email', '=', $request->email)->first();
        if ($users)
        {
            return redirect()->back()->with('error','Oops..! Email already Registered.');
        }
        else 
        {
            $user = new User();

            if ($request->password==$request->cnf_password) 
            {
                // Request a new data using the requst data
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->sex = $request->sex=="male"?1:($request->sex=="female"?2:0);
                $user->email = $request->email;
                $user->password = bcrypt($request->password);

                // Save if to the database

                $user->save();

                // Redirect to the homepage
                return redirect()->back()->with('success','Good Job..! You are Registered.');
            } 
            else 
            {
                return redirect()->back()->with('error','Oops..! Password did not Match.');;
            }
        }
    }

    public function login()
    {
        // Attempt to aythenticate the user
        if(auth()->attempt(request(['email','password']))){
            return redirect()->route('admin');
        }else{
            return redirect()->back()->with('error','Oops..! Invalid Credentials.');
        }
    
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
