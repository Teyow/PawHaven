@extends('layouts.master')
@section('title', '| Edit Donations')

@section('content')

    <div class="container-fluid">
        <div class="back mb-4">
            @if (Auth::user()->is_admin == 1)
                <a href="{{ route('donate.alldonations') }}" class="text-gray-900" style="text-decoration: none;">
                    <i class="fas fa-chevron-left"></i> Back</a>
            @else
                <a href="{{ route('donate.user', $donation->user_id) }}" class="text-gray-900"
                    style="text-decoration: none;">
                    <i class="fas fa-chevron-left"></i> Back</a>
            @endif
        </div>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 accent-color">Give Feedback</h1>
        </div>

        <div class="row row-cols-1 row-cols-md-3 d-flex justify-content-center">
            <div class="col mb-4">
                <div class="card h-100">
                    @if ($donation->type == 'In-Kind')
                        <img src="{{ asset('donations/in-kind/' . $donation->user_id . '/' . $donation->in_kind_img) }}"
                            class="card-img-top card-img-style img-responsive">
                    @else
                        <img src="{{ asset('donations/monetary/' . $donation->user_id . '/' . $donation->monetary_img) }}"
                            class="card-img-top card-img-style img-responsive">
                    @endif

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="page-subheadings-500">{{ $donation->type }} Donation</h3>

                            @if ($donation->is_approved == 0)
                                <span class="badge badge-danger">Not yet verified</span>
                            @else
                                <span class="badge badge-success">Verified</span>
                            @endif

                        </div>

                        <div class="donation-content">
                            Donated by: {{ $donation->fullname }}
                        </div>

                        @if ($donation->type == 'In-Kind')
                            <div class="donation-content">
                                Items: {{ $donation->items }}
                            </div>
                        @else
                            <div class="donation-content">
                                Amount: {{ $donation->amount }}
                            </div>
                        @endif


                        <hr>
                        <div class="d-flex justify-content-between">
                            <h5 class="page-subheadings-500">Feedback:</h5>
                        </div>
                            <div class="donation-content">
                                <form action="{{ route('donate.update', $donation->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf

                                    <div class="form-group">
                                        <input type="text" class="form-control" value=" {{ $donation->feedback }}" name="feedback">
                                        @error('feedback')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <button class="btn btn-block btn-accent-color mb-2" type="submit">Submit Feedback</button>
                                </form>
                               
                                <blockquote class="blockquote">
                                    <footer class="blockquote-footer"> <cite title="Source Title">Admin</cite></footer>
                                </blockquote>
                            </div>
                        


                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
