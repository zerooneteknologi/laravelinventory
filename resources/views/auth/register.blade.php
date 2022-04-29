@include('partials.meta')

<title>Inventory | @yield('title', 'Register')</title>

<div class="auth-wrapper">
	<div class="auth-content text-center">
		<img src="{{ asset('assets/images/logo.png')}}" alt="" class="img-fluid mb-4">
		<div class="card borderless">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<h4 class="f-w-400">{{ __('Register') }}</h4>
						<hr>
						<form action="{{ route('register') }}" method="post">
							@csrf
							<div class="form-group mb-3">
								<input required name="name" autocomplete="name" value="{{ old('name') }}" autofocus type="text" class="form-control @error('name') is-invalid @enderror" id="Username" placeholder="Username">
								@error('name')
									<div id="validationServer03Feedback" class="invalid-feedback">
										{{ $message }}
									</div>
                                @enderror
							</div>
							<div class="form-group mb-3">
								<input required name="email" value="{{ old('email')}}" autocomplete="email" type="email" class="form-control" id="Email" placeholder="Email address">
								@error('email')
									<div id="validationServer03Feedback" class="invalid-feedback">
										{{ $message }}
									</div>
                                @enderror
							</div>
							<div class="form-group mb-4">
								<input required name="password" autocomplete="new-password" type="password" class="form-control @error('password') is-invalid @enderror" id="Password" placeholder="Password">
								@error('password')
									<div id="validationServer03Feedback" class="invalid-feedback">
										{{ $message }}
									</div>
                                @enderror
							</div>
							<div class="form-group mb-4">
								<input required name="password_confirmation" autocomplete="new-password" type="password" class="form-control @error('password') is-invalid @enderror" id="Password" placeholder="confirm password">
								@error('password_confirmation')
									<div id="validationServer03Feedback" class="invalid-feedback">
										{{ $message }}
									</div>
                                @enderror
							</div>
							<button type="submit" class="btn btn-primary btn-block mb-4"> {{ __('Register') }}</button>
							<hr>
							<p class="mb-2">Already have an account? <a href="/login" class="f-w-400">Login</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@include('partials.footer')
