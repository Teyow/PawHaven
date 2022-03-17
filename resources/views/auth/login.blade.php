@extends('layouts.app')

@section('title', '| Login')
@section('content')

    <div class="container">
        <div class="row login-container">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="img-login">
                    <img src="{{ asset('img/login.png') }}" alt="">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <h1 class="page-heading">Welcome back! </h1>
                        <p class="page-subtitle mb-4">Sign in to your account.</p>
                        <div class="col-sm">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-3 input-form d-flex justify-content-start flex-column">

                                    <input id="email" type="email" class="form-control box-input-form " name="email"
                                        value="{{ old('email') }}" required="" autocomplete="email" autofocus="" placeholder="Email">
                                    <i class="fas fa-envelope"></i>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group input-form d-flex justify-content-start flex-column">

                                    <input id="password" type="password" class="form-control box-input-form "
                                        name="password" required="" autocomplete="current-password" placeholder="Password">
                                    <i class="fas fa-lock"></i>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                @if (Route::has('password.request'))
                                    <a class="btn btn-link pw-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                                <button type="submit" class="btn w-100 text-white mt-3 mb-5"
                                    style="background-color:#7EC8DF;">Login</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
