@extends('layouts.app')

@section('content')
@include('partials.sidebar')

<div class="container">
    <div class="row" style="margin-left: 21%">
        <div class="col">

            @livewire('calculate-inputs')
        </div>
    </div>
</div>
@endsection
