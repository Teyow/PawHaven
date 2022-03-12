@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left screen -->

            <div class="col mx-5 p-5 mt-5">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <div class="d-flex">
                        <div class="display-4 text-align-center px-2" style="color: #FFAF00"> Create your</div>
                        <div class="display-4 text-align-center" style="color: #22355C">Account</div>
                    </div>

                    <form class="w-75" action="{{ route('register') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group my-3">
                            <input type="text" name="fname" class="form-control form-control-lg rounded-pill" style=""
                                id="fname" aria-describedby="" placeholder="First Name*">
                            @error('fname')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <input type="text" name="lname" class="form-control form-control-lg rounded-pill" style=""
                                id="lname" aria-describedby="" placeholder="Last Name*">
                            @error('lname')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <input type="text" name="address" class="form-control form-control-lg rounded-pill" style=""
                                id="address" aria-describedby="" placeholder="Address*">
                            @error('address')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <input type="text" name="contactNo" class="form-control form-control-lg rounded-pill" style=""
                                id="cnum" aria-describedby="" placeholder="Contact*">
                            @error('contactNo')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <input type="text" name="email" class="form-control form-control-lg rounded-pill" style=""
                                id="email" aria-describedby="" placeholder="Email*">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <input type="password" name="pass" class="form-control form-control-lg rounded-pill" style=""
                                id="pass" aria-describedby="" placeholder="Password*">
                            @error('pass')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <input type="password" name="cpass" class="form-control form-control-lg rounded-pill" style=""
                                id="cpass" aria-describedby="" placeholder="Re-Password*">
                            @error('cpass')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" id="file">
                        </div>
                        <div class="d-flex justify-content-center my-3">
                            <button type="submit" style="background-color: #22355C; color:white"
                                class="btn btn-lg rounded-pill w-50 " id="submit">Register</button>
                        </div>

                    </form>
                </div>
            </div>
            <!-- right screen -->
            <div class="col">
                <div class="d-flex justify-content-center align-items-center">

                    <img src="{{ URL::to('/') }}/img/Shelter.png" alt="Responsive image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- Footer -->
    <footer class="page-footer font small teal mt-4">
        <div class="footer-pawshaven text-center py-3 text-light" style="background-color: #22355C;">Paws Haven © 2022</div>
    </footer>

    <script>
        $(document).ready(() => {
            let once = true
            $('form').submit((e) => {
                if ($('#fname').val() == '' || $('#lname').val() == '' || $('#address').val() == '' ||
                    $("#cnum").val() == '' || $('#email').val() == '' || $('#pass').val() == '' ||
                    $('#cpass').val() == '') {
                    swal({
                        icon: 'error',
                        title: 'Warning!',
                        text: 'Some fields are empty!'
                    })
                } else if ($('#file').empty() && once) {
                    once = false
                    swal({
                        icon: 'warning',
                        title: 'No image!',
                        text: 'Are you sure no image will be added?'
                    })
                } else {
                    $('form').submit()
                }
                e.preventDefault();

            })
        })
    </script>
@endsection
