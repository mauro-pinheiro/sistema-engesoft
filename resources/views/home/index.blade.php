@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            @include('home.partials.editions');
        </div>
        <div class="col-6">
            @include('home.partials.evaluations');
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @include('home.partials.submissions');
        </div>
    </div>
</div>
@endsection
