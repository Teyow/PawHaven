@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- left screen -->
            <div class="col">
                <picture>
                    <img src="{{ URL::to('/') }}/img/Adopt.png" alt="Responsive image" class="img-fluid adopt">
                </picture>
            </div>

            <!-- right screen -->

            <div class="col-md-6 d-flex align-items-center justify-content-center side-bar-img"
                style="background-color:white; height:100vh;">
                <div class="card border-0 mt-5" style="width: 45rem; height: 35rem;">
                    <div class="card-body mt-5 ">
                        <div class="d-flex justify-content-center mt-5">
                            <div class="display-4 text-align-center px-2" style="color: #FFAF00">Login your</div>
                            <div class="display-4 text-align-center " style="color: #22355C">Account</div>
                        </div>



                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="container">
                                <div class="form-group row mt-5">
                                    <label for="email" class="col-md-4 col-form-label text-md-right"
                                        style="font-size: 1rem;">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control rounded-pill " name="email"
                                            value="" required="" autocomplete="email" autofocus="">
                                    </div>
                                </div>
                                <div class="form-group row mt-2">
                                    <label for="password" class="col-md-4  col-form-label text-md-right"
                                        style="font-size: 1rem;">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control rounded-pill "
                                            name="password" required="" autocomplete="current-password">
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5 offset-md-4 mt-2">
                                        <button type="submit" style="background-color: #22355C; color:white"
                                            class="btn btn-md rounded-pill ">Login</button>
                                        <a style="background-color: white; color: #22355C"
                                            class="btn btn-sm rounded-pill ">Forgot your password?</a>

                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>
    </div>



    </div>
    <!-- Footer -->
    <footer class="page-footer font small teal">
        <div class="footer-pawshaven text-center py-3 text-light" style="background-color: #22355C;">Paws Haven © 2022</div>
    </footer>
@endsection
