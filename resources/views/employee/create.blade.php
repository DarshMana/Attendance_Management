@extends('layouts.app')
@section('content')
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					{{-- <img src="images/img-01.png" alt=""> --}}
				</div>

                {!! Form::open(['route' => 'employee.store']) !!}
				@csrf
					<span class="login100-form-title">
						<h1>Member registration</h1>
                    </span>




					<div class="form-group row">
						<label for="roleid" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>
						<div class="col-md-6">
							<select name="roleid" id="roleid" class="form-control">
								<option value="0">Admin</option>
								<option value="1">Employee</option>
							</select>
						</div>
					</div>

					

                    
					<div class="wrap-input100">
							<input id="name" type="text" placeholder="Enter your Name" class="input100 form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                            @if ($errors->has('name'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						<span class="symbol-input100">
							<i class="fas fa-user" aria-hidden="true"></i>
						</span>
					</div>


					<div class="wrap-input100">
							<input id="email" type="email" placeholder="Enter your Email" class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>



					<div class="wrap-input100">
						<input id="password" type="password" placeholder="Enter your password" class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
						<span class="symbol-input100">
							<i class="fas fa-key" aria-hidden="true"></i>
						</span>
					</div>


					<div class="wrap-input100">
						<input id="password-confirm" placeholder="Re-type your password" type="password" class="input100 form-control" name="password_confirmation" required>
						<span class="symbol-input100">
							<i class="fas fa-key" aria-hidden="true"></i>
						</span>
					</div>   

					<div class="form-group row">
						<label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label><br>
						<div class="col-md-6">
							Male : <input type="radio" name="gender" value="male"><br>
							Female : <input type="radio" name="gender" value="female"><br>
						</div>
					</div>





					<div class="form-group row">
						<label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

						<div class="col-md-6">
							<input id="mobile" type="text" placeholder="07x-xxx xxxx" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" required autofocus>
						</div>
					</div>

					<div class="wrap-input100">
						<input id="city" name="city" type="text" placeholder="Enter your City" class="input100 form-control" required>
					</div>

					<div class="wrap-input100">
							<h6>Birthday</h6>
						<input id="bdate" name="bdate" type="date" placeholder="Enter your birthdate" class="input100 form-control" required>
					</div>

					<div class="wrap-input100">
							<h6>Works Start Date</h6>
						<input id="workstart" name="workstart" type="date" placeholder="Works Start Date" class="input100 form-control" required>
					</div>





					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
								{{ __('Register') }}
						</button>
					</div>

					
				{!! Form::close() !!}


			</div>
		</div>
	</div>
	
	

	
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