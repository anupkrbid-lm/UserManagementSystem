<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Guest;
use Auth;   

class AuthsController extends Controller
{
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
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
                $user->is_admin = 0;
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

    public function login(Request $request)
    {
        /** Attempt to authenticate the user */
        if ( auth()->attempt(request(['email','password'])) ) {
            $users = User::where('email', '=', $request->email)->first();

            if ( $users->is_admin == 1 ) {
                return redirect()->route('admin.get.dashboard');
            } else {
                return redirect()->route('user.get.profile');
            }
        } else {
            return redirect()->back()->with('error','Oops..! Invalid Credentials.');
        }
    
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');

    }

    public function verifyPassword(Request $request)
    {
        if (\Hash::check($request->password, Auth::user()->password)) { 
            return response()->json(['isMatched' => true]);
        } else {
            return response()->json([
                'isMatched' => false,
                'error' => "Password Incorrect"
            ]);
        }
    }

    public function changePassword(Request $request)
    {
        if ( $request->new_password != "" || $request->cnf_new_password != "" ) {
            if ( $request->new_password == $request->cnf_new_password ) {
                $user = Auth::user();

                if ($user) {
                    /** Request a new data using the requst data */
                    $user->password = \Hash::make($request->new_password);
                   // $user->password = bcrypt($request->new_password);
                    if ($user->save()) {
                        return response()->json(['isMatched' => true]);
                    } else {
                        return response()->json([
                            'isMatched' => false, 
                            'error' => "Some error occured"
                        ]);
                    }
                } else {
                    return response()->json([
                        'isMatched' => false,
                        'error' => "No record"
                    ]);
                }
            } else {
                return response()->json([
                    'isMatched' => false, 
                    'error' => "Password did not match!"
                ]);
            }
        } else {
            return response()->json([
                    'isMatched' => false, 
                    'error' => "Password cannot be empty!"
                ]);
        }
    }

    public function checkOnlineVisitors()
    {
        $result="";
      //  $guests = Guest::all();
        $guests = \App\VisitorLogs::all();
        if ($guests) { 
            return response()->json([
                'isFound' => true,
                'guests' => $guests
            ]);
    /*        foreach ($guests as $guest)
            {
              $result.="<tr>
                            <td>"+ ++$loop->index +"</td>-
                            <td>"+guest->ip_address+"</td>
                            <td>"+guest->country+", "+guest->city+"</td>
                            <td>"+guest->ua_browser+"</td>
                            <td>"+guest->ua_type+", "+guest->ua_os+"</td>
                            <td>"+guest->path+"</td>
                            <td>"+guest->created_at"</td>
                            <td>
                                <a href= >
                                    <button type="button" class="btn btn-md btn-primary">
                                        <i class="fa fa-comments">
                                        </i>
                                         Start Chat
                                    </button>
                                </a>
                                <a href= >
                                    <button type="button" class="btn btn-md btn-danger">
                                        <i class="fa fa-ban">
                                        </i>
                                         Block
                                    </button>
                                </a>                                        
                            </td>
                        </tr>"
            } 
            return */

        } else {
            return response()->json([
                'isFound' => false,
                'error' => "No visitor online"
            ]);
        }
    }
}
