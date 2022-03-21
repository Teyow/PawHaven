@extends('layouts.master')
@section('title', '| Schedule a Visit')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="back">
                @if (Auth::user()->is_admin == 1)
                    <a href="#" class="text-gray-900" style="text-decoration: none;">
                        <i class="fas fa-chevron-left"></i> Back to results</a>
                @else
                    <a href="#" class="text-gray-900" style="text-decoration: none;">
                        <i class="fas fa-chevron-left"></i> Back to results</a>
                @endif

            </div>
        </div>
    </div>

@endsection
