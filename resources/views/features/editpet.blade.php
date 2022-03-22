@extends('layouts.master')
@section('title', '| Edit Pet')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Pet</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    @method('PUT')

                    <h5 style="color: #7EC8DF; font-weight: 500;">Pet Profile Information</h5>
                    <hr>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Type</label>
                                <select name="" id="" class="form-control"></select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Breed</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Gender</label>
                                <select name="" id="" class="form-control"></select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Life Stage</label>
                                <select name="" id="" class="form-control"></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Age</label>
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline1" name="customRadioInline"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline1">Month(s)</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline2" name="customRadioInline"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline2">Year(s)</label>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>




                </form>
            </div>
        </div>
    </div>

@endsection
