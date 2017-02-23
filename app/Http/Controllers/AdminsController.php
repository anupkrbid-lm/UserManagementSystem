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
            if($user->delete()){
                return redirect()->back()->with('success','Record Deleted..');
            }else{
                return redirect()->back()->with('error','Record could not be deleted..');
            }
        }
        else{
            return redirect()->back()->with('error','Record not Found..');
        }
    }

        //
    public function store(Request $request)
    {
        //
    }

    public function findUpdate($id)
    {
        $user = User::find($id);
        if($user){
            return view('admin_user_update', ['user' => $user]);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            // dd($user);
            // Request a new data using the requst data
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->sex = $request->sex=="male"?1:($request->sex=="female"?2:0);
            // $user->profile_picture = $request->profile_picture;
            if ($user->save()) {
                return redirect()->back()->with('success','Record Updated!');
            } else {
                return redirect()->back()->with('error','Record could not be updated!');
            }
        } else {
            return redirect()->back()->with('error','Record not found!');
        }
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        
}
