@extends('layouts.master')
@section('title', '| Charity')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 accent-color">Charity</h1>

        </div>

        <div class="container d-flex justify-content-center align-items-center">
            <div class="row">
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <div class="card mb-4 h-100" style="width: 18rem;">
                        <img class="card-img-top card-img-style" src="{{ asset('img/donate.jpg') }}" alt="">
                        <div class="card-body">
                            <h5 class="card-title pet-info-header">Make a Donation</h5>
                            <p class="card-text">Make our shelter animals happy by giving presents through in-kind donations and monetary donations to continuosly support the needs of our pets.</p>
                            <a href="{{ route('donate.index') }}" class="btn btn-accent-color">Donate</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <div class="card mb-4 h-100" style="width: 18rem;">
                        <img class="card-img-top card-img-style" src="{{ asset('img/volunteer.jpg') }}" alt="">
                        <div class="card-body">
                            <h5 class="card-title pet-info-header">Become a Volunteer</h5>
                            <p class="card-text">Work side by side with our organization and participate on the programs you want join to as this makes a huge impact in the lives of our animals at the shelter. </p>
                            <a href="{{ route('volunteer.index') }}" class="btn btn-accent-color">Volunteer</a>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>

@endsection
