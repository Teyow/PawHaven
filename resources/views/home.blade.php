@extends('layouts.master')

@if (Auth::user()->is_admin == 1)
    @section('title', '| Dashboard')
@else
    @section('title', '| Adopt a Pet')
@endif


@section('content')
    <div class="container-fluid">

        @if (Auth::user()->is_admin == 1)
            @include('features.dashboard')
        @else
            @include('features.adopt')
        @endif

    </div>
@endsection
