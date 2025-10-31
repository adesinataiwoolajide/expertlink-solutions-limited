
<x-guest-layout>
	
	<form action="{{ route('login') }}" class="my-5" method="POST">
		@csrf
		<div class="auth-box border border-dark" style="width: ;">
			@include('layouts.logo')
			<h4 class="my-4">User Login</h4>
			@include('layouts.alert')
			<div class="mb-3">
				
				<label class="form-label" for="name">Your Email <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" required autofocus autocomplete="email"
				placeholder="Enter your email" />
				<x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" style="color: red" />
			</div>
			<div class="mb-3">
				<label class="form-label" for="pwd">Your Password <span class="text-danger">*</span></label>
				<input type="password" class="form-control" name="password" required autocomplete="current-password" id="pwd" placeholder="Enter password" />
				<x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
			</div>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check m-0">
					<input class="form-check-input" type="checkbox" value="" id="rememberPassword" name="remember" id="remember_me" />
					<label class="form-check-label" for="rememberPassword">Remember</label>
				</div>
				@if (Route::has('password.request'))
					<a href="{{ route('password.request') }}" class="text-primary text-decoration-underline">Forgot your password?</a>
				@endif
			</div>
			<div class="d-grid py-3 mt-3">
				<button type="submit" class="btn btn-lg btn-primary">
				LOGIN
				</button>
			</div>
			
			<div class="text-center pt-4">
				<span>Not registered?</span>
				<a href="/register" class="text-primary text-decoration-underline">
				SignUp</a>
			</div>
		</div>
	</form>
</x-guest-layout>
  
{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
