@extends('layouts.master')
@section('title', '| View Pet')
@section('content')

    <div class="container-fluid mb-5">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="back">
                @if (Auth::user()->is_admin == 1)
                    <a href="{{ route('adoption.index') }}" class="text-gray-900" style="text-decoration: none;">
                        <i class="fas fa-chevron-left"></i> Back</a>
                @else
                    <a href="{{ route('home') }}" class="text-gray-900" style="text-decoration: none;">
                        <i class="fas fa-chevron-left"></i> Back</a>
                @endif

            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <h3 style="color: #7EC8DF; font-weight: 600;">Meet {{ $pets->name }}</h3>
            <a href="{{ route('adoption.edit', $pets->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                class="fas fa-edit fa-sm text-white-50"></i> Edit Pet</a>
        </div>

     

        <!--LEFT PANEL -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-0 mb-3">

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($petprofiles as $profiles)
                            @foreach (json_decode($profiles->pet_image) as $petimage)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                                    class="{{ $loop->first ? 'active' : '' }}"></li>
                            @endforeach
                        @endforeach

                    </ol>
                    <div class="carousel-inner">

                        <?php
                        //foreach ($petprofiles as $profiles) {
                        //    $json = $profiles->pet_image;
                        //    $json = json_decode($json);
                        //
                        //    $firstImage = $json[0];
                        //}
                        //
                        ?>

                        @foreach ($petprofiles as $profiles)
                            @foreach (json_decode($profiles->pet_image) as $petimage)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <img class="d-block w-md-100 w-lg-100 w-lg-100 w-sm-0 img-sm-fluid mx-auto"
                                        src="{{ asset('pet/' . $profiles->pet_id . '/' . $petimage) }}" alt="Pet Image"
                                        style="object-fit:contain;" height=450>
                                </div>
                            @endforeach
                        @endforeach


                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="fa fa-chevron-left fa-lg" style="color: #7EC8DF"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="fa fa-chevron-right fa-lg" style="color: #7EC8DF"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="d-flex justify-content-center align-items-center mb-4 mt-4">
                    <a href="/adoption/{{ $pets->id }}/schedule" type="button"
                        class="btn rounded btn-sm mr-3 btn-accent-color">Schedule a
                        Visit</a>

                </div>

            </div>

            <!-- RIGHT PANEL -->
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <h3 style="color: #7EC8DF; font-weight: 600;" class=" pet-info-header">{{ $pets->name }}</h3>
                <div class="d-flex justify-content-between pet-info-header" style="border-bottom: 1px solid #7EC8DF;">
                    <p> {{ $pets->breed }}</p>
                    <p> ID #{{ $pets->id }}</p>
                </div>

                <div class="row">
                    <div class="col-4 mt-3">
                        <div class="pet-info">
                            <div class="pet-info-heading"> Age</div>
                            <div class="pet-info-content">
                                {{ $pets->stage }}, {{ $pets->age }} {{ $pets->unit }}
                            </div>
                        </div>
                    </div>

                    <div class="col-4 mt-3">
                        <div class="pet-info">
                            <div class="pet-info-heading">
                                Gender </div>
                            <div class="pet-info-content">
                                {{ $pets->gender }}
                            </div>
                        </div>
                    </div>

                    <div class="col-4 mt-3">
                        <div class="pet-info">
                            <div class="pet-info-heading"> Size</div>
                            <div class="pet-info-content">
                                {{ $petprofiles[0]['size'] }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 mt-3">
                        <div class="pet-info">
                            <div class="pet-info-heading">
                                Color </div>
                            <div class="pet-info-content">
                                {{ $petprofiles[0]['color'] }}
                            </div>
                        </div>
                    </div>

                    <div class="col-4 mt-3">
                        <div class="pet-info">
                            <div class="pet-info-heading">
                                Personality </div>
                            <div class="pet-info-content">
                                {{ $petprofiles[0]['personality'] }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-6">
                        <div class="pet-health-info-container">
                            <div class="pet-info-header" style="border-bottom: 1px solid #7EC8DF;">
                                <p> Health Info</p>
                            </div>
                            <div class="pet-info mt-4">
                                <div class="pet-info-content">


                                    @foreach ($petprofiles as $profiles)
                                        @if (json_decode($profiles->healthInfo) == null)
                                            <p>There is no available health record for this pet.</p>
                                        @else
                                            @foreach (json_decode($profiles->healthInfo) as $pethealthInfo)
                                                <i class="fas fa-check mr-3 text-success"></i>{{ $pethealthInfo }} <br>
                                            @endforeach
                                        @endif
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="pet-status-container">
                            <div class="pet-info-header" style="border-bottom: 1px solid #7EC8DF;">
                                <p> Pet Status</p>
                            </div>

                            <div class="pet-info mt-4">
                                <div class="pet-info-heading">Adoption Status</div>
                                <div class="pet-info-content mb-2">
                                    @if ($pets->is_adopted == 0)
                                        <i class="fas fa-times mr-2 text-danger"></i>Not yet Adopted
                                    @else
                                        <i class="fas fa-check mr-2 text-success"></i>Adopted
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="pet-about-container">
                            <div class="pet-info-header" style="border-bottom: 1px solid #7EC8DF;">
                                <p> About</p>
                            </div>

                            <div class="pet-info mt-4">
                                <div class="pet-info-content">
                                    {{ $petprofiles[0]['about'] }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection
