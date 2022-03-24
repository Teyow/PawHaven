@extends('layouts.master')
@section('title', '| Submit my donation')

@section('content')

    <div class="container-fluid">
        <div class="back mb-4">
            <a href="{{ route('donate.index') }}" class="text-gray-900" style="text-decoration: none;">
                <i class="fas fa-chevron-left"></i> Back</a>
        </div>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 accent-color">Submit my donation</h1>
        </div>

        <div class="card w-100">
            <div class="card-body">
                <form action="{{ route('donate.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="">Choose the type of donation:</label>
                    <div class="form-group">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="type" class="custom-control-input"
                                value="In-Kind">
                            <label class="custom-control-label" for="customRadioInline1">In-Kind Donation</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="type" class="custom-control-input"
                                value="Monetary">
                            <label class="custom-control-label" for="customRadioInline2">Monetary</label>
                        </div>

                        @error('type')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <hr>

                    <!--
                    <div class="In-Kind form-content">
                        <div class="form-group">
                            <label for="">Items:</label>
                            <input type="text" class="form-control" name="items">
                        </div>

                        <div class="form-group d-flex flex-column">
                            <label for="">Upload a picture of the donation:</label>
                            <input type="file" name="inkind-file" id="">
                            <small class="text-muted">Accessible formats: jpg, png
                                only</small>
                        </div>

                    </div> -->

                    <div class="In-Kind form-content">
                        <div class="form-group">
                            <label for="">Items:</label>
                            <input type="text" class="form-control" name="items">
                        </div>
                        <div class="form-group d-flex flex-column">
                            <label for="">Upload the screenshot of the transaction:</label>
                            <input type="file" name="inkind_file" id="">
                            <small class="text-muted">Accessible formats: jpg, png
                                only</small>
                        </div>
                        <button class="btn btn-block btn-accent-color" type="submit">Submit</button>
                    </div>

                    <div class="Monetary form-content">
                        <div class="form-group">
                            <label for="">Amount:</label>
                            <input type="text" class="form-control" name="amount">
                        </div>
                        <div class="form-group d-flex flex-column">
                            <label for="">Upload the screenshot of the transaction:</label>
                            <input type="file" name="monetary_file" id="">
                            <small class="text-muted">Accessible formats: jpg, png
                                only</small>
                        </div>
                        <button class="btn btn-block btn-accent-color" type="submit">Submit</button>
                    </div> 

                    
                </form>
            </div>
        </div>





    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('input[type="radio"]').click(function() {
                var val = $(this).attr("value");
                var target = $("." + val);
                $(".form-content").not(target).hide();
                $(target).show();
            });
        });
    </script>

@endsection
