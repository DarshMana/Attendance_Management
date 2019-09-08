<?php

namespace App\Http\Controllers;

use App\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $leaveData = DB::table('Leaves')->orderBy('id', 'asc')->paginate();
            return view('leave.index2', compact('leaveData'));
        }
    }
    public function indexEmp()
    {    
        $leaveData = Leave::where('user_id',Auth::user()->id)->orderBy('id', 'asc')->paginate();
        return view('leave.index', compact('leaveData'));    
    }

    public function approve($id)
    {
        Leave::where('id',$id)->update(['status'=>1]);
        return 'approved';        
    }

    public function notapprove($id)
    {
        Leave::where('id',$id)->update(['status'=>0]);
        return 'approved';        
    }



    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
      $sort_by = $request->get('sortby');
      $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
      $leaveData = DB::table('Leaves')
                    ->where('id', 'like', '%'.$query.'%')
                    ->orwhere('leavetype', 'like', '%'.$query.'%')
                    ->orWhere('from', 'like', '%'.$query.'%')
                    ->orWhere('to', 'like', '%'.$query.'%')
                    ->orWhere('status', 'like', '%'.$query.'%')
                    
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);

      return view('leave.leave_data', compact('leaveData'))->render();
     }
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Leave.create');
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
            'leavetype' => 'required', 
            'from' => 'required',
            'to' => 'required',
            'status' => 'required',
            'user_id' => 'required'
        ));
        
        //step 2 Store data
        $leavesave = new Leave;
        
        //left side = database column name ----- right side = request name
        $leavesave->leavetype = $request->leavetype;
        $leavesave->from = $request->from;
        // dd($leavesave);
        $leavesave->to = $request->to;
        $leavesave->status = $request->status;
        $leavesave->user_id = $request->user_id;
        
        
        $leavesave->save();        
        
        //step 3 redirect to another page
        
        return redirect('dashboard');
        // dd($leavesave);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
