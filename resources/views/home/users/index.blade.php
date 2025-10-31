@php $title = "View all users"; $segments = Request::segments();  @endphp
<x-app-layout>
    <div class="app-hero-header d-flex align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard') }}" title="Home">
                        <i class="ri-home-4-line me-1"></i> <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route(Route::current()->getName()) }}" title="{{ $segments[1]}}">{{ $segments[1]}}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.create') }}" title="Create a {{ $segments[1]}}">Create a {{ $segments[1]}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">View all {{ $segments[1]}}</li>
            </ol>
        </nav>
        
    </div>
    
    <div class="row gx-3 mt-2">
        <div class="col-lg-12 col-ms-12">
            @include('layouts.alert')
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">View All Users</h5>
                </div>
               
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="basicExample" class="table custom-table">
                          <thead>
                            <tr>
                                <th>S/N</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $num =1; @endphp
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $num }}</td>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>
                                        <span class="badge bg-success bg-opacity-10 text-success">{{$user->role}}</span>
                                    </td>
                                    <td>
                                        @if ($user->status == 1)
                                            <span class="badge bg-success bg-opacity-10 text-success">Active</span>
                                        @else
                                            <span class="badge bg-danger bg-opacity-10 text-danger">Suspended</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($user->status == 1)
                                            <a href="{{  route('user.suspend',$user->slug) }}" class="dropdown-item text-danger">
                                                <i class="ph-lock-key me-2"></i>
                                                Suspend 
                                            </a>
                                        @else 
                                            <a href="{{  route('user.unsuspend',$user->slug) }}" class="dropdown-item text-success">
                                                <i class="ph-checks me-2"></i>
                                                Activate
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @php $num++; @endphp
                            @endforeach
                        </tbody>
                        
                      </table>
                    </div>
                  </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>