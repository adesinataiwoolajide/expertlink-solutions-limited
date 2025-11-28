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
                <li class="breadcrumb-item"><a href="{{ route('user.create') }}" title="Create a {{ $segments[1]}}">Create a {{ $segments[1]}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">View {{ ucwords($user->email) }} Profile</li>
            </ol>
        </nav>
        
    </div>
    @include('layouts.alert')
    <div class="row gx-3">
        <div class="col-xxl-4 col-sm-12">

            <!-- Profile Info -->
            <div class="card mb-3">
                <div class="card-body text-center p-4">
                    <div class="position-relative mb-4">
                        <div class="bg-primary-subtle rounded-top position-absolute top-0 start-0 end-0 p-4"></div>
                        <div class="img-5x position-relative m-auto">
                            <svg width="100" height="100" class="img-5x rounded-circle border border-4 border-white shadow-sm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" role="img" aria-label="User Avatar">
                                <circle cx="50" cy="50" r="48" fill="#cccccc" />
                                <text x="50%" y="54%" text-anchor="middle" fill="#ffffff" font-size="28" font-family="Arial" dy=".3em">U</text>
                            </svg>
                            <span class="position-absolute bottom-0 end-0 bg-success rounded-circle p-2 border border-2 border-white"></span>
                        </div>

                    </div>
                    <h4 class="fw-bold mb-1">{{ $user->first_name . ' '. $user->last_name  ?? ''}}</h4>
                    <p class="text-muted mb-3"><i class="ri-award-fill text-warning me-1"></i>{{ $user->role ?? ''}}  </p>
                    
                    {{-- <div class="d-flex justify-content-center gap-3 mb-4">
                        <a href="#" class="icon-box sm bg-primary-subtle text-primary rounded-circle"><i
                            class="ri-linkedin-fill"></i></a>
                        <a href="#" class="icon-box sm bg-info-subtle text-info rounded-circle"><i
                            class="ri-twitter-fill"></i></a>
                        <a href="#" class="icon-box sm bg-danger-subtle text-danger rounded-circle"><i
                            class="ri-instagram-line"></i></a>
                        <a href="#" class="icon-box sm bg-success-subtle text-success rounded-circle"><i
                            class="ri-whatsapp-line"></i></a>
                    </div> --}}
                    
                    {{-- <div class="border-top pt-4">
                        <div class="row text-center g-0">
                            <div class="col-4">
                                <h5 class="fw-bold mb-1">245</h5>
                                <p class="small text-muted mb-0">Students</p>
                            </div>
                            <div class="col-4 border-start border-end">
                                <h5 class="fw-bold mb-1">48</h5>
                                <p class="small text-muted mb-0">Courses</p>
                            </div>
                            <div class="col-4">
                                <h5 class="fw-bold mb-1">12K</h5>
                                <p class="small text-muted mb-0">Activities</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="d-grid gap-3 m-4">
                    <div class="d-flex align-items-center">
                        <div class="icon-box sm bg-primary-subtle rounded-circle text-primary me-3 shadow-sm">
                            <i class="ri-map-pin-line"></i>
                        </div>
                        <div>
                            <span class="text-body-secondary small">Full Name</span>
                            <p class="mb-0 fw-medium">{{ $user->first_name . ' '. $user->last_name  ?? ''}}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="icon-box sm bg-info-subtle rounded-circle text-info me-3 shadow-sm">
                            <i class="ri-mail-line"></i>
                        </div>
                        <div>
                            <span class="text-body-secondary small">Email</span>
                            <p class="mb-0 fw-medium">
                                <a href="mailto:{{ $user->email}}"
                                class="text-decoration-none hover-text-primary">{{ $user->email}}</a>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="icon-box sm bg-success-subtle rounded-circle text-success me-3 shadow-sm">
                            <i class="ri-phone-line"></i>
                        </div>
                        <div>
                            <span class="text-body-secondary small">Phone</span>
                            <p class="mb-0 fw-medium">
                                <a href="tel:+{{ $user->phone_number}}" class="text-decoration-none hover-text-primary">{{ $user->phone_number}}</a>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="icon-box sm bg-warning-subtle rounded-circle text-warning me-3 shadow-sm">
                            <i class="ri-calendar-line"></i>
                        </div>
                        <div>
                            <span class="text-body-secondary small">Joined</span>
                            <p class="mb-0 fw-medium">{{ $user->created_at}}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent py-3">
                    <div class="d-flex justify-content-around">
                        {{-- <a href="#" class="text-primary text-center small d-flex flex-column align-items-center">
                            <i class="ri-edit-line d-block mb-1 fs-5"></i>
                            Edit
                        </a>
                        <a href="#" class="text-primary text-center small d-flex flex-column align-items-center">
                            <i class="ri-settings-4-line d-block mb-1 fs-5"></i>
                            Course Alocation
                        </a> --}}
                        @if (Auth::user()->hasAnyRole(['Administrator', 'Admin']))
                            @if ($user->status == 1)
                                <a href="{{ route('user.suspend', $user->slug) }}" class="text-danger text-center small d-flex flex-column align-items-center">
                                    <i class="ri-lock-line d-block mb-1 fs-5"></i>
                                    Suspend
                                </a>
                            @else
                                <a href="{{ route('user.unsuspend', $user->slug) }}" class="text-success text-center small d-flex flex-column align-items-center">
                                    <i class="ri-check-line d-block mb-1 fs-5"></i>
                                    Activate
                                </a>
                            @endif
                        @endif

                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-xxl-8 col-sm-12">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title">{{ $user->first_name . ' '. $user->last_name}}</h5>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="bordered-tabs" role="tablist">
                            <li class="nav-item ms-3" role="presentation">
                                <button class="nav-link active px-4 py-2" id="tab-one-tab" data-bs-toggle="tab"
                                data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one"
                                aria-selected="true">
                                Edit Profile
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link px-4 py-2" id="tab-two-tab" data-bs-toggle="tab"
                                data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two"
                                aria-selected="false">
                                Security
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link px-4 py-2" id="tab-three-tab" data-bs-toggle="tab"
                                data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three"
                                aria-selected="false">
                                Activity Log
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content border border-primary rounded p-4" id="bordered-tabs-content">
                            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one-tab">
                                <form action="{{ route('user.update',$user->slug) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="slug" value="{{ $user->slug ?? '' }}">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">First name:</label>
                                            <input type="text" class="form-control" placeholder="Adesina" name="first_name" value="{{ old('first_name') ?? $user->first_name }}" required>
                                            <x-input-error :messages="$errors->get('first_name')" class="mt-2 text-danger" />
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Last name:</label>
                                            <input type="text" class="form-control" placeholder="Last name" name="last_name" value="{{ old('last_name') ?? $user->last_name }}" required>
                                            <x-input-error :messages="$errors->get('last_name')" class="mt-2 text-danger" />
                                        </div>
                                        
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">Phone number:</label>
                                            <input type="text" class="form-control" placeholder="Phone number" name="phone_number" value="{{ old('phone_number') ?? $user->phone_number }}" required>
                                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2 text-danger" />
                                            <div id="phone-feedback" class="mt-2" style="display: none;"></div>
                                        </div>

                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">Email:</label>
                                            <input type="email" class="form-control" placeholder="taiwo.adesina@expertlinksolutions.com" name="email" value="{{ old('email') ?? $user->email}}" required
                                            @unless(Auth::user()->hasAnyRole(['Administrator'])) readonly @endunless
                                            >
                                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                            <div id="email-feedback" class="mt-2 text-danger" style="display: none;"></div>
                                        </div>

                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">Role name:</label>
                                            <select data-placeholder="Select a role..." class="form-control select-icons" name="role" required>
                                                <option value="{{ old('role') ?? $user->role}}"> {{ old('role') ?? $user->role }}</option>
                                                <option value=""></option>
                                                @if(Auth::user()->hasAnyRole(['Administrator']))
                                                    @foreach ($roles as $role)
                                                        <option value="{{  $role->name }}" data-icon="telegram-logo">{{ $role->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <x-input-error :messages="$errors->get('role')" class="mt-2 text-danger" />
                                        </div>
                                        
                                    </div>
                                
                                    <button type="submit" class="btn btn-primary">Update Information</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two-tab">
                                 <form action="{{ route('changingPassword', [$user->slug]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="slug" value="{{ $user->slug ?? '' }}">

                                    <div class="row">
                                        {{-- Email Field --}}
                                        <div class="mb-3 col-md-{{ Auth::user()->hasAnyRole(['Administrator']) ? '12' : '6' }}">
                                            <label class="form-label">Email:</label>
                                            <input type="email" class="form-control" placeholder="*****" name="email" value="{{ $user->email }}" readonly>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                        </div>

                                        {{-- Old Password (for non-admins only) --}}
                                        @unless (Auth::user()->hasAnyRole(['Administrator']))
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Old Password:</label>
                                                <input type="password" class="form-control" placeholder="*****" name="old_password" required>
                                                <x-input-error :messages="$errors->get('old_password')" class="mt-2 text-danger" />
                                            </div>
                                        @endunless

                                        {{-- New Password --}}
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">New Password:</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="*****" required>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                                        </div>

                                        {{-- Confirm New Password --}}
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Confirm New Password:</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="*****" required>
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                                            <div id="password-match-feedback" class="mt-2 text-danger" style="display: none;"></div>
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        {{ Auth::user()->hasAnyRole(['Administrator']) ? 'Change User Password' : 'Change Password' }}
                                        <i class="ph-paper-plane-tilt ms-2"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three-tab">
                                <h5>User Activity Logs</h5>
                                <div class="table-responsive">
                                    <table id="basicExample" class="table custom-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                            
                                                <th>Activity</th>
                                                <th>IP Address</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($logs as $log)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $log->activities }}</td>
                                                    <td>{{ $log->ip_address }}</td>
                                                    <td>{{ $log->created_at->format('d M Y H:i') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Pagination -->
                                <div class="d-flex justify-content-center">
                                    {{ $logs->links() }}
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('password_confirmation');
            const feedback = document.getElementById('password-match-feedback');

            function validatePasswordMatch() {
                const pwd = password.value;
                const confirm = confirmPassword.value;

                if (pwd.length < 7) {
                    feedback.textContent = 'Password must be at least 7 characters.';
                    feedback.className = 'mt-2 text-danger';
                    feedback.style.display = 'block';
                    return;
                }

                if (confirm === '') {
                    feedback.style.display = 'none';
                    return;
                }

                if (pwd === confirm) {
                    feedback.textContent = 'Passwords match.';
                    feedback.className = 'mt-2 text-success';
                } else {
                    feedback.textContent = 'Passwords do not match.';
                    feedback.className = 'mt-2 text-danger';
                }

                feedback.style.display = 'block';
            }

            password.addEventListener('input', validatePasswordMatch);
            confirmPassword.addEventListener('input', validatePasswordMatch);
        });
    </script>
    
</x-app-layout>