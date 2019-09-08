<?php

namespace App\Http\Controllers;

use App\User;
use App\Employee;
// use Hash;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
// use App\Http\Controllers\Route;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "INDEX PAGE";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Route::redirect('employee.create');
        return view ('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request,array(

     
            'roleid'=> 'required',
            'name' => 'required', 'string', 'max:255',
            'email' => 'required',
            'password' => 'required',
            'gender'=> 'required',
            'mobile' => 'required',
            'city' => 'required|max:255',
            'bdate' => 'required|max:50', 
            'workstart' => 'required',
        ));

        //step 2 Store data
        $empsave = new User;

        //left side = database column name ----- right side = request name
        // 'password' => Hash::make($data['password']),
        $pass = Hash::make($request['password']);

        $empsave->roleid = $request->roleid;
        $empsave->name = $request->name;
        $empsave->email = $request->email;
        $empsave->password = $pass;
        $empsave->gender = $request->gender;
        $empsave->mobile = $request->mobile;
        $empsave->bdate = $request->bdate;
        $empsave->city = $request->city;
        $empsave->workstart = $request->bdate;
        // dd($empsave);
        
        $empsave->save();        


        //step 3 redirect to another page
        // return Route::get('employee/create');
        // $request->url('employee/create');
            
        return view ('employee.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
