@extends('layouts.master')
@section('title', '| Schedule a Visit')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="back">
                @if (Auth::user()->is_admin == 1)
                    <a href="{{ route('visitation.index') }}" class="text-gray-900" style="text-decoration: none;">
                        <i class="fas fa-chevron-left"></i> Back </a>
                @else
                    <a href="{{ route('visitation.index') }}" class="text-gray-900" style="text-decoration: none;">
                        <i class="fas fa-chevron-left"></i> Back </a>
                @endif

            </div>
        </div>

        <h3 class="page-subheadings-500">Schedule a visit to the shelter</h3>
        <div class="row mt-4 d-flex justify-content-center align-items-center">
            <div class="col-xl-11 col-lg-11 col-md-12 col-sm-12">
                <div id="calendar"></div>

                <script src="{{ asset('js/schedulevisit.js') }}">
                </script>
            </div>
        </div>
    </div>
@endsection
