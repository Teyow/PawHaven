@extends('layouts.master')
@section('title', '| View Scheduled Visit')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="back">
                @if (Auth::user()->is_admin == 1)
                    <a href="{{ route('visitation.all') }}" class="text-gray-900" style="text-decoration: none;">
                        <i class="fas fa-chevron-left"></i> Back </a>
                @else
                    <a href="{{ route('visitation.index') }}" class="text-gray-900" style="text-decoration: none;">
                        <i class="fas fa-chevron-left"></i> Back </a>
                @endif

            </div>
        </div>

        <h3 class="page-subheadings-500">Visit Scheduled</h3>

        @if (count($noPetvisit) > 0)
            @if ($noPetvisit[0]->pet_id == null)
                <div class="row mt-4 mb-5">
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h6 style="color: #005B97; font-weight: 500;">Your visit to the shelter is scheduled
                                    successfully!
                                </h6>
                                <hr>

                                <div class="pet-schedule-success-message">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est possimus quod, quibusdam
                                    beatae
                                    natus
                                    sequi necessitatibus illo architecto quasi debitis obcaecati esse, quae, veniam sint
                                    atque
                                    consectetur temporibus? Eveniet, soluta.
                                </div>



                                <h6 style="color: #005B97; font-weight: 500;" class="mt-4">Visit Details
                                </h6>
                                <hr>
                                <dl class="row">
                                    <dt class="col-sm-2">Date</dt>
                                    <dd class="col-sm-10">
                                        <input type="text" value="{{ $noPetvisit[0]->start }}" id="start" hidden>
                                        <input type="text" value="{{ $noPetvisit[0]->end }}" id="end" hidden>
                                        <div id="date" class="p">date</div>
                                    </dd>

                                    <dt class="col-sm-2">Time</dt>
                                    <dd class="col-sm-10">
                                        <div id="time" class="p">date</div>
                                    </dd>

                                </dl>
                                <div class="pet-schedule-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. At
                                    reprehenderit qui quo asperiores quae obcaecati sint iusto provident cumque sit ad,
                                    repudiandae
                                    culpa, sunt dolorem corporis iste magnam! Adipisci, temporibus.
                                </div>

                                <h6 style="color: #005B97; font-weight: 500;" class="mt-4">Please bring the
                                    following
                                    documents during your visit, if you have already considered adopting the pet.
                                </h6>
                                <hr>

                                <div class="pet-schedule-text">
                                    <dl class="row">
                                        <dt class="col-sm-5">Proof of Identity</dt>
                                        <dd class="col-sm-7">Passport,
                                            Driver's License,
                                            UMID,
                                            PhilHealth ID,
                                            TIN ID,
                                            Postal ID,
                                            Voter's ID,
                                            PRC ID,
                                            Senior Citizen ID,
                                            OFW ID,
                                            National ID,</dd>

                                        <dt class="col-sm-5">Residential Proof (Optional)</dt>
                                        <dd class="col-sm-7">
                                            Passport,
                                            Driver's License,
                                            Postal ID,
                                            UMID,
                                            Senior Citizen ID,
                                            Barangay Certificate,
                                            Police ID/Clearance,
                                            Police ID/Clearance
                                        </dd>

                                    </dl>
                                </div>

                                <script src="{{ asset('js/success.js') }}">
                                </script>




                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @else
            <div class="row mt-4 mb-5">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-5">
                    <div class="card">
                        <?php
                        foreach ($petVisit as $profiles) {
                            $json = $profiles->pet_image;
                            $json = json_decode($json);
                        
                            $firstImage = $json[0];
                        }
                        
                        ?>

                        <img class="card-img-top" src="{{ asset('/pet/' . $petVisit[0]->pet_id . '/' . $firstImage) }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 style="color: #7EC8DF; font-weight: 600;" class=" pet-info-header">{{ $petVisit[0]->name }}</h5>
                            <div class="row">
                                <div class="col-10">
                                    <div class="pet-info-content">
                                        {{ $petVisit[0]->breed }}
                                    </div>
                                    <div class="pet-info-content">
                                        {{ $petVisit[0]->gender }}, {{ $petVisit[0]->stage }}, {{ $petVisit[0]->age }}
                                        {{ $petVisit[0]->unit }}
                                    </div>
                                </div>
                                <div class="col-2 side-icon d-flex justify-content-center align-items-end">
                                    @if ($petVisit[0]->type == 'Dog')
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
                            <h6 style="color: #005B97; font-weight: 500;">Your visit to the shelter is scheduled
                                successfully!
                            </h6>
                            <hr>

                            <div class="pet-schedule-success-message">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est possimus quod, quibusdam
                                beatae
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
                                    <input type="text" value="{{ $petVisit[0]->start }}" id="start" hidden>
                                    <input type="text" value="{{ $petVisit[0]->end }}" id="end" hidden>
                                    <div id="date" class="p">date</div>
                                </dd>

                                <dt class="col-sm-2">Time</dt>
                                <dd class="col-sm-10">
                                    <div id="time" class="p">date</div>
                                </dd>

                            </dl>
                            <div class="pet-schedule-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. At
                                reprehenderit qui quo asperiores quae obcaecati sint iusto provident cumque sit ad,
                                repudiandae
                                culpa, sunt dolorem corporis iste magnam! Adipisci, temporibus.
                            </div>

                            <h6 style="color: #005B97; font-weight: 500;" class="mt-4">Please bring the following
                                documents during your visit, if you have already considered adopting the pet.
                            </h6>
                            <hr>

                            <div class="pet-schedule-text">
                                <dl class="row">
                                    <dt class="col-sm-5">Proof of Identity</dt>
                                    <dd class="col-sm-7">Passport,
                                        Driver's License,
                                        UMID,
                                        PhilHealth ID,
                                        TIN ID,
                                        Postal ID,
                                        Voter's ID,
                                        PRC ID,
                                        Senior Citizen ID,
                                        OFW ID,
                                        National ID,</dd>

                                    <dt class="col-sm-5">Residential Proof (Optional)</dt>
                                    <dd class="col-sm-7">
                                        Passport,
                                    Driver's License,
                                    Postal ID,
                                    UMID,
                                    Senior Citizen ID,
                                    Barangay Certificate,
                                    Police ID/Clearance,
                                    Police ID/Clearance
                                    </dd>

                                </dl>
                            </div>

                            <script src="{{ asset('js/success.js') }}">
                            </script>




                        </div>
                    </div>
                </div>
            </div>
        @endif



    </div>

@endsection
