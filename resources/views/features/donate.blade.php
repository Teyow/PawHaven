@extends('layouts.master')
@section('title', '| Donation')

@section('content')

    <div class="container-fluid">

        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('charity.index') }}" class="text-gray-900" style="text-decoration: none;">
                <i class="fas fa-chevron-left"></i> Back</a>

            @if (Auth::user()->is_admin == 0)
                <a href="{{ route('donate.user', Auth::user()->id) }}"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-bookmark fa-sm text-white-50 mr-2"></i>My Donations</a>
            @else
                <a href="{{ route('donate.alldonations') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-bookmark fa-sm text-white-50 mr-2"></i>Donations</a>
            @endif


        </div>

        <div class="jumbotron jumbotron-fluid"
            style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('img/gallery/1.jpg'); background-size:cover;">
            <div class="container">
                <h1 class="display-4 text-white">Donation</h1>
                <p class="lead text-white">Please help and save our shelther animals through monetary or in-kind donations
                </p>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6 ">
                <div class="card rounded border-0 ">
                    <div class="card-body">
                        <h3 class="card-title page-subheadings-500">Donate via bank Transfer</h3>
                        <hr>
                        <p class="card-text">ACCOUNT NAME (FOR ALL BANKS BELOW):
                            <span class="accent-color font-weight-bold">Paws Haven</span>
                        </p>


                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h6 class="accent-color font-weight-bold">Bank of the Philippine Islands</h6>
                                <p>Account Number: 0000-201383</p>
                            </li>
                            <li class="list-group-item">
                                <h6 class="accent-color font-weight-bold">BDO Savings</h6>
                                <p>Account Number: 0000-1234-1234</p>
                            </li>
                            <li class="list-group-item">
                                <h6 class="accent-color font-weight-bold">Metrobank</h6>
                                <p>Account Number:928-8-23458920-0</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="card rounded border-0 ">
                    <div class="card-body">
                        <h3 class="card-title page-subheadings-500">In-kind Donations</h3>
                        <p class="card-text">Below is a list of items that our animal shelter need on a daily basis:
                        </p>

                        <!-- Collapsable Card Example -->
                        <div class="card mb-4">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold accent-color">For Pets</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse" id="collapseCardExample">
                                <div class="card-body">
                                    <div class="in-kind-donate">
                                        <i class="fas fa-check text-success mr-2"></i> Dog Food
                                    </div>

                                    <div class="in-kind-donate">
                                        <i class="fas fa-check text-success mr-2"></i> Cat Food
                                    </div>

                                    <div class="in-kind-donate">
                                        <i class="fas fa-check text-success mr-2"></i> Cages, crates
                                    </div>

                                    <div class="in-kind-donate">
                                        <i class="fas fa-check text-success mr-2"></i> Pet Diapers
                                    </div>

                                    <div class="in-kind-donate">
                                        <i class="fas fa-check text-success mr-2"></i> Chew Toys (Dog) & Scratching posts
                                        (Cat)
                                    </div>

                                    <div class="in-kind-donate">
                                        <i class="fas fa-check text-success mr-2"></i> Treats
                                    </div>

                                    <div class="in-kind-donate">
                                        <i class="fas fa-check text-success mr-2"></i> Leashes or collars
                                    </div>

                                    <div class="in-kind-donate">
                                        <i class="fas fa-check text-success mr-2"></i> Vaccines, medicines and vitamins
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Collapsable Card Example -->
                        <div class="card mb-4">
                            <!-- Card Header - Accordion -->
                            <a href="#collapsesCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="collapsesCardExample">
                                <h6 class="m-0 font-weight-bold accent-color">For the Shelter</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse" id="collapsesCardExample">
                                <div class="card-body">
                                    <div class="in-kind-donate">
                                        <i class="fas fa-check text-success mr-2"></i> Bath Towels
                                    </div>

                                    <div class="in-kind-donate">
                                        <i class="fas fa-check text-success mr-2"></i> Detergent Powder and Bleach
                                    </div>

                                    <div class="in-kind-donate">
                                        <i class="fas fa-check text-success mr-2"></i> Garbage Bags
                                    </div>

                                    <div class="in-kind-donate">
                                        <i class="fas fa-check text-success mr-2"></i> Door mats
                                    </div>

                                    <div class="in-kind-donate">
                                        <i class="fas fa-check text-success mr-2"></i> Cleaning Supplies (e.g. Mops and
                                        Brooms)
                                    </div>

                                    <div class="in-kind-donate">
                                        <i class="fas fa-check text-success mr-2"></i> Clinic Supplies (alcohol, cotton,
                                        etc.)
                                    </div>

                                    <div class="in-kind-donate">
                                        <i class="fas fa-check text-success mr-2"></i> Toilet paper
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
