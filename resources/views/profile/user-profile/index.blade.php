@extends('layouts.home')

@push('head')
    <link href="{{ asset('css/profile/user-profile.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('title', 'Моят Профил')

@section('content')
    <div class="col-xl d-none d-lg-block pt-md-5 mt-md-4 tab-content edit-content-admin">

    </div>
@endsection
