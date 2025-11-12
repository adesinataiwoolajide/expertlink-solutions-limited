<x-guest-layout>

    <form action="{{ route('register') }}" class="my-5" method="POST">
		@csrf
		<div class="auth-box border border-dark" style="width: ;">
			
            <a class="mb-4 d-flex">
                <img src="{{ asset('elsAdmin/images/els.png')}}" class="img-fluid login-logo" style="width: 40%; float: center;" />
            </a>
			<h4 class="my-4">Create an Account</h4>
			@include('layouts.alert')
            <div class="mb-3">
				<label class="form-label" for="name">Full Name <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="full_name" name="full_name" value="{{old('full_name')}}" required autofocus autocomplete="full_name"
				placeholder="Enter your full name" />
				<x-input-error :messages="$errors->get('full_name')" class="mt-2 text-danger" style="color: red" />
			</div>
             <div class="mb-3">
                <label class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" placeholder="taiwo.adesina@expertlinksolutions.com" name="email" value="{{ old('email') }}" required>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                <div id="email-feedback" class="mt-2 text-danger" style="display: none;"></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone number <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Phone number" name="phone_number" value="{{ old('phone_number') }}" required
                maxlength="11">
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2 text-danger" />
                <div id="phone-feedback" class="mt-2" style="display: none;"></div>
            </div>
			<div class="mb-3">
				<label class="form-label" for="pwd">Your Password <span class="text-danger">*</span></label>
				<input type="password" class="form-control" name="password" required autocomplete="current-password" id="pwd" placeholder="Enter password" />
				<x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
			</div>
            <div class="mb-3">
				<label class="form-label" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
				<input type="password" class="form-control" name="password_confirmation" required autocomplete="current-password" id="password_confirmation" placeholder="Confirm password" />
				<x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                <div id="password-match-feedback" class="mt-2 text-danger" style="display: none;"></div>
			</div>
			<div class="d-flex align-items-center justify-content-between">
				@if (Route::has('password.request'))
					<a href="{{ route('password.request') }}" class="text-primary text-decoration-underline">Forgot your password?</a>
				@endif
			</div>
			<div class="d-grid py-3 mt-3">
				<button type="submit" class="btn btn-lg btn-primary text-white" id="submit-btn" disabled>
				CREATE ACCOUNT
				</button>
			</div>
			
			<div class="text-center pt-4">
				<span>Already registered?</span>
				<a href="/login" class="text-primary text-decoration-underline">
				Login</a>
			</div>
		</div>
	</form>
    <div class="mb-3">
    <label class="form-label" for="full_name">Full Name <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name') }}" required autofocus autocomplete="name"
        placeholder="Enter your full name" />
    <div id="name-feedback" class="mt-2 text-danger" style="display: none;"></div>
    <x-input-error :messages="$errors->get('full_name')" class="mt-2 text-danger" style="color: red" />
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fullNameInput = document.getElementById('full_name');
        const emailInput = document.querySelector('input[name="email"]');
        const phoneInput = document.querySelector('input[name="phone_number"]');
        const password = document.getElementById('pwd');
        const confirmPassword = document.getElementById('password_confirmation');

        const feedbackName = document.getElementById('name-feedback');
        const feedbackEmail = document.getElementById('email-feedback');
        const feedbackPhone = document.getElementById('phone-feedback');
        const feedbackPassword = document.getElementById('password-match-feedback');
        const submitBtn = document.getElementById('submit-btn');

        let isNameValid = false;
        let isEmailValid = false;
        let isPhoneValid = false;
        let isPasswordValid = false;
        let debounceTimer;

        // Full name validation
        function validateFullName(name) {
            const parts = name.trim().split(/\s+/);
            return parts.length >= 2;
        }

        fullNameInput.addEventListener('input', function () {
            const name = fullNameInput.value.trim();
            if (validateFullName(name)) {
                fullNameInput.classList.remove("is-invalid");
                fullNameInput.classList.add("is-valid");
                feedbackName.style.display = "none";
                isNameValid = true;
            } else {
                fullNameInput.classList.add("is-invalid");
                fullNameInput.classList.remove("is-valid");
                feedbackName.textContent = "Please enter both first and last names.";
                feedbackName.style.display = "block";
                isNameValid = false;
            }
            toggleSubmitButton();
        });

        // Email validation
        async function checkEmailExists(email) {
            try {
                const response = await fetch("{{ route('Check.email') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ email })
                });
                const data = await response.json();
                if (data.exists) {
                    emailInput.classList.add("is-invalid");
                    emailInput.classList.remove("is-valid");
                    feedbackEmail.textContent = "This email already exists in the system.";
                    feedbackEmail.className = "mt-2 text-danger";
                    feedbackEmail.style.display = "block";
                    isEmailValid = false;
                } else {
                    emailInput.classList.remove("is-invalid");
                    emailInput.classList.add("is-valid");
                    feedbackEmail.textContent = "Email is available.";
                    feedbackEmail.className = "mt-2 text-success";
                    feedbackEmail.style.display = "block";
                    isEmailValid = true;
                }
                toggleSubmitButton();
            } catch (error) {
                console.error("Error checking email:", error);
            }
        }

        emailInput.addEventListener('input', function () {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                const email = emailInput.value.trim();
                if (email) checkEmailExists(email);
            }, 500);
        });

        // Phone number validation
        async function checkPhoneNumber(phone) {
            const digitsOnly = phone.replace(/\D/g, '');
            if (digitsOnly.length < 10) {
                phoneInput.classList.add("is-invalid");
                phoneInput.classList.remove("is-valid");
                feedbackPhone.textContent = "Phone number must be at least 10 digits.";
                feedbackPhone.className = "mt-2 text-danger";
                feedbackPhone.style.display = "block";
                isPhoneValid = false;
                toggleSubmitButton();
                return;
            }

            try {
                const response = await fetch("{{ route('Check.phone') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ phone_number: phone })
                });
                const data = await response.json();
                if (data.exists) {
                    phoneInput.classList.add("is-invalid");
                    phoneInput.classList.remove("is-valid");
                    feedbackPhone.textContent = "This phone number already exists in the system.";
                    feedbackPhone.className = "mt-2 text-danger";
                    feedbackPhone.style.display = "block";
                    isPhoneValid = false;
                } else {
                    phoneInput.classList.remove("is-invalid");
                    phoneInput.classList.add("is-valid");
                    feedbackPhone.textContent = "Phone number is available.";
                    feedbackPhone.className = "mt-2 text-success";
                    feedbackPhone.style.display = "block";
                    isPhoneValid = true;
                }
                toggleSubmitButton();
            } catch (error) {
                console.error("Error checking phone number:", error);
            }
        }

        phoneInput.addEventListener('input', function () {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                const phone = phoneInput.value.trim();
                checkPhoneNumber(phone);
            }, 500);
        });

        // Password match validation
        function validatePasswordMatch() {
            const pwd = password.value;
            const confirm = confirmPassword.value;

            if (pwd.length < 7) {
                feedbackPassword.textContent = 'Password must be at least 7 characters.';
                feedbackPassword.className = 'mt-2 text-danger';
                feedbackPassword.style.display = 'block';
                isPasswordValid = false;
            } else if (confirm === '') {
                feedbackPassword.style.display = 'none';
                isPasswordValid = false;
            } else if (pwd === confirm) {
                feedbackPassword.textContent = 'Passwords match.';
                feedbackPassword.className = 'mt-2 text-success';
                feedbackPassword.style.display = 'block';
                isPasswordValid = true;
            } else {
                feedbackPassword.textContent = 'Passwords do not match.';
                feedbackPassword.className = 'mt-2 text-danger';
                feedbackPassword.style.display = 'block';
                isPasswordValid = false;
            }

            toggleSubmitButton();
        }

        password.addEventListener('input', validatePasswordMatch);
        confirmPassword.addEventListener('input', validatePasswordMatch);

        // Final toggle logic
        function toggleSubmitButton() {
            submitBtn.disabled = !(isNameValid && isEmailValid && isPhoneValid && isPasswordValid);
        }
    });
</script>
</x-guest-layout>
