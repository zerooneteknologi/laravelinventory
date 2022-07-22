@include('partials.meta')

<title>Inventory | @yield('title', 'Login')</title>

<div class="auth-wrapper">
	<div class="auth-content text-center">
		<img src="{{ asset('assets/images/Logo-Abadimas.png') }}" alt="" class="img-fluid mb-4">
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">
					<div class="card-body">
						<h4 class="mb-3 f-w-400">{{ __('Login') }}</h4>
						<hr>
						<form action="" method="post">
							@csrf

							<div class="form-group mb-3">
								<input name="email" value="{{ old('email')}}" required autocomplete="email" autofocus type="email" class="form-control @error('email') is-invalid @enderror" id="Email" placeholder="Email address">
								@error('email')
								<div id="validationServer03Feedback" class="invalid-feedback">
									{{ $message }}
								</div>
                                @enderror
							</div>
							<div class="form-group mb-4">
								<input required name="password" autocomplete="current-password" type="password" class="form-control @error('password') is-invalid @enderror" id="Password" placeholder="Password">

								@error('password')
								<div id="validationServer03Feedback" class="invalid-feedback">
									{{ $message }}
								</div>
                                @enderror

							</div>
							<div class="custom-control custom-checkbox text-left mb-4 mt-2">
								<input name="remember" type="checkbox" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
								<label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
							</div>
							<button type="submit" class="btn btn-block btn-primary mb-4">{{ __('Login') }}</button>
							<hr>
							<p class="mb-2 text-muted">@if (Route::has('password.request'))
								<a class="f-w-400" href="{{ route('password.request') }}">
									{{ __('Forgot Your Password?') }}
								</a>
							@endif</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('partials.footer')
