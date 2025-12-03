@php $title = "Create a user"; $segments = Request::segments();  @endphp
<x-app-layout>
    <div class="app-hero-header d-flex align-items-center m-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard') }}" title="Home">
                        <i class="ri-home-4-line me-1"></i> <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}" title="View all {{ $segments[1]}}">View all {{ $segments[1]}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create a {{ $segments[1]}}</li>
            </ol>
        </nav>
        
    </div>
    @include('layouts.alert')
    <div class="row gx-3 mt-3">
        <div class="col-lg-12 col-ms-12">
            <!-- Basic Input Fields Column -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-dark">Create new system user</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">First name:</label>
                                <input type="text" class="form-control" placeholder="Adesina" name="first_name" value="{{ old('first_name') }}" required>
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2 text-danger" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Last name:</label>
                                <input type="text" class="form-control" placeholder="Last name" name="last_name" value="{{ old('last_name') }}" required>
                                <x-input-error :messages="$errors->get('last_name')" class="mt-2 text-danger" />
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Email:</label>
                                <input type="email" class="form-control" placeholder="taiwo.adesina@expertlinksolutions.com" name="email" value="{{ old('email') }}" required readonly>
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                <div id="email-feedback" class="mt-2 text-danger" style="display: none;"></div>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Phone number:</label>
                                <input type="text" class="form-control" placeholder="Phone number" name="phone_number" value="{{ old('phone_number') }}" required  maxlength="11">
                                <x-input-error :messages="$errors->get('phone_number')" class="mt-2 text-danger" />
                                <div id="phone-feedback" class="mt-2" style="display: none;"></div>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label">Role name:</label>
                                <select data-placeholder="Select a role..." class="form-control select-icons" name="role" required>
                                    <option value="{{ old('role') }}"> {{ old('role') ?? ' -- Select a role --'}}</option>
                                    @foreach ($roles as $role)
                                        <option value="{{  $role->name }}" data-icon="telegram-logo">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('role')" class="mt-2 text-danger" />
                            </div>
                            
                        </div>
                    
                        <button type="submit" class="btn btn-primary" id="submit-btn" disabled>Create a User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const firstNameInput = document.querySelector('input[name="first_name"]');
        const lastNameInput = document.querySelector('input[name="last_name"]');
        const emailInput = document.querySelector('input[name="email"]');
        const phoneInput = document.querySelector('input[name="phone_number"]');
        const feedbackEmail = document.getElementById('email-feedback');
        const feedbackPhone = document.getElementById('phone-feedback');
        const submitBtn = document.getElementById('submit-btn');

        let isEmailValid = false;
        let isPhoneValid = false;

        function updateEmail() {
            const firstName = firstNameInput.value.trim();
            const lastName = lastNameInput.value.trim();
            if (firstName && lastName) {
                const cleanFirstName = firstName.replace(/\s+/g, '');
                const cleanLastName = lastName.replace(/\s+/g, '');
                const email = `${cleanFirstName}.${cleanLastName}@expertlinksolutions.com`;
                emailInput.value = email;
                checkEmailExists(email);
            }
        }

        async function checkEmailExists(email) {
            try {
                const response = await fetch("{{ route('check.email') }}", {
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

        async function checkPhoneNumber(phone) {
            try {
                const response = await fetch("{{ route('check.phone') }}", {
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

        function toggleSubmitButton() {
            submitBtn.disabled = !(isEmailValid && isPhoneValid);
        }

        firstNameInput.addEventListener('input', updateEmail);
        lastNameInput.addEventListener('input', updateEmail);

            phoneInput.addEventListener('input', function () {
                const phone = phoneInput.value.trim();
                if (phone.length >= 7) {
                    checkPhoneNumber(phone);
                } else {
                    phoneInput.classList.remove("is-valid", "is-invalid");
                    feedbackPhone.style.display = "none";
                    isPhoneValid = false;
                    toggleSubmitButton();
                }
            });
        });
    </script>

</x-app-layout>