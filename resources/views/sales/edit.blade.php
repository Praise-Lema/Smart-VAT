@extends('layouts.app')

@section('content')
@include('partials.sidebar')

<div class="container">
    <div class="row" style="margin-left: 21%">
        <div class="col">

            @livewire('edit-sales', ['sale' => $sale])
        </div>
    </div>
</div>
@endsection
