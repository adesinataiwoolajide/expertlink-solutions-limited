@php $title = "View all Students"; $segments = Request::segments();  @endphp
<x-app-layout>
    <div class="app-hero-header d-flex align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard') }}" title="Home">
                        <i class="ri-home-4-line me-1"></i> <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">View all Students</li>
            </ol>
        </nav>
        
    </div>
    
    <div class="row gx-3 mt-3">
        <div class="col-lg-12 col-ms-12">
            @include('layouts.alert')
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">View All Our Students</h5>
                </div>
               
                  <div class="card-body">
                    <div class="table-responsive">
                       <table id="basicExample" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    @if(Auth::user()->hasAnyRole(['Administrator', 'Admin']))
                                        <th>Phone Number</th>
                                        <th class="text-center">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                
                                @php $num =1; @endphp
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $num }}</td>
                                        <td>{{$user->first_name . " ".$user->last_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if ($user->status == 1)
                                                <span class="badge bg-success bg-opacity-10 text-success">Active</span>
                                            @else
                                                <span class="badge bg-danger bg-opacity-10 text-danger">Suspended</span>
                                            @endif
                                        </td>
                                        @if(Auth::user()->hasAnyRole(['Administrator', 'Admin']))
                                            <td>{{$user->phone_number}}</td>
                                            <td class="text-center">
                                                <a href="{{  route('user.show',$user->slug) }}" class="dropdown-item text-success">
                                                    <span class="badge bg-info"> View </span>
                                                </a>
                                            </td>
                                        @endif
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