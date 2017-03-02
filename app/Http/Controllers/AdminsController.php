<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Title_CMS;
use App\AboutUs_CMS;
use Auth;

class AdminsController extends Controller
{
    /**  Admin Pannel Operations  */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {

        /** Incase  of Custom Session
         * $value = session('key');
         * dd($value);
         */
        $user = User::find(Auth::user()->id);
        return view('admin.profile',['user' => $user]);
    }
 
    /**  CRUD Operation on Users  */
    public function allUsers()
    {   
        $users = User::all();
        $adminUser = User::find(Auth::user()->id);
        return view('admin.users.all', ['users' => $users], ['adminUser' => $adminUser]);
    }

    public function addUser()
    {
        return view('admin.users.add');
    }

    /**
     * Creates a new user and persistes into database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illumintae\Http\Response
     */
    public function createUser(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        
        if ($user) {
            return redirect()->back()->with('error', "Sorry this email is already registerd!");
        } else {
            $user = new User();

            if ($request->password==$request->cnf_password) {
                /** Request a new data using the requst data */
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->sex = ($request->sex == "male") ? 1 : (($request->sex == "female") ? 2 : 0);
                $user->is_admin = $request->is_admin;
                $user->email = $request->email;
                // $user->profile_picture = $request->profile_picture;
                $user->password = bcrypt($request->password);
                /* Save if to the database */
                if ($user->save()) {
                    /** Redirect back to add user page */
                    return redirect()->back()->with('success', "Successfully added a new user!");
                } else {
                    return redirect()->back()->with('success', "Something went wrong, please try again later!");
                }
            } else {
                return redirect()->back()->with('error', "Password and confirm password should be matched!");
            }
        }
    }

    public function viewUser($id) {
        $user = User::find($id);

        if ($user) {
            return view('admin.users.view', ['user' => $user]);
        } else {
            return redirect()->back()->with('error', "Sorry this user doesn't exist!");
        }
    }

    public function editUser($id)
    {
        $user = User::find($id);
        
        if ($user) {
            return view('admin.users.edit', ['user' => $user]);
        } else {
            return redirect()->back()->with('error', "Sorry this user doen't exist!");
        }
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        
        if ($user) {
            /** Request a new data using the requst data */
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->sex = ($request->sex == "male") ? 1 : (($request->sex == "female") ? 2 :0);
            $user->is_admin = $request->is_admin;
            // $user->profile_picture = $request->profile_picture;
            
            if ($user->save()) {
                return redirect()->back()->with('success', "Successfully updated user's details!");
            } else {
                return redirect()->back()->with('error', "Something went wrong, please try again later!");
            }
        } else {
            return redirect()->back()->with('error', "Sorry this user doen't exist!");
        }
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            if ($user->delete()) {
                return redirect()->back()->with('success', "Successfully deleted this user!");
            } else {
                return redirect()->back()->with('error', "Something went wrong, please try again later!");
            }
        } else {
            return redirect()->back()->with('error', "Sorry this user doen't exist!");
        }
    }

    /**  CMS Management  */
    public function welcomeTitle()
    {
        if ($title_cms = Title_CMS::find(1)) {
            return view('admin.cms.welcome_title',[ 'title_cms' => $title_cms ]);
        } else {
            return redirect()->back()->with('error', "Something went wrong, please try again later!");
        }
    }

    public function welcomeTitleUpdate(Request $request)
    {
        $title_cms = Title_CMS::find(1);
        if($title_cms) {
            /** Request a new data using the requst data */
            $title_cms->title = $request->title;
            $title_cms->sub_title = $request->sub_title;
            /** Save if to the database */
            if ($title_cms->save()) {
            /** Redirect back to add user page */
            return redirect()->back()->with('success', "Successfully updated welcome title!");
            } else {
                return redirect()->back()->with('error', "Something went wrong, please try again later!");
            }
        } else {
            return redirect()->back()->with('error', "Something went wrong, please try again later!");
        }

    }

    public function portfolio()
    {
        return view('admin.cms.portfolio');
    }

    public function aboutUs()
    {
        if ($aboutus_cms = AboutUs_CMS::find(1)) {
            return view('admin.cms.about_us',[ 'aboutus_cms' => $aboutus_cms ]);
        } else {
            return redirect()->back()->with('error', "Something went wrong, please try again later!");
        }
    }

    public function aboutUsUpdate(Request $request)
    {
        $aboutus_cms = AboutUs_CMS::find(1);
        if($aboutus_cms) {
            /** Request a new data using the requst data */
            $aboutus_cms->left_block = $request->left_block;
            $aboutus_cms->right_block = $request->right_block;
            /** Save if to the database */
            if ($aboutus_cms->save()) {
            /** Redirect back to add user page */
            return redirect()->back()->with('success', "Successfully updated about us details!");
            } else {
                return redirect()->back()->with('success', "Something went wrong, please try again later!");
            }
        } else {
            return redirect()->back()->with('error', "Something went wrong, please try again later!");
        }

    } 
}
