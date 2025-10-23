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
    <div class="row gx-3 mt-4">
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
                                <input type="email" class="form-control" placeholder="adesina@gmail.com" name="email" value="{{ old('email') }}" required>
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Phone number:</label>
                                <input type="text" class="form-control" placeholder="Phone number" name="phone_number" value="{{ old('phone_number') }}" required>
                                <x-input-error :messages="$errors->get('phone_number')" class="mt-2 text-danger" />
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
                    
                        <button type="submit" class="btn btn-primary">Create a User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>