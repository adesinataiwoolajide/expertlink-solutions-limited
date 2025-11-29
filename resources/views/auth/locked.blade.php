@php  $title = 'Lock Screen'; @endphp
<x-guest-layout>
    
    <form action="{{ route('unlock') }}" class="my-5" method="POST">
        @csrf
        @php
            $user = Auth::user();
            $phone = $user->phone_number;
            $maskedPhone = substr($phone, 0, 4) . str_repeat('*', strlen($phone) - 6) . substr($phone, -4);
            $email = $user->email;
            $atPos = strpos($email, '@');
            $maskedEmail = substr($email, 0, 3) . '***' . substr($email, $atPos);
        @endphp
        <div class="auth-box border border-dark">
            @include('layouts.logo')
            <h5 class="fw-light mb-5 lh-2">
                <b>Dear {{ $user->first_name . ' '. $user->last_name }}, <b><br>Please confirm your identity by entering your password to continue.
            </h5>
            @include('layouts.alert')

            
            <div class="mb-3">
               
                <p><strong>Your Email:</strong> {{ $maskedEmail }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label" for="pwd">Your Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password" required autocomplete="current-password" id="pwd" placeholder="Enter password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
            </div>
            
            <div class="d-grid py-3 mt-3">
                <button type="submit" class="btn btn-lg btn-primary">Login</button>
            </div>
        </div>
    </form>
    
</x-guest-layout>
