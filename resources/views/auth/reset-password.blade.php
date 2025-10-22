<x-guest-layout>

    <form action="{{ route('password.store') }}" class="my-5" method="POST">
		@csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
		<div class="auth-box border border-dark">
			@include('layouts.logo')
			
			@php 
				$user = getInformation('users', 'email',$request->email, 'first');
			@endphp
			<h5 class="fw-light mb-5 lh-2">
                <b>Hello {{ $user->first_name. ' '. $user->last_name }}, Kindly fill the below form to update ypur password.</b>
            </h5>
			@include('layouts.alert')
			<div class="mb-3">
				<label class="form-label" for="name">Your Email <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="email" name="email" value="{{ $request->email }}" readonly autofocus autocomplete="email"
				placeholder="Enter your email" />
				<x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" style="color: red" />
			</div>
            <div class="mb-3">
				<label class="form-label" for="pwd">New Password <span class="text-danger">*</span></label>
				<input type="password" class="form-control" name="password" required autocomplete="new-password" id="pwd" placeholder="Enter new password" />
				<x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
			</div>

            <div class="mb-3">
				<label class="form-label" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
				<input type="password" class="form-control" name="password_confirmation" required autocomplete="current-password" id="password_confirmation" placeholder="Confirm password" />
				<x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
			</div>
           
			<div class="d-grid py-3 mt-3">
				<button type="submit" class="btn btn-lg btn-primary">
				Reset Password
				</button>
			</div>
        </div>
    </form>
    
</x-guest-layout>
