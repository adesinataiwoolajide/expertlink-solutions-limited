<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <form action="<?php echo e(route('createAccount')); ?>" class="my-5" method="POST">
		<?php echo csrf_field(); ?>
		<div class="auth-box border border-dark" style="width: ;">
			<?php echo $__env->make('layouts.logo', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
			<h4 class="my-4">Create an Account</h4>
			<?php echo $__env->make('layouts.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <div class="mb-3">
				<label class="form-label" for="name">Full Name <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo e(old('full_name')); ?>" required autofocus autocomplete="full_name"
				placeholder="Enter your full name" />
				<?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('full_name'),'class' => 'mt-2 text-danger','style' => 'color: red']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('full_name')),'class' => 'mt-2 text-danger','style' => 'color: red']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
			</div>
             <div class="mb-3">
                <label class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" placeholder="taiwo.adesina@expertlinksolutions.com" name="email" value="<?php echo e(old('email')); ?>" required>
                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('email'),'class' => 'mt-2 text-danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('email')),'class' => 'mt-2 text-danger']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                <div id="email-feedback" class="mt-2 text-danger" style="display: none;"></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone number <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Phone number" name="phone_number" value="<?php echo e(old('phone_number')); ?>" required
                maxlength="11">
                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('phone_number'),'class' => 'mt-2 text-danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('phone_number')),'class' => 'mt-2 text-danger']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                <div id="phone-feedback" class="mt-2" style="display: none;"></div>
            </div>
			<div class="mb-3">
				<label class="form-label" for="pwd">Your Password <span class="text-danger">*</span></label>
				<input type="password" class="form-control" name="password" required autocomplete="current-password" id="pwd" placeholder="Enter password" />
				<?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('password'),'class' => 'mt-2 text-danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('password')),'class' => 'mt-2 text-danger']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
			</div>
            <div class="mb-3">
				<label class="form-label" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
				<input type="password" class="form-control" name="password_confirmation" required autocomplete="current-password" id="password_confirmation" placeholder="Confirm password" />
				<?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('password_confirmation'),'class' => 'mt-2 text-danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('password_confirmation')),'class' => 'mt-2 text-danger']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                <div id="password-match-feedback" class="mt-2 text-danger" style="display: none;"></div>
			</div>
			<div class="d-flex align-items-center justify-content-between">
				<?php if(Route::has('password.request')): ?>
					<a href="<?php echo e(route('password.request')); ?>" class="text-primary text-decoration-underline">Forgot your password?</a>
				<?php endif; ?>
			</div>
			<div class="d-grid py-3 mt-3">
				<button type="submit" class="btn btn-lg btn-primary text-white" id="submit-btns">
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
                const response = await fetch("<?php echo e(route('Check.email')); ?>", {
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
                const response = await fetch("<?php echo e(route('Check.phone')); ?>", {
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

        // Password match & progressive validation
        function validatePasswordMatch() {
            const pwd = password.value;
            const confirm = confirmPassword.value;

            const hasUppercase = /[A-Z]/.test(pwd);
            const hasNumber = /\d/.test(pwd);
            const hasSpecial = /[!@#$%^&*()_\-+=<>?{}[\]~]/.test(pwd);
            const hasLength = pwd.length >= 7;

            let messages = [];

            if (!hasLength) messages.push("At least 7 characters");
            if (!hasUppercase) messages.push("At least 1 uppercase letter");
            if (!hasNumber) messages.push("At least 1 number");
            if (!hasSpecial) messages.push("At least 1 special character");

            if (messages.length > 0) {
                feedbackPassword.textContent = "Missing: " + messages.join(", ");
                feedbackPassword.className = 'mt-2 text-danger';
                feedbackPassword.style.display = 'block';
                isPasswordValid = false;
            } else if (confirm === '') {
                feedbackPassword.textContent = 'Please confirm your password.';
                feedbackPassword.className = 'mt-2 text-warning';
                feedbackPassword.style.display = 'block';
                isPasswordValid = false;
            } else if (pwd === confirm) {
                feedbackPassword.textContent = 'Passwords match and meet all requirements.';
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/auth/register.blade.php ENDPATH**/ ?>