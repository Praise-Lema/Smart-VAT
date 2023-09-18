@extends('layouts.app')

@section('content')
    @include('partials.sidebar')

    <div class="main-bar">
        <div class="container px-5">
            <div class="container bg-secondary-subtle p-4">
                <h1 class="text-center mb-4 text-dark">Profile</h1>

                <div class="container">
                    <div class="card shadow border-0">
                        <div class="card-header py-2">
                            <h2>Personal info:</h2>
                        </div>

                        <div class="card-body d-flex jusitfy-content-center align-items-center" style="width: 75%;">
                            <img src="{{$user->profile_pic ? asset('storage/'.$user->profile_pic): asset('assets/images/user-icon.png')}}" class="card-img-top mx-4 h-50 rounded-circle" style="width: 35%;" alt="">

                            <div class="">
                                <h2 class="card-title text-center">Username: {{$user->name}}</h2>
                                <h4 class="card-text text-center">Phone: {{$user->phone}}</h4>
                                <p class="card-text text-center">Email: {{$user->email}}</p>

                                <div class="container d-flex justify-content-center p-2">
                                    <a href="/profile/{{$user->id}}/edit" class="btn btn-outline-success mx-2">Update Profile</a>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="btn btn-outline-danger mx-2">Logout</a>
                                </div>
                            </div>       
                        </div>
                        
                        {{-- Company profile --}}
                        <div class="card-header py-2 mt-5">
                            <h2>Company Info:</h2>
                        </div>

                        <div class="card-body d-flex jusitfy-content-between align-items-center">
                            <img src="{{asset('assets/images/img2.png')}}" class="card-img-top h-50 rounded-circle" style="width: 40%;" alt="">

                            <div class="">
                                <h3 class="card-title text-center">Company Name: {{$company->name}}</h3>
                                <h5 class="card-text text-center">Address: {{$company->address}}</h5>
                                <p class="card-text text-center">Region: {{$company->region}}</p>

                                <div class="container d-flex justify-content-center p-2">
                                    <a href="/company/{{$company->id}}/edit" class="btn btn-outline-success mx-2">Update Company Profile</a>
                                </div>
                            </div>       
                        </div>
                    </div>
                </div>
            </div>                    
        </div>
    </div>
{{-- </div> --}}
@endsection