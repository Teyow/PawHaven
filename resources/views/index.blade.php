@extends('layouts.app')

@section('content')
    <div class="jumbotron homepage" data-aos="zoom-in">
        <div class="container homepage-content">
            <h1 class="display-3 hp-title text-white" data-aos="zoom-in">SAVE THE <span
                    style="color:#66E7CE; font-weight: 900"> PAWS</span> OF
                THE WORLD</h1>

            <div class="lead text-white" style="font-weight: 500; font-size:  1.5rem" data-aos="zoom-in">Let us help
                transform the lives of
                animals and find their way own home. </div>

            <a class="btn text-white mt-3 hp-button" href="{{ route('login') }}" role="button" data-aos="zoom-in">SAVE A LIFE</a>
        </div>
    </div>

    <div class="container features-section">    
        <h1 class="display-4 mt-4" style="font-weight: 500" data-aos="zoom-in">What <span style="color:#66E7CE;">We Do</span>
        </h1>

        <div class="row features-content">
            <div class="col-xl-6 col-lg-6 col-md-6 feature-container" data-aos="zoom-in">
                <span class="dot"><img class="features-img" src="{{ asset('img/features/adopt.png') }}" alt=""
                        srcset=""></span>
                <div class="features-heading">Adopt</div>
                <div class="features-caption">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo consectetur
                    commodi et iusto alias in assumenda!</div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 feature-container" data-aos="zoom-in">
                <span class="dot"><img class="features-img" src="{{ asset('img/features/visitation.png') }}"
                        alt="" srcset=""></span>
                <div class="features-heading">Visitation</div>
                <div class="features-caption">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo consectetur
                    commodi et iusto alias in assumenda!</div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 feature-container" data-aos="zoom-in">
                <span class="dot"><img class="features-img" src="{{ asset('img/features/volunteer.png') }}"
                        alt="" srcset=""></span>
                <div class="features-heading">Volunteer</div>
                <div class="features-caption">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo consectetur
                    commodi et iusto alias in assumenda!</div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 feature-container" data-aos="zoom-in">
                <span class="dot"><img class="features-img" src="{{ asset('img/features/donate.png') }}"
                        alt="" srcset=""></span>
                <div class="features-heading">Donate</div>
                <div class="features-caption">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo consectetur
                    commodi et iusto alias in assumenda!</div>
            </div>
        </div>
    </div>

    <div class="container-fluid stats-section">
        <div class="container stats-container">
            <div class="row">
                <div class="stats-content col-12 col-md-4 col-lg-4 col-xl-4" data-aos="flip-up">
                    <i class="fas fa-paw stats-icon"></i>
                    <div class="stats-number secondary-text">500</div>
                    <div class="stats-caption">Registered Animals</div>
                </div>
                <div class="stats-content col-12 col-md-4 col-lg-4 col-xl-4" data-aos="flip-up">
                    <i class="fas fa-home stats-icon"></i>
                    <div class="stats-number secondary-text">300</div>
                    <div class="stats-caption">Adopted Pets</div>
                </div>
                <div class="stats-content col-12 col-md-4 col-lg-4 col-xl-4" data-aos="flip-up">
                    <i class="fas fa-heart stats-icon"></i>
                    <div class="stats-number secondary-text">90</div>
                    <div class="stats-caption">Volunteers</div>
                </div>
            </div>
        </div>

    </div>

    <div class="container our-gallery text-center">
        <h1 class="display-4 mt-4" style="font-weight: 500">Our <span style="color:#66E7CE;">Gallery</span> </h1>
        <div class="container">
            <div class="gallery-image">
                <div class="img-box" data-aos="zoom-in">
                    <img src="{{ asset('img/gallery/1.jpg') }}" alt="" class="img-content" />
                </div>
                <div class="img-box" data-aos="zoom-in">
                    <img src="{{ asset('img/gallery/2.jpg') }}" alt="" class="img-content" />
                </div>
                <div class="img-box" data-aos="zoom-in">
                    <img src="{{ asset('img/gallery/3.jpg') }}" alt="" class="img-content" />
                </div>
                <div class="img-box" data-aos="zoom-in">
                    <img src="{{ asset('img/gallery/4.jpg') }}" alt="" class="img-content" />
                </div>
                <div class="img-box" data-aos="zoom-in">
                    <img src="{{ asset('img/gallery/5.jpg') }}" alt="" class="img-content" />
                </div>
                <div class="img-box" data-aos="zoom-in">
                    <img src="{{ asset('img/gallery/6.jpg') }}" alt="" class="img-content" />
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="page-footer font-small teal pt-4">
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 text-light" style="background-color: #7EC8DF; font-weight: 300">Powered by: QuadCore</div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

@endsection
