<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    if(Auth::check()) {
        return redirect('/dashboard');
    } else {
        return view('auth.login');
    }
});






Route::resource('employee', 'EmployeeController');
Route::get('/employeecreate', 'EmployeeController@create');

// Route::get('/employee','EmployeeController@store')-> name('empolyee');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', function () {
    
    return view('dashboard');
});

Route::get('/leave', function () {
    return view('leave.request');
});



// Route::get('/leave', function () {
//     return view('leave.request');
// });


Route::get('user/profile', function () {
  
    return redirect('dashboard')->with('status', 'Profile updated!');
});



Route::get('changePassword', 'ChangePasswordController@index');
Route::post('changePassword', 'ChangePasswordController@store')->name('change.password');

//profile controller
Route::resource('dashboard', 'ProfileController'); 
Route::get('/dashboard/fetch_data', 'ProfileController@fetch_data');


//Leave controller
Route::get('/leave', 'LeaveController@indexEmp');
// Route::resource('Leave', 'LeaveController'); 
Route::get('/leave/fetch_data', 'LeaveController@fetch_data');
Route::get('/pending_leaves', 'LeaveController@pendingLeaves');

Route::get('/leaveapprove/fetch_data', 'LeaveController@fetch_data');
Route::get('/leaveapprove', 'LeaveController@index');
Route::get('/approve/{id}', 'LeaveController@approve');
Route::get('/notapprove/{id}', 'LeaveController@notapprove');




