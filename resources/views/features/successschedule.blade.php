@extends('layouts.master')
@section('title', '| Schedule a Visit')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="back">
                @if (Auth::user()->is_admin == 1)
                    <a href="#" class="text-gray-900" style="text-decoration: none;">
                        <i class="fas fa-chevron-left"></i> Back </a>
                @else
                    <a href="#" class="text-gray-900" style="text-decoration: none;">
                        <i class="fas fa-chevron-left"></i> Back </a>
                @endif

            </div>
        </div>

        <h3 style="color: #7EC8DF; font-weight: 500;">Visit Scheduled</h3>
        <div class="row mt-4 mb-5">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-5">
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
                <div class="card">
                    <div class="card-body">
                        <h6 style="color: #005B97; font-weight: 500;">Your visit to the shelter is scheduled successfully!
                        </h6>
                        <hr>

                        <div class="pet-schedule-success-message">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est possimus quod, quibusdam beatae
                            natus
                            sequi necessitatibus illo architecto quasi debitis obcaecati esse, quae, veniam sint atque
                            consectetur temporibus? Eveniet, soluta.
                        </div>



                        <h6 style="color: #005B97; font-weight: 500;" class="mt-4">Visit Details
                        </h6>
                        <hr>
                        <dl class="row">
                            <dt class="col-sm-2">Date</dt>
                            <dd class="col-sm-10">
                                <div id="date" class="p">date</div>
                            </dd>

                            <dt class="col-sm-2">Time</dt>
                            <dd class="col-sm-10">
                                <p>insert time</p>
                            </dd>

                        </dl>
                        <div class="pet-schedule-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. At
                            reprehenderit qui quo asperiores quae obcaecati sint iusto provident cumque sit ad, repudiandae
                            culpa, sunt dolorem corporis iste magnam! Adipisci, temporibus.
                        </div>

                        <h6 style="color: #005B97; font-weight: 500;" class="mt-4">Please bring the following
                            documents during your visit, if you have already considered adopting the pet.
                        </h6>
                        <hr>

                        <div class="pet-schedule-text">
                            <dl class="row">
                                <dt class="col-sm-4">Proof of Identity</dt>
                                <dd class="col-sm-8">Insert type of ids</dd>

                                <dt class="col-sm-4">Proof of age</dt>
                                <dd class="col-sm-8">
                                    Insert type of ids
                                </dd>

                                <dt class="col-sm-4">Residential Proof</dt>
                                <dd class="col-sm-8">
                                    Insert type of ids
                                </dd>

                            </dl>
                        </div>

                        <script src="{{ asset('js/success.js') }}">
                            console.log(formatDate({{ $visit_info->date_start }}))
                        </script>




                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
