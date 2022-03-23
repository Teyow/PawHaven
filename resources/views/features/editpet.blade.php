@extends('layouts.master')
@section('title', '| Edit Pet')

@section('content')

    <div class="container-fluid mb-5">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Pet</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('adoption.update', $pets->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <h5 style="color: #7EC8DF; font-weight: 500;">Pet Profile Information</h5>
                    <hr>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $pets->name }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Type</label>
                                <select class="form-control" name="type">
                                    <option disabled hidden selected>Type</option>
                                    <option value="Dog" {{ $pets->type == 'Dog' ? 'selected' : '' }}>Dog</option>
                                    <option value="Cat" {{ $pets->type == 'Cat' ? 'selected' : '' }}>Cat</option>
                                </select>
                                @error('type')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Breed</label>
                                <input class="form-control" type="text" name="breed" value="{{ $pets->breed }}" />

                                @error('breed')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Gender</label>
                                <select class="form-control" name="gender">
                                    <option disabled hidden selected>Gender</option>
                                    <option value="Male" {{ $pets->gender == 'Male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="Female" {{ $pets->gender == 'Female' ? 'selected' : '' }}>
                                        Female</option>
                                </select>
                                @error('gender')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Life Stage</label>
                                <select class="form-control" name="stage">
                                    <option disabled hidden selected>Life Stage</option>

                                    <optgroup label="Cat">
                                        <option value="Kitten" {{ $pets->stage == 'Kitten' ? 'selected' : '' }}>
                                            Kitten - Birth up to 1 year</option>
                                        <option value="Young Adult"
                                            {{ $pets->stage == 'Young Adult' ? 'selected' : '' }}>Young Adult
                                            -1-6
                                            years</option>
                                        <option value="Mature Adult"
                                            {{ $pets->stage == 'Mature Adult' ? 'selected' : '' }}>Mature Adult -
                                            7-10 years</option>
                                        <option value="Senior" {{ $pets->stage == 'Senior' ? 'selected' : '' }}>
                                            Senior - 10+ years</option>
                                    </optgroup>
                                    <optgroup label="Dog">
                                        <option value="Puppy" {{ $pets->stage == 'Puppy' ? 'selected' : '' }}>
                                            Puppy - 0-6 months</option>
                                        <option value="Junior" {{ $pets->stage == 'Junior' ? 'selected' : '' }}>
                                            Junior - 6-8 months</option>
                                        <option value="Adult" {{ $pets->stage == 'Adult' ? 'selected' : '' }}>
                                            Adult - 1-7 years</option>
                                        <option value="Mature" {{ $pets->stage == 'Mature' ? 'selected' : '' }}>
                                            Mature - 5-7 years</option>
                                        <option value="Senior" {{ $pets->stage == 'Senior' ? 'selected' : '' }}>
                                            Senior - 7+ years</option>
                                    </optgroup>
                                </select>

                                @error('stage')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Age</label>
                                        <input class="form-control" type="number" name="age" placeholder="Age"
                                            value="{{ $pets->age }}" />

                                        @error('age')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <div class="form-group ">


                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="unit" class="custom-control-input"
                                                value="Month(s)" {{ $pets->unit == 'Month(s)' ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customRadio1">Month(s)</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="unit" class="custom-control-input"
                                                value="Year(s)" {{ $pets->unit == 'Year(s)' ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customRadio2">Year(s)</label>
                                        </div>

                                        @error('unit')
                                            <div>
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>

                    <h5 style="color: #7EC8DF; font-weight: 500;">Additional Information</h5>
                    <hr>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Size</label>
                                <select name="size" id="" class="form-control">
                                    <option disabled hidden selected>Size</option>
                                    <option value="Mini" {{ $petprofiles[0]['size'] == 'Mini' ? 'selected' : '' }}>Mini
                                    </option>
                                    <option value="Small" {{ $petprofiles[0]['size'] == 'Small' ? 'selected' : '' }}>
                                        Small
                                    </option>
                                    <option value="Medium" {{ $petprofiles[0]['size'] == 'Medium' ? 'selected' : '' }}>
                                        Medium
                                    </option>
                                    <option value="Large" {{ $petprofiles[0]['size'] == 'Large' ? 'selected' : '' }}>
                                        Large
                                    </option>
                                    <option value="X-Large" {{ $petprofiles[0]['size'] == 'X-Large' ? 'selected' : '' }}>
                                        X-Large</option>
                                </select>
                                @error('size')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror


                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Color</label>
                                <input class="form-control" type="text" name="color"
                                    value="{{ $petprofiles[0]['color'] }}" />
                                @error('color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Personality</label>
                                <input class="form-control" type="text" name="personality"
                                    value="{{ $petprofiles[0]['personality'] }}" />
                                <small class="form-text text-muted">Describe the pet (e.g. energetic,
                                    loyal, etc.)</small>
                                @error('personality')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Health Info</label>
                                <div class="form-check">
                                    <input class="form-check-input" name="healthInfo[]" type="checkbox" value="Vaccinated"
                                        @if (is_array(json_decode($petprofiles[0]['healthInfo'])) && in_array('Vaccinated', json_decode($petprofiles[0]['healthInfo']))) checked @endif>
                                    <label class="form-check-label">
                                        Vaccinated
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="healthInfo[]" type="checkbox" value="Neutered"
                                        @if (is_array(json_decode($petprofiles[0]['healthInfo'])) && in_array('Neutered', json_decode($petprofiles[0]['healthInfo']))) checked @endif>
                                    <label class="form-check-label">
                                        Neutered
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="healthInfo[]" type="checkbox"
                                        value="With Ailments" @if (is_array(json_decode($petprofiles[0]['healthInfo'])) && in_array('With Ailments', json_decode($petprofiles[0]['healthInfo']))) checked @endif>
                                    <label class="form-check-label">
                                        With Ailments
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="healthInfo[]" type="checkbox" value="No Ailments"
                                        @if (is_array(json_decode($petprofiles[0]['healthInfo'])) && in_array('No Ailments', json_decode($petprofiles[0]['healthInfo']))) checked @endif>
                                    <label class="form-check-label">
                                        No Ailments
                                    </label>
                                </div>



                                @error('healthInfo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">About</label>
                                <textarea class="form-control" value="" name="about" id="" cols="5"
                                    rows="5">{{ $petprofiles[0]['about'] }}</textarea>
                                <small class="form-text text-muted">Tell something about the pet
                                    (e.g. history, attitude, etc.)</small>

                                @error('about')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <h5 style="color: #7EC8DF; font-weight: 500;">Pet Profile Image</h5>
                    <hr>

                    <div class="row row-cols-1 row-cols-md-4">
                        @foreach ($petprofiles as $petprofile)
                            @foreach (json_decode($petprofile->pet_image) as $petimage)
                                <div class="col mb-4">
                                    <div class="card h-100">
                                        <img src="{{ asset('pet/' . $petprofile->pet_id . '/' . $petimage) }}"
                                            class="card-img-top" alt="...">

                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>


                    <div class="custom-file">
                        <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple="multiple"
                            multiple>
                        <label class="custom-file-label" for="images">Choose image</label>
                        <small class="form-text text-muted">Accessible formats: jpg, png
                            only</small>

                        @error('imageFile')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        @error('imageFile.*')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="d-flex justify-content-start align-items-center mt-3">
                        <button class="btn btn-primary mr-3" type="submit">Save Changes</button>
                        <a class="btn btn-outline-secondary " href="{{ route('adoption.show', $pets->id) }}" role="button">Cancel </a>
                        
                    </div>
                  



                </form>
            </div>
        </div>
    </div>

@endsection
