@extends('layouts.auth_app')

@section('content')

    <div class=" mt-2">
        <div class="row">
            <h1 class="text-center my-4">Packages</h1>
        </div>

        <div class="row">
            <h4 class="text-center text-secondary my-2">Choose your Company's/Business Package</h4>
        </div>

        <div class="row">
            {{-- Package card --}}
            <div class="d-flex flex-wrap justify-content-center mt-4 gap-3">
                    @foreach ($packages as $package)
                        <div class="card shadow bg-{{$package->color}}-subtle border-1" style="">
                            <div class="p-2 shadow-sm text-center">
                                <h1 class="card-title">{{$package->name}}</h1>
                            </div>
                            <div class="card-body px-4">
                                <h5 class="card-text py-2"><i class="fa-solid fa-circle-check me-2"></i>Number of companies: {{$package->company_no}}</h5>
                                <h5 class="card-text py-2"><i class="fa-solid fa-circle-check me-2"></i>Number of users: {{$package->users_no}}</h5>
                                <h5 class="card-text py-2"><i class="fa-solid fa-circle-check me-2"></i>Duration: {{$package->duration}} Months</h5>
                                <h2 class="card-text text-center pt-3">TZS {{number_format($package->price)}}/=</h2>
                            </div>

                            <div class="shadow p-3 text-center">
                                <form action="/packages/{{$package->id}}" method="POST">
                                    {{method_field('PUT')}}
                                    {{ csrf_field() }}
                                    <input type="submit" value="Subscribe" class="btn btn-dark bg-gradient form-control">
                                </form>
                            </div>
                        </div>
                    @endforeach                
            </div>    
        </div>
    </div>
    
@endsection