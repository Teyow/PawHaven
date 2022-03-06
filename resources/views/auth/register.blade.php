@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left screen -->

            <div class="col mx-5 p-5">
                <div class="d-flex justify-content-center">
                    <div class="display-4 text-align-center px-2" style="color: #FFAF00"> Create your</div>
                    <div class="display-4 text-align-center" style="color: #22355C">Account</div>
                </div>

                <form>
                    <div class="form-group my-3">
                        <input type="text" class="form-control form-control-lg rounded-pill" style=""
                            id="exampleInputFname" aria-describedby="" placeholder="First Name">
                    </div>
                    <div class="form-group my-3">
                        <input type="text" class="form-control form-control-lg rounded-pill" style=""
                            id="exampleInputLname" aria-describedby="" placeholder="Last Name">
                    </div>
                    <div class="form-group my-3">
                        <input type="text" class="form-control form-control-lg rounded-pill" style=""
                            id="exampleInputAddress" aria-describedby="" placeholder="Address">
                    </div>
                    <div class="form-group my-3">
                        <input type="text" class="form-control form-control-lg rounded-pill" style=""
                            id="exampleInputContact" aria-describedby="" placeholder="Contact">
                    </div>
                    <div class="form-group my-3">
                        <input type="text" class="form-control form-control-lg rounded-pill" style=""
                            id="exampleInputEmail1" aria-describedby="" placeholder="Email">
                    </div>
                    <div class="form-group my-3">
                        <input type="password" class="form-control form-control-lg rounded-pill"
                            style="" id="exampleInputPassword1" aria-describedby=""
                            placeholder="Password">
                    </div>
                    <div class="form-group my-3">
                        <input type="password" class="form-control form-control-lg rounded-pill"
                            style="" id="exampleInputPassword2" aria-describedby=""
                            placeholder="Re-Password">
                    </div>

                    <div class="d-flex justify-content-center my-3">
                        <button type="submit" style="background-color: #22355C; color:white"
                            class="btn btn-lg rounded-pill w-50 ">Register</button>
                    </div>

                </form>
            </div>
            <!-- right screen -->
            <div class="col">
                <picture>
                    <img src="{{ URL::to('/') }}/img/Shelter.png" alt="Responsive image" class="img-fluid shelter">
                </picture>
            </div>
        </div>
    </div>

    </div>
    <!-- Footer -->
    <footer class="page-footer font small teal pt-5">
        <div class="footer-pawshaven text-center py-3 text-light" style="background-color: #22355C;">Paws Haven © 2022</div>
    </footer>
@endsection
