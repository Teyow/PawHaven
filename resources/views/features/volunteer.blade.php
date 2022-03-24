@extends('layouts.master')
@section('title', '| Program for Volunteers')
@section('content')


    <div class="container-fluid">

        <div class="back mb-4">
            <a href="{{ route('charity.index') }}" class="text-gray-900" style="text-decoration: none;">
                <i class="fas fa-chevron-left"></i> Back</a>

        </div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 accent-color">Programs for Volunteers</h1>
        </div>

        <div class="row row-cols-1 row-cols-md-3">

            @foreach ($programs as $program)
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('img/programs/' . $program->program_img) }}"
                            class="card-img-top card-img-style img-responsive" alt="Pet Image">
                        <div class="card-body">
                            <h5 class="card-title page-subheadings-500">{{ $program->program_title }}</h5>
                            <p class="card-text">{{ $program->program_desc }}</p>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('volunteer.show', $program->id) }}"
                                    class="btn btn-accent-color">Volunteer</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>






@endsection
