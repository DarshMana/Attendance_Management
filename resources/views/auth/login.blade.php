@extends('layouts.app')
@section('content')
     

    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 
    <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<div id="particles-js">
						<img src="images/img-01.png" alt="IMG">
					</div>
				</div>

                <form method="POST" class="login100-form" action="{{ route('login') }}">
                @csrf
				{{-- <form class="login100-form"> --}}
					<span class="login100-form-title">
						Admin and Employee Login
                    </span>
                    
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
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
                            {{ __('Login') }}
						</button>
					</div>

					<div class="text-center p-t-12">
                            @if (Route::has('password.request'))
                            <a class="txt2" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                             @endif
					</div>

				
				</form>
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