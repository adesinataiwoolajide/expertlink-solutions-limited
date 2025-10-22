<x-guest-layout>
    
	<form action="{{ route('password.email') }}" class="my-5" method="POST">
		@csrf
		<div class="auth-box border border-dark">
			@include('layouts.logo')
			<h5 class="fw-light mb-5 lh-2">
                In order to access your account, please enter the email id you
                provided during the registration process.
            </h5>
			@include('layouts.alert')
			<div class="mb-3">
				<label class="form-label" for="name">Your Email <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" required autofocus autocomplete="email"
				placeholder="Enter your email" />
				<x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" style="color: red" />
			</div>
            <div class="d-flex align-items-center justify-content-between">
				<div class="form-check m-0">
					
				</div>
				@if (Route::has('password.request'))
					<a href="login" class="text-primary text-decoration-underline">Remember your password?</a>
				@endif
			</div>
			<div class="d-grid py-3 mt-3">
				<button type="submit" class="btn btn-lg btn-primary">
				Email Password Reset Link
				</button>
			</div>
        </div>
    </form>
    
</x-guest-layout>
