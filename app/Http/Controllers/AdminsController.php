<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin_home');

    }
 
    public function user_manage()
    {   
        $users = User::all();
        return view('admin_user_manage', ['users' => $users]);
    }

    public function delete($id)
    {
       // User::delete(Sid);
        $user = User::find($id);
        if($user){
            $user->delete();
            return redirect()->back()->with('success','Record Deleted..');
        }
        else{
            return redirect()->back()->with('error','Record not Found..');
        }
    }

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
        
}
