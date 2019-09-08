<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $userData = DB::table('Users')->orderBy('id', 'asc')->paginate(8);
            $users = count(DB::table('users')->where('roleid', '1')->get());
            $admin = count(DB::table('users')->where('roleid', '0')->get());

            return view('dashboard.index', compact('userData','users','admin'));
        }
    
    }
    
    
    function fetch_data(Request $request)
        {
         if($request->ajax())
         {
          $sort_by = $request->get('sortby');
          $sort_type = $request->get('sorttype');
                $query = $request->get('query');
                $query = str_replace(" ", "%", $query);
          $userData = DB::table('Users')
                        ->where('id', 'like', '%'.$query.'%')
                        ->orwhere('roleid', 'like', '%'.$query.'%')
                        ->orWhere('name', 'like', '%'.$query.'%')
                        ->orWhere('gender', 'like', '%'.$query.'%')
                        ->orWhere('mobile', 'like', '%'.$query.'%')
                        ->orWhere('bdate', 'like', '%'.$query.'%')
                        ->orWhere('city', 'like', '%'.$query.'%')
                        ->orWhere('workstart', 'like', '%'.$query.'%')

                        ->orderBy($sort_by, $sort_type)
                        ->paginate(5);
          return view('dashboard.dashboard_data', compact('userData'))->render();
         }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

     
        // $userData=User::all();
        // return \view('dashboard.create')->with('userData',$userData);;
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,array(
        //     'name' => 'required',
        //     ));
    
        //     //store data
        //     $userSave = new User;
    
        //     //db colom name -> request name
        //     $userSave->roleid = $request->roleid;
        //     $userSave->name = $request->name;
        //     $userSave->gender = $request->gender;
        //     $userSave->mobile = $request->mobile;
        //     $userSave->bdate = $request->bdate;
        //     $userSave->city = $request->city;
        //     $userSave->workstart = $request->workstart;
           
        //     // dd($routeSave);
        //     $userSave->save();
    
        //     //redirect to index
        //     return view('dashboard.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userData = User::find($id);
        // dd ($user);
        return view ('dashboard.show')->with('userData',$userData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userData = User::find($id);
        return \view('dashboard.edit')->with('userData',$userData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,array(
            // 'name' => 'required',
            ));
    
            //store data
            $userSave = User::find($id);
    
            //db colom name -> request name
            $userSave->roleid = $request->roleid;
            $userSave->name = $request->name;
            $userSave->gender = $request->gender;
            $userSave->mobile = $request->mobile;
            $userSave->bdate = $request->bdate;
            $userSave->city = $request->city;
            $userSave->workstart = $request->workstart;

           
            // dd($routeSave);
            $userSave->save();
    
            //redirect to index
            $userData = DB::table('Users')->orderBy('id', 'asc')->paginate();
            return redirect('dashboard/')->with('userData',$userData);
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userData = User::find($id);
        $userData->delete();

        $UserData=User::all();
        return redirect('dashboard/')->with('userData',$userData);
    }
}
