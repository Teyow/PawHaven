@extends('layouts.master')
@section('title', '| Schedule a Visit')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="back">
                @if (Auth::user()->is_admin == 1)
                    <a href="{{ route('adoption.show', $pets->id) }}" class="text-gray-900"
                        style="text-decoration: none;">
                        <i class="fas fa-chevron-left"></i> Back </a>
                @else
                    <a href="{{ route('adoption.show', $pets->id) }}" class="text-gray-900"
                        style="text-decoration: none;">
                        <i class="fas fa-chevron-left"></i> Back </a>
                @endif

            </div>
        </div>

        <h3 style="color: #7EC8DF; font-weight: 500;">Schedule a visit to the shelter</h3>
        <div class="row mt-4">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="card">
                    <?php
                    foreach ($petprofiles as $profiles) {
                        $json = $profiles->pet_image;
                        $json = json_decode($json);
                    
                        $firstImage = $json[0];
                    }
                    
                    ?>
                    <img class="card-img-top" src="{{ asset('/pet/' . $pets->id . '/' . $firstImage) }}"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 style="color: #7EC8DF; font-weight: 600;" class=" pet-info-header">{{ $pets->name }}</h5>
                        <div class="row">
                            <div class="col-10">
                                <div class="pet-info-content">
                                    {{ $pets->breed }}
                                </div>
                                <div class="pet-info-content">
                                    {{ $pets->gender }}, {{ $pets->stage }}, {{ $pets->age }} {{ $pets->unit }}
                                </div>
                            </div>
                            <div class="col-2 side-icon d-flex justify-content-center align-items-end">
                                @if ($pets->type == 'Dog')
                                    <i class="fas fa-paw pet-icon"> </i>
                                @else
                                    <i class="fas fa-cat pet-icon"></i>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                insert calendar here
            </div>
        </div>
    </div>

@endsection
