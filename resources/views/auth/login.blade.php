<x-guest-layout>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
	<form action="{{ route('login') }}" class="my-5" method="POST">
		@csrf
		<div class="auth-box border border-dark">
			@include('layouts.logo')
			<h4 class="my-4">User Login</h4>
			@include('layouts.alert')

			<div class="mb-3">
				<label class="form-label" for="email">Your Email <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email"
					placeholder="Enter your email" />
				<x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
			</div>

			<div class="mb-3">
				<label class="form-label" for="pwd">Your Password <span class="text-danger">*</span></label>
				<input type="password" class="form-control" name="password" required autocomplete="current-password" id="pwd" placeholder="Enter password" />
				<x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
			</div>

			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check m-0">
					<input class="form-check-input" type="checkbox" name="remember" id="remember_me" />
					<label class="form-check-label" for="remember_me">Remember</label>
				</div>
				@if (Route::has('password.request'))
					<a href="{{ route('password.request') }}" class="text-primary text-decoration-underline">Forgot your password?</a>
				@endif
			</div>

			<div class="d-grid py-3 mt-3">
				<button type="submit" class="btn btn-lg btn-primary">LOGIN</button>
			</div>

			<div class="text-center pt-4">
				<span>Not registered?</span>
				<a href="/register" class="text-primary text-decoration-underline">SignUp</a>
			</div>

			<div class="text-center pt-4">
				<p>Or login with:</p>

				<a href="{{ route('auth.google') }}" class="btn btn-outline-danger mx-1">
					<i class="fab fa-google me-2"></i> Google
				</a>

				{{-- <a href="{{ route('auth.facebook') }}" class="btn btn-outline-primary mx-1">
					<i class="fab fa-facebook me-2"></i> Facebook
				</a> --}}

				<a href="{{ route('auth.github') }}" class="btn btn-outline-dark mx-1">
					<i class="fab fa-github me-2"></i> GitHub
				</a>

				<a href="{{ route('auth.twitter') }}" class="btn btn-outline-info mx-1">
					<i class="fab fa-twitter me-2"></i> Twitter
				</a>
			</div>
		</div>
	</form>
</x-guest-layout>