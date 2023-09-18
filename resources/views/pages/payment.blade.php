@extends('layouts.auth_app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="py-2">
                    <h2 class="card-title text-center">{{ __('Complete Payment') }}</h2>
                </div>
                
                <div class="card-body shadow py-4">
                    {{-- @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh payment invoice has been sent to your email address.') }}
                        </div>
                    @endif --}}

                    {{ __('Before proceeding, please check your email for the payment invoice.') }}
                    {{-- <p>If you want to choose another package <a href="/packages">Click Here</a></p> --}}
                    <div class="container py-4 d-flex justify-content-center">
                        <div class="card p-4 border-0 bg-secondary-subtle">
                            <div class="head">
                                {{-- @foreach ($invoices as $invoice) --}}
                                    <h3 class="text-center">INVOICE</h3>
                                    <p>Invoice #{{$invoice->invoice_no}}</p>
                                    <p>Date: {{$invoice->created_at}}</p>
                                </div>

                                <div class="card-body">
                                    {{-- <p class="card-text fw-semibold">Dear {{$user->name}},</p>
                                    <p>We have prepared the following invoice for you:</p>  --}}
                                    <table class="table">
                                        <thead>
                                            {{-- <th>Invoice no.</th> --}}
                                            <th>Package</th>
                                            <th>Description</th>
                                            <th>Duration</th>
                                            <th>Amount to pay(TZS)</th>
                                        </thead>
                                        <tbody>    
                                        
                                            <tr>
                                                {{-- <td>{{$invoice->invoice_no}}</td> --}}
                                                <td>{{$invoice->package}}</td>
                                                <td>{{$invoice->description}}</td>
                                                <td>{{$invoice->duration}} Months</td>
                                                <td>{{number_format($invoice->price)}}/=</td>
                                            </tr>   
                                        {{-- @endforeach         --}}
                                    </tbody>
                                </table>
                                {{-- <p>Duration: @if(isset($my_invoice)){{$my_invoice->id}} @endif</p> --}}    
                            </div>
    
                            <div><p class="fw-semibold">Pay on:</p>
                                <p class="fw-semibold">Halopesa: +255 623 088 187</p>
                                <p class="fw-semibold">Tigopesa: +255 713 779 149</p>
                                <p><strong>Name: Tumsifu Henry Lema</strong></p>
                            </div>
                                
                            <div class="foot text-center">
                                <p>Kind Regards,</p>
                                <p class="fw-semibold">SMART-VAT App</p>
                            </div>
                        </div>
                    
                    </div>
                    <div class="container mx-3">
                        <p>If you want to change package, <a href="/packages">Click here</a></p>
                        {{-- <form class="d-inline" method="POST" action="{{ route('verification.send') }}"> --}}
                            @csrf
                            <a href="/dashboard" class="btn btn-dark bg-gradient">Go to dashboard<i class="ms-2 fa fa-arrow-right"></i></a>
                            {{-- <button type="submit" class="btn btn-dark bg-gradient  m-2 align-baseline">{{ __('Click Here to Request Another') }}</button> --}}
                        {{-- </form> --}}
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
