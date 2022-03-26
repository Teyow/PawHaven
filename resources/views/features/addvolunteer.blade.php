@extends('layouts.master')
@section('title', '| Volunteer Registration')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="container-fluid mb-5" style="color: black;">
        <div class="back mb-4">
            <a href="{{ route('volunteer.index') }}" class="text-gray-900" style="text-decoration: none;">
                <i class="fas fa-chevron-left"></i> Back</a>
        </div>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 accent-color">Volunteer Registration</h1>
        </div>

        @if (Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $programs->program_title }}</h5>
                        <p class="card-text">{{ $programs->program_desc }}</p>
                    </div>
                    <img class="card-img-bottom card-img-program-style img-responsive"
                        src="{{ asset('img/programs/' . $programs->program_img) }}" alt="Card image cap">
                </div>
            </div>
            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">
                        <form action="/addvolunteer" id="form" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Full Name</label>
                                <input type="text" class="form-control" id="fname" name="fullName">
                            </div>

                            <div class="form-group">
                                <label for="">Program</label>
                                <input type="text" class="form-control" name="program" id="program"
                                    value="{{ $programs->program_title }}" readonly>
                            </div>

                            <div class="form-group">
                            </div>

                            <div class="form-group">
                                <label for="">Date Start</label>

                                <div class="d-flex flex-column">
                                    <input type="text" placeholder="Choose a reservation date"
                                        class="form-control py-4 px-4" id="reservationDate1">
                                    <div class="d-flex justify-content-center align-self-center">
                                        <div class="datepicker date input-group p-0 shadow-sm" id="datepicker1">
                                            <input type="text" placeholder="Choose a reservation date"
                                                class="form-control py-4 px-4" id="reservationDateIn1" hidden
                                                name="dateStart">
                                            <!--ANDITO YUNG NAME NG FIELD-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">

                                <label for="">Date End</label>
                                <div class="d-flex flex-column">
                                    <input type="text" placeholder="Choose a reservation date"
                                        class="form-control py-4 px-4" id="reservationDate2">
                                    <div class="d-flex justify-content-center align-self-center">
                                        <div class="datepicker date input-group p-0 shadow-sm" id="datepicker2">
                                            <input type="text" placeholder="Choose a reservation date"
                                                class="form-control py-4 px-4" id="reservationDateIn2" hidden
                                                name="dateEnd">
                                            <!--ANDITO YUNG NAME NG FIELD-->
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <input type="text" value="{{ $programs->id }}" name="programId" hidden>

                            <button type="button" id="submitBtn"
                                class="btn btn-accent-color btn-lg btn-block">Register</button>
                        </form>
                    </div>
                </div>

                <style>
                    .datepicker td,
                    .datepicker th {
                        width: 2.5rem;
                        height: 2.5rem;
                        font-size: 1rem;
                    }

                    .datepicker {
                        margin-bottom: 3rem;
                    }

                    .datepicker-dropdown {
                        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
                    }

                </style>

                <script>
                    $(document).ready(function() {
                        // INITIALIZE DATEPICKER PLUGIN
                        let today = new Date()
                        let tomorrow = new Date()
                        tomorrow.setDate(today.getDate() + 1)
                        $('#datepicker1').datepicker({
                            clearBtn: true,
                            format: "dd/mm/yyyy",
                            startDate: tomorrow
                        });

                        // FOR DEMO PURPOSE
                        $('#reservationDate1').click(function() {
                            if ($('#datepicker1').is(':visible')) {
                                $('#datepicker1').hide()
                            } else if ($("#datepicker1").is(':hidden')) {
                                $("#datepicker1").show()
                            }
                        })

                        $("#reservationDateIn1").change(function() {
                            $('#reservationDate1').val($("#reservationDateIn1").val())
                            $("#datepicker1").hide()
                        })

                        //========================================================2========================================================//
                        $('#datepicker2').datepicker({
                            clearBtn: true,
                            format: "dd/mm/yyyy",
                            startDate: tomorrow
                        });

                        // FOR DEMO PURPOSE
                        $('#reservationDate2').click(function() {
                            if ($('#datepicker2').is(':visible')) {
                                $('#datepicker2').hide()
                            } else if ($("#datepicker2").is(':hidden')) {
                                $("#datepicker2").show()
                            }
                        })

                        $("#reservationDateIn2").change(function() {
                            $('#reservationDate2').val($("#reservationDateIn2").val())
                            $('#datepicker2').hide()
                        })

                        $("#datepicker1").hide()
                        $("#datepicker2").hide()


                        //PREVENT BUTTON SUBMIT



                        $('#submitBtn').click(function(event) {
                            event.preventDefault();
                            const fname = $('#fname').val()
                            const program = $('#program').val()
                            const startDate = $('#reservationDateIn1').val()
                            const endDate = $('#reservationDateIn2').val()
                            if (fname == "" || program == "" || startDate == "" || endDate == "") {
                                swal({
                                    title: "Error!",
                                    text: "Some field(s) are empty!",
                                    icon: 'error'
                                })
                            } else {
                                swal({
                                    title: "Success!",
                                    text: "Your schedule has been saved!",
                                    icon: "success"
                                }).then((response) => {
                                    $("#form").submit();
                                })
                            }
                        })
                    })
                </script>
            </div>
        </div>

    </div>

@endsection
