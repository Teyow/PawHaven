@extends('layouts.master')
@section('title', '| Add Pet')

@section('content')

    <div class="container-fluid" style="color: black;">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 accent-color">Add Pet</h1>
        </div>

        @if (Session::get('success'))
            <div class="alert alert-success mt-3 mb-3">
                {{ Session::get('success') }}
            </div>
        @endif


        <div class="multisteps-form mb-5">
            <!--progress bar-->
            <div class="row">
                <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
                    <div class="multisteps-form__progress">
                        <button class="multisteps-form__progress-btn js-active" type="button" title="Pet Info">Pet
                            Info</button>
                        <button class="multisteps-form__progress-btn" type="button" title="Additional Info">Additional
                            Info</button>
                        <button class="multisteps-form__progress-btn" type="button" title="Upload Image">Upload
                            Image</button>
                        <button class="multisteps-form__progress-btn" type="button" title="Summary">Summary </button>
                    </div>
                </div>
            </div>
            <!--form panels-->
            <div class="row">
                <div class="col-12 col-lg-8 m-auto">
                    <form class="multisteps-form__form" method="POST" action="{{ route('adoption.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <!--single form panel-->
                        <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                            <h3 class="multisteps-form__title">Pet Info</h3>
                            <div class="multisteps-form__content">
                                <div class="form-row mt-4">
                                    <div class="col-12 col-sm-6">
                                        <input class="multisteps-form__input form-control" type="text" placeholder="Name"
                                            name="name" value="{{ old('name') }}" id="name" />

                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                        <select class="multisteps-form__select form-control" name="type" id="type">
                                            <option disabled hidden selected>Type</option>
                                            <option value="Dog" {{ old('type') == 'Dog' ? 'selected' : '' }}>Dog</option>
                                            <option value="Cat" {{ old('type') == 'Cat' ? 'selected' : '' }}>Cat</option>
                                        </select>

                                        @error('type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row mt-4">
                                    <div class="col-12 col-sm-6">
                                        <input class="multisteps-form__input form-control" type="text" placeholder="Breed"
                                            name="breed" value="{{ old('breed') }}" id="breed" />

                                        @error('breed')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                        <select class="multisteps-form__select form-control" name="gender" id="gender">
                                            <option disabled hidden selected>Gender</option>
                                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                                Female</option>
                                        </select>
                                        @error('gender')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row mt-4">
                                    <div class="col-12 col-sm-6">
                                        <select class="multisteps-form__select form-control" name="stage" id="stage">
                                            <option disabled hidden selected>Life Stage</option>

                                            <optgroup label="Cat">
                                                <option value="Kitten" {{ old('stage') == 'Kitten' ? 'selected' : '' }}>
                                                    Kitten - Birth up to 1 year</option>
                                                <option value="Young Adult"
                                                    {{ old('stage') == 'Young Adult' ? 'selected' : '' }}>Young Adult
                                                    -1-6
                                                    years</option>
                                                <option value="Mature Adult"
                                                    {{ old('stage') == 'Mature Adult' ? 'selected' : '' }}>Mature Adult -
                                                    7-10 years</option>
                                                <option value="Senior" {{ old('stage') == 'Senior' ? 'selected' : '' }}>
                                                    Senior - 10+ years</option>
                                            </optgroup>
                                            <optgroup label="Dog">
                                                <option value="Puppy" {{ old('stage') == 'Puppy' ? 'selected' : '' }}>
                                                    Puppy - 0-6 months</option>
                                                <option value="Junior" {{ old('stage') == 'Junior' ? 'selected' : '' }}>
                                                    Junior - 6-8 months</option>
                                                <option value="Adult" {{ old('stage') == 'Adult' ? 'selected' : '' }}>
                                                    Adult - 1-7 years</option>
                                                <option value="Mature" {{ old('stage') == 'Mature' ? 'selected' : '' }}>
                                                    Mature - 5-7 years</option>
                                                <option value="Senior" {{ old('stage') == 'Senior' ? 'selected' : '' }}>
                                                    Senior - 7+ years</option>
                                            </optgroup>
                                        </select>

                                        @error('stage')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                        <div class="row">
                                            <div class="col">
                                                <input class="multisteps-form__input form-control" type="number" name="age"
                                                    id="age" placeholder="Age" value="{{ old('age') }}" />

                                                @error('age')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="col">
                                                <div class="form-group row">

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="unit" id="unit"
                                                            value="Month(s)"
                                                            {{ old('unit') == 'Month(s)' ? 'checked' : '' }}>
                                                        <label class="form-check-label">Month(s)</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="unit"
                                                            value="Year(s)"
                                                            {{ old('unit') == 'Year(s)' ? 'checked' : '' }}>
                                                        <label class="form-check-label">Year(s)</label>
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
                                <div class="button-row d-flex mt-4">
                                    <a class="btn btn-outline-secondary mr-auto" href="{{ route('adoption.index') }}"
                                        role="button" title="Next">Cancel</a>
                                    <button class="btn btn-primary ml-auto js-btn-next" type="button"
                                        title="Next">Next</button>
                                </div>
                            </div>
                        </div>

                        <!--single form panel-->
                        <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                            <h3 class="multisteps-form__title">Your Additional Info</h3>
                            <div class="multisteps-form__content">
                                <div class="form-row mt-4">
                                    <div class="col-12 col-sm-6">
                                        <select name="size" id="size" class="multisteps-form__select form-control">
                                            <option disabled hidden selected>Size</option>
                                            <option value="Mini" {{ old('size') == 'Mini' ? 'selected' : '' }}>Mini
                                            </option>
                                            <option value="Small" {{ old('size') == 'Small' ? 'selected' : '' }}>Small
                                            </option>
                                            <option value="Medium" {{ old('size') == 'Medium' ? 'selected' : '' }}>Medium
                                            </option>
                                            <option value="Large" {{ old('size') == 'Large' ? 'selected' : '' }}>Large
                                            </option>
                                            <option value="X-Large" {{ old('size') == 'X-Large' ? 'selected' : '' }}>
                                                X-Large</option>
                                        </select>

                                        @error('size')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                        <input class="multisteps-form__input form-control" type="text" name="color"
                                            id="color" placeholder="Color" value="{{ old('color') }}" />

                                        @error('color')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row mt-4">
                                    <div class="col">
                                        <input class="multisteps-form__input form-control" type="text" name="personality"
                                            id="personality" placeholder="Personality"
                                            value="{{ old('personality') }}" />
                                        <small class="form-text text-muted">Describe the pet (e.g. energetic,
                                            loyal, etc.)</small>

                                        @error('personality')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row mt-4">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Health Info</label>
                                            <div class="form-check">
                                                <input class="form-check-input healthInfo" name="healthInfo[]" type="checkbox"
                                                    value="Vaccinated" @if (is_array(old('healthInfo')) && in_array('Vaccinated', old('healthInfo'))) checked @endif>
                                                <label class="form-check-label">
                                                    Vaccinated
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input healthInfo" name="healthInfo[]" type="checkbox"
                                                    value="Neutered" @if (is_array(old('healthInfo')) && in_array('Neutered', old('healthInfo'))) checked @endif>
                                                <label class="form-check-label">
                                                    Neutered
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input healthInfo" name="healthInfo[]" type="checkbox"
                                                    value="With Ailments" @if (is_array(old('healthInfo')) && in_array('With Ailments', old('healthInfo'))) checked @endif>
                                                <label class="form-check-label">
                                                    With Ailments
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input healthInfo" name="healthInfo[]" type="checkbox"
                                                    value="No Ailments" @if (is_array(old('healthInfo')) && in_array('No Ailments', old('healthInfo'))) checked @endif>
                                                <label class="form-check-label">
                                                    No Ailments
                                                </label>
                                            </div>

                                        </div>
                                        @error('healthInfo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                        <div class="form-group">
                                            <label for="">About</label>
                                            <textarea class="form-control" name="about" id="about" cols="5" rows="5">{{ old('about') }}</textarea>
                                            <small class="form-text text-muted">Tell something about the pet
                                                (e.g. history, attitude, etc.)</small>
                                        </div>

                                        @error('about')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                                <div class="button-row d-flex mt-4">
                                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev" >Prev</button>
                                    <button class="btn btn-primary ml-auto js-btn-next" type="button" id="nextBtnSumm"
                                        title="Next">Next</button>
                                </div>
                            </div>
                        </div>

                        <!--single form panel-->
                        <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                            <h3 class="multisteps-form__title">Upload Image</h3>
                            <small class="form-text text-muted">Upload atleast 4 pictures of the pet, if applicable</small>
                            <div class="user-image mb-3 text-center">
                                <div class="imgPreview mr-2"> </div>

                            </div>
                            <div class="multisteps-form__content">
                                <div class="custom-file">
                                    <input type="file" name="imageFile[]" class="custom-file-input" id="images"
                                        multiple="multiple" multiple>
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
                            </div>

                            <div class="button-row d-flex mt-4">
                                <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                                <button class="btn btn-primary ml-auto js-btn-next" type="button"
                                    title="Next">Next</button>
                            </div>
                        </div>

                        <!--single form panel-->
                        <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                            <h3 class="multisteps-form__title">Summary</h3>
                            <small class="form-text text-muted">Review the details of the pet to be registered.</small>
                            <div class="multisteps-form__content">
                                <h6 class="page-subheadings-500 mt-3 mb-3">Pet Information</h6>
                                <div class="container border-left-primary rounded py-2">
                                    <div class="row">
                                        <div class="col-sm-2 accent-color">Name:</div>
                                        <div class="col-sm-10" id="nameDiv"></div>

                                        <div class="col-sm-2 accent-color">Type:</div>
                                        <div class="col-sm-10" id="typeDiv"></div>

                                        <div class="col-sm-2 accent-color">Breed:</div>
                                        <div class="col-sm-10" id="breedDiv"></div>

                                        <div class="col-sm-2 accent-color">Gender:</div>
                                        <div class="col-sm-10" id="genderDiv"></div>

                                        <div class="col-sm-2 accent-color">Stage:</div>
                                        <div class="col-sm-10" id="stageDiv"></div>

                                        <div class="col-sm-2 accent-color">Age:</div>
                                        <div class="col-sm-10" id="ageDiv"></div>
                                    </div>
                                </div>

                                <hr>
                                <h6 class="page-subheadings-500 mt-3 mb-3">Additional Information</h6>
                                <div class="container border-left-primary rounded py-2">


                                    <div class="row">
                                        <div class="col-sm-2 accent-color">Size</div>
                                        <div class="col-sm-10" id="sizeDiv"></div>

                                        <div class="col-sm-2 accent-color">Color:</div>
                                        <div class="col-sm-10" id="colorDiv"></div>

                                        <div class="col-sm-2 accent-color">Personality:</div>
                                        <div class="col-sm-10" id="personalityDiv"></div>

                                        <div class="col-sm-2 accent-color">Health Info:</div>
                                        <div class="col-sm-10" id="healthInfoDiv"></div>

                                        <div class="col-sm-2 accent-color">About:</div>
                                        <div class="col-sm-10" id="aboutDiv"></div>
                                    </div>
                                </div>

                                <hr>
                                <h6 class="page-subheadings-500 mt-3">Profile Image</h6>
                                <small class="text-muted"><em>Kindly refer to the previous tab to verify the pictures to be uploaded.</em></small>



                                <div class="button-row d-flex mt-4">
                                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                                    <button class="btn btn-success ml-auto" type="submit" title="Submit">Submit</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('#name').on('input', function() {
                $('#nameDiv').text($(this).val());
            });

            $('#breed').on('input', function() {
                $('#breedDiv').text($(this).val());
            });

            $('#age').on('input', function() {
                $('#ageDiv').text($(this).val());
            });

            $('#color').on('input', function() {
                $('#colorDiv').text($(this).val());
            });

            $('#personality').on('input', function() {
                $('#personalityDiv').text($(this).val());
            });

            $('#about').on('input', function() {
                $('#aboutDiv').text($(this).val());
            });

            $('select#type').change(function() {
                let selectedtype = $(this).children("option:selected").val();
                $('#typeDiv').text(selectedtype);
                console.log(selectedtype);
            });

            $('select#gender').change(function() {
                let selectedgender = $(this).children("option:selected").val();
                $('#genderDiv').text(selectedgender);
                console.log(selectedgender);
            });

            $('select#stage').change(function() {
               //let selectedstage = $(this).children("option:selected").val();
               //$('#stageDiv').text(selectedstage);
               //console.log(selectedstage);

               let selectedstage = $(this).find(':selected').closest('option').attr('value');
               $('#stageDiv').text(selectedstage);
               console.log(selectedstage);
            });

            $('select#size').change(function() {
                let selectedsize = $(this).children("option:selected").val();
                $('#sizeDiv').text(selectedsize);
                console.log(selectedsize);
            });

            $('#nextBtnSumm').click(function() {
                var final = '';
                $('.healthInfo:checked').each(function() {
                    let values = $(this).val();
                    final += values + ', ';
                });

                $('#healthInfoDiv').text(final);
            })


            //let type = $("#type option:selected").text();
            //console.log(type);
        });
    </script>

    <script>
        //DOM elements
        const DOMstrings = {
            stepsBtnClass: 'multisteps-form__progress-btn',
            stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
            stepsBar: document.querySelector('.multisteps-form__progress'),
            stepsForm: document.querySelector('.multisteps-form__form'),
            stepsFormTextareas: document.querySelectorAll('.multisteps-form__textarea'),
            stepFormPanelClass: 'multisteps-form__panel',
            stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
            stepPrevBtnClass: 'js-btn-prev',
            stepNextBtnClass: 'js-btn-next'
        };

        //remove class from a set of items
        const removeClasses = (elemSet, className) => {
            elemSet.forEach(elem => {
                elem.classList.remove(className);
            });
        };
        //return exect parent node of the element
        const findParent = (elem, parentClass) => {
            let currentNode = elem;
            while (!currentNode.classList.contains(parentClass)) {
                currentNode = currentNode.parentNode;
            }
            return currentNode;
        };
        //get active button step number
        const getActiveStep = elem => {
            return Array.from(DOMstrings.stepsBtns).indexOf(elem);
        };
        //set all steps before clicked (and clicked too) to active
        const setActiveStep = activeStepNum => {
            //remove active state from all the state
            removeClasses(DOMstrings.stepsBtns, 'js-active');
            //set picked items to active
            DOMstrings.stepsBtns.forEach((elem, index) => {
                if (index <= activeStepNum) {
                    elem.classList.add('js-active');
                }
            });
        };
        //get active panel
        const getActivePanel = () => {
            let activePanel;
            DOMstrings.stepFormPanels.forEach(elem => {
                if (elem.classList.contains('js-active')) {
                    activePanel = elem;
                }
            });
            return activePanel;
        };
        //open active panel (and close unactive panels)
        const setActivePanel = activePanelNum => {
            //remove active class from all the panels
            removeClasses(DOMstrings.stepFormPanels, 'js-active');
            //show active panel
            DOMstrings.stepFormPanels.forEach((elem, index) => {
                if (index === activePanelNum) {
                    elem.classList.add('js-active');
                    setFormHeight(elem);
                }
            });
        };
        //set form height equal to current panel height
        const formHeight = activePanel => {
            const activePanelHeight = activePanel.offsetHeight;
            DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;
        };
        const setFormHeight = () => {
            const activePanel = getActivePanel();
            formHeight(activePanel);
        };
        //STEPS BAR CLICK FUNCTION
        DOMstrings.stepsBar.addEventListener('click', e => {
            //check if click target is a step button
            const eventTarget = e.target;
            if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
                return;
            }
            //get active button step number
            const activeStep = getActiveStep(eventTarget);
            //set all steps before clicked (and clicked too) to active
            setActiveStep(activeStep);
            //open active panel
            setActivePanel(activeStep);
        });
        //PREV/NEXT BTNS CLICK
        DOMstrings.stepsForm.addEventListener('click', e => {
            const eventTarget = e.target;
            //check if we clicked on `PREV` or NEXT` buttons
        if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList
                .contains(`${DOMstrings.stepNextBtnClass}`))) {
            return;
        }
        //find active panel
        const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);
        let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);
        //set active step and active panel onclick
        if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
                activePanelNum--;
            } else {
                activePanelNum++;
            }
            setActiveStep(activePanelNum);
            setActivePanel(activePanelNum);
        });
        //SETTING PROPER FORM HEIGHT ONLOAD
        window.addEventListener('load', setFormHeight, false);
        //SETTING PROPER FORM HEIGHT ONRESIZE
        window.addEventListener('resize', setFormHeight, false);
    </script>

    <script>
        $(function() {
            // Multiple images preview with JavaScript
            var multiImgPreview = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#images').on('change', function() {
                multiImgPreview(this, 'div.imgPreview');
            });
        });
    </script>


@endsection
