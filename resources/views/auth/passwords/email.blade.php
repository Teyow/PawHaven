@extends('layouts.app')
@section('title', '| Reset Password')
@section('content')
    <div class="container">
        <div class="row login-container">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="img-login">
                    <img src="{{ asset('img/Forgot password-rafiki.png') }}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <h1 class="page-heading">Forgot your Password?</h1>
                        <p class="page-subtitle">Enter your email and we will send you a link to reset your password.</p>
                        <div class="col-sm">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group mb-3 input-form d-flex justify-content-start flex-column">

                                    <input id="email" type="email"
                                        class="form-control box-input-form  @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Email">
                                    <i class="fas fa-envelope"></i>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn w-100 text-white " style="background-color:#7EC8DF;">
                                    {{ __('Send Password Reset Link') }}</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
