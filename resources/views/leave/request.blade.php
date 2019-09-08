@extends('layouts.app')

@section('content')

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
    

    {!! Form::open(['route' => 'leave.store']) !!}

    <h1 class="h4 mb-4">Apply for Leave</h1>


    <div class="form-group">
        <label for="leavetype">Select Leave Type</label>
        <select name="leavetype" class="form-control" id="leavetype">
          <option value="0">Casual Leave</option>
          <option value="1">Medical Leave test</option>
          <option value="2">Restricted Holiday(RH)</option>
        </select>
    </div>

    

    <div class="wrap-input100">
        <input id="from" name="from" type="date" placeholder="From Date" class="input100 form-control" required>
    </div>

    <div class="wrap-input100">
        <input id="to" name="to" type="date" placeholder="To Date " class="input100 form-control" required>
    </div>

    <div class="wrap-input100">
        <input id="status" name="status" type="hidden" value="0" class="input100 form-control">
    </div>

    <div class="wrap-input100">
    <input id="user_id" name="user_id" type="hidden"  value="{{Auth::user()->id}}" class="input100 form-control">
    </div>

   

{{-- 
    <div class="form-group green-border-focus">
        <label for="exampleFormControlTextarea5">
            Description
            </label>
        <textarea class="form-control" id="exampleFormControlTextarea5" rows="3"></textarea>
    </div> --}}



    <button type="submit" class="btn btn-dark">Apply</button>
    
</div></div></div>

    {!! Form::close() !!}


	
<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

@endsection