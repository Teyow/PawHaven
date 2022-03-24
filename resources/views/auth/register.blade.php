@extends('layouts.app')
@section('title', '| Register')
@section('content')

    <div class="container">
        <div class="row login-container">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 d-none d-lg-block">
                <div class="img-login">
                    <img src="{{ asset('img/register.png') }}" alt="">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-5">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <h1 class="page-heading">Welcome! </h1>
                        <p class="page-subtitle mb-4">Register your account.</p>
                        <div class="col-sm">
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3 input-form d-flex justify-content-start flex-column">
                                    <input id="fname" type="text" class="form-control box-input-form " name="fname"
                                        autofocus="" placeholder="First Name" value={{ old('fname') }}>
                                    <i class="fas fa-user"></i>

                                    @error('fname')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3 input-form d-flex justify-content-start flex-column">
                                    <input id="lname" type="text" class="form-control box-input-form " name="lname"
                                        placeholder="Last Name" value={{ old('lname') }}>
                                    <i class="fas fa-user"></i>

                                    @error('lname')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3 input-form d-flex justify-content-start flex-column">
                                    <input id="address" type="text" class="form-control box-input-form " name="address"
                                        placeholder="Address" value={{ old('address') }}>
                                    <i class="fas fa-home"></i>

                                    @error('address')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3 input-form d-flex justify-content-start flex-column">
                                    <input id="cnum" type="text" class="form-control box-input-form " name="contactNo"
                                        placeholder="Contact Number" value={{ old('contactNo') }}>
                                    <i class="fas fa-phone"></i>

                                    @error('contactNo')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3 input-form d-flex justify-content-start flex-column">
                                    <input id="email" type="text" class="form-control box-input-form " name="email"
                                        placeholder="Email" value="{{ old('email') }}">
                                    <i class="fas fa-envelope"></i>

                                    @error('email')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div class="form-group  mb-3 input-form d-flex justify-content-start flex-column">
                                    <input id="pass" type="password" class="form-control box-input-form " name="pass"
                                        placeholder="Password">
                                    <i class="fas fa-lock"></i>

                                    @error('pass')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3 input-form d-flex justify-content-start flex-column">
                                    <input id="cpass" type="password" class="form-control box-input-form " name="cpass"
                                        placeholder="Confirm password">
                                    <i class="fas fa-lock"></i>

                                    @error('cpass')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div class="custom-file" style="text-align: left; border-bottom: 1px solid #dedede;">
                                    <div class="row d-flex d-column">
                                        <div class="col-12"> <i class="fas fa-image"
                                                style="font-size: 20px; margin: 7px 0px 7px 20px;color: #dedede;"></i>
                                            <small id="label profile-pic" class="form-text text-muted profile-pic-label"
                                                style="font-size: 0.9rem; margin-left: 10px;">Profile Picture</small>
                                        </div>
                                        <div class="col-12">
                                            <input type="file" class="custom-file-input mt-3" name="file" id="file"
                                                placeholder="Profile Picture">
                                        </div>
                                    </div>



                                </div>


                                <button type="submit" class="btn w-100 text-white mt-3 mb-5"
                                    style="background-color:#7EC8DF;">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                } else if ($('#file').val() == '' && once) {
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
