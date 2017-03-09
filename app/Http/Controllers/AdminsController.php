<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Title_CMS;
use App\AboutUs_CMS;
use App\Portfolio_CMS;
use App\PortfolioPublish;
use Auth;

/**
 * Creates a new user and persistes into database.
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illumintae\Http\Response
 */
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
                    return redirect()->back()->with('error', "Something went wrong, please try again later!");
                }
            } else {
                return redirect()->back()->with('error', "Password and confirm password should be matched!");
            }
        }
    }

    public function viewUser($id) 
    {
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
        $portfolios = Portfolio_CMS::leftJoin('portfolio_publishes', function($join) {
                $join->on('portfolio_cms.id', '=', 'portfolio_publishes.p_id');
            })->get([
                'portfolio_cms.id',
                'portfolio_cms.image',
                'portfolio_cms.project_title',
                'portfolio_cms.project_details',
                'portfolio_cms.project_link',
                'portfolio_cms.description',
                'portfolio_cms.client',
                'portfolio_cms.tags',
                'portfolio_publishes.p_pos'
            ]);
        return view('admin.cms.portfolio',['portfolio_cms' => $portfolios]);
    }

    public function portfolioPublish(Request $request)
    {
       // dd($request->request);
        $portfolio_publish=PortfolioPublish::all();
        if($portfolio_publish) {
            PortfolioPublish::truncate();
        }
        foreach ($request->map as $key => $jmap) {
            $portfolio_publish = new PortfolioPublish();
            /** Request a new data using the requst data */
            $portfolio_publish->p_id = $jmap['id'];
            $portfolio_publish->p_pos = $jmap['pos'];
            if ( !($portfolio_publish->save()) ) {
                return response()->json([
                    'isMatched' => false, 
                    'error' => "Couldnot complete update"
                ]);
            }
        }
        return response()->json(['isMatched' => true]);       
    }
    
    public function portfolioAdd()
    {
        return view('admin.cms.portfolio_add');
    }

    public function portfolioCreate(Request $request)
    {
        $portfolio_cms = new Portfolio_CMS();
        if($request) {
            /** Request a new data using the requst data */
            $portfolio_cms->image = $request->file('portfolio')->store('portfolio_images');
            $portfolio_cms->project_title = $request->project_title;
            $portfolio_cms->description = $request->description;
            $portfolio_cms->project_details = $request->project_details;
            $portfolio_cms->client = $request->client;
            $portfolio_cms->tags = $request->tags;
            $portfolio_cms->project_link = preg_replace('/(http:\/\/)|(https:\/\/)/', null, $request->project_link);

            /** Save if to the database */
            if($portfolio_cms->save()) {
                /** Redirect to the homepage */
                return redirect()->back()->with('success','New portfolio added!'); 
            } else {
                return redirect()->back()->with('error', "Something went wrong, please try again later!");
            }        
        } else {
            return redirect()->back()->with('error', "Something went wrong, please try again later!");
        }
    }

    public function portfolioEdit($id)
    {
        $portfolio_cms = Portfolio_CMS::find($id);
        
        if ($portfolio_cms) {
            return view('admin.cms.portfolio_edit', ['portfolio_cms' => $portfolio_cms]);
        } else {
            return redirect()->back()->with('error', "Sorry this portfolio doen't exist!");
        }
    }

    public function portfolioUpdate(Request $request,$id)
    {
        $portfolio_cms = Portfolio_CMS::find($id);
        
        if ($portfolio_cms) {
            /** Request a new data using the requst data */
            if ($request->file('portfolio')){
                $portfolio_cms->image = $request->file('portfolio')->store('portfolio_images');
            }   
            $portfolio_cms->project_title = $request->project_title;
            $portfolio_cms->description = $request->description;
            $portfolio_cms->project_details = $request->project_details;
            $portfolio_cms->client = $request->client;
            $portfolio_cms->tags = $request->tags;
            $portfolio_cms->project_link = $request->project_link;

            /** Save if to the database */
            if ($portfolio_cms->save()) {
                return redirect()->back()->with('success', "Successfully updated portfolio details!");
            } else {
                return redirect()->back()->with('error', "Something went wrong, please try again later!");
            }
        } else {
            return redirect()->back()->with('error', "Sorry this portfolio doen't exist!");
        }
    }

    public function portfolioView($id)
    {
        $portfolio_cms = Portfolio_CMS::find($id);

        if ($portfolio_cms) {
            return view('admin.cms.portfolio_view', ['portfolio_cms' => $portfolio_cms]);
        } else {
            return redirect()->back()->with('error', "Sorry this porfolio doesn't exist!");
        }
    }

    public function portfolioDelete($id)
    {
        $portfolio_cms = Portfolio_CMS::find($id);

        if ($portfolio_cms) {
            if ($portfolio_cms->delete()) {
                return redirect()->back()->with('success', "Portfolio successfully deleted!");
            } else {
                return redirect()->back()->with('error', "Something went wrong, please try again later!");
            }
        } else {
            return redirect()->back()->with('error', "Sorry this portfolio doesn't exist!");
        }
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
            /** Redirect back to add anout cms page */
            return redirect()->back()->with('success', "Successfully updated about us details!");
            } else {
                return redirect()->back()->with('success', "Something went wrong, please try again later!");
            }
        } else {
            return redirect()->back()->with('error', "Something went wrong, please try again later!");
        }
    } 

}
