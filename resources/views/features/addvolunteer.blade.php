@extends('layouts.master')
@section('title', '| Volunteer Registration')

@section('content')

    <div class="container-fluid mb-5" style="color: black;">
        <div class="back mb-4">
            <a href="{{ route('volunteer.index') }}" class="text-gray-900" style="text-decoration: none;">
                <i class="fas fa-chevron-left"></i> Back</a>
        </div>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 accent-color">Volunteer Registration</h1>
        </div>

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

                <button id="btn">Test</button>
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Full Name</label>
                                <input type="text" class="form-control" name="fullName">
                            </div>

                            <div class="form-group">
                                <label for="">Program</label>
                                <input type="text" class="form-control" name="program"
                                    value="{{ $programs->program_title }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="">Date Start</label>
                                <input type="text" class="form-control" name="fullName">
                            </div>

                            <div class="form-group">
                                <label for="">Date End</label>
                                <input type="text" class="form-control" name="fullName">
                            </div>

                            <button type="submit" class="btn btn-accent-color btn-lg btn-block">Register</button>
                        </form>
                    </div>
                </div>

                <script src={{ asset('js/volunteer.js') }}>
                </script>
            </div>
        </div>

    </div>

@endsection
