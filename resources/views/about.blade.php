@extends('layouts.main')

@section('title', 'Dashboard')

@section('styles')
@endsection

@section('scripts')
@endsection

@section('content')
    @includeIf('templates.slider', ['contents' => $sliders])
    @includeIf('templates.contact_info', ['contents' => $contact_infos])
    @includeif('templates.about_2', ['content' => $sliders])

    <!-- ======================
        Features Layout 2
    ========================= -->
    <section class="features-layout2 pt-130 bg-overlay bg-overlay-primary">
        <div class="bg-img"><img src="{{ asset('/images/backgrounds/2.jpg') }}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-1">
                    <div class="heading__layout2 mb-50">
                    <h3 class="heading__title color-white">Medcity Has Touched The Lives Of Patients & Providing Care for The
                        Sickest In Our Community.</h3>
                    </div>
                </div><!-- /col-lg-5 -->
            </div><!-- /.row -->
            <div class="row mb-100">
                <div class="col-sm-3 col-md-3 col-lg-1 offset-lg-5">
                    <div class="heading__icon">
                        <i class="icon-insurance"></i>
                    </div>
                </div><!-- /.col-lg-5 -->
                <div class="col-sm-9 col-md-9 col-lg-6">
                    <p class="heading__desc font-weight-bold color-white mb-30">
                        Medcity has been present in Europe since 1990, offering innovative
                        solutions, specializing in medical services for treatment of medical infrastructure. With over 100
                        professionals actively participates in numerous initiatives aimed at creating sustainable change for
                        patients!
                    </p>
                    <a href="#" class="btn btn__white btn__link">
                        <i class="icon-arrow-right icon-filled"></i>
                        <span>Our Core Values</span>
                    </a>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <div class="row">
                <!-- Feature item #1 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__img">
                            <img src="{{ asset('/images/services/1.jpg') }}" alt="service" loading="lazy">
                        </div><!-- /.feature__img -->
                        <div class="feature__content">
                            <div class="feature__icon">
                            <i class="icon-heart"></i>
                            </div>
                            <h4 class="feature__title">Medical Advices & Check Ups</h4>
                        </div><!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->
            </div>
        </div><!-- /.container -->
    </section><!-- /.Features Layout 2 -->

    <!-- ======================
        Work Process 
    ========================= -->
    <section class="work-process work-process-carousel pt-130 pb-0 bg-overlay bg-overlay-secondary">
        <div class="bg-img"><img src="{{ asset('/images/banners/1.jpg') }}" alt="background"></div>
        <div class="container">
            <div class="row heading-layout2">
            <div class="col-12">
                <h2 class="heading__subtitle color-primary">Caring For The Health Of You And Your Family.</h2>
            </div><!-- /.col-12 -->
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-5">
                <h3 class="heading__title color-white">We Provide All Aspects Of Medical Practice For Your Whole Family!
                </h3>
            </div><!-- /.col-xl-5 -->
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 offset-xl-1">
                <p class="heading__desc font-weight-bold color-gray mb-40">We will work with you to develop individualised
                care
                plans, including
                management of chronic diseases. If we cannot assist, we can provide referrals or advice about the type of
                practitioner you require. We treat all enquiries sensitively and in the strictest confidence.
                </p>
                <ul class="list-items list-items-layout2 list-items-light list-horizontal list-unstyled">
                <li>Fractures and dislocations</li>
                <li>Health Assessments</li>
                <li>Desensitisation injections</li>
                <li>High Quality Care</li>
                <li>Desensitisation injections</li>
                </ul>
            </div><!-- /.col-xl-6 -->
            </div><!-- /.row -->
            <div class="row">
            <div class="col-12">
                <div class="carousel-container mt-90">
                <div class="slick-carousel"
                    data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "infinite":false, "arrows": false, "dots": false, "responsive": [{"breakpoint": 1200, "settings": {"slidesToShow": 3}}, {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                    <!-- process item #1 -->
                    <div class="process-item">
                    <span class="process__number">01</span>
                    <div class="process__icon">
                        <i class="icon-health-report"></i>
                    </div><!-- /.process__icon -->
                    <h4 class="process__title">Fill In Our Medical Application</h4>
                    <p class="process__desc">Medcity offers low-cost health coverage for adults with limited income, you
                        can
                        enroll.</p>
                    <a href="#" class="btn btn__secondary btn__link">
                        <span>Doctors’ Timetable</span>
                        <i class="icon-arrow-right"></i>
                    </a>
                    </div><!-- /.process-item -->
                    <!-- process-item #2 -->
                    <div class="process-item">
                    <span class="process__number">02</span>
                    <div class="process__icon">
                        <i class="icon-dna"></i>
                    </div><!-- /.process__icon -->
                    <h4 class="process__title">Review Your Family Medical History</h4>
                    <p class="process__desc">Regular health exams can help find all the problems, also can find it early
                        chances.</p>
                    <a href="#" class="btn btn__secondary btn__link">
                        <span>Start A Check Up</span>
                        <i class="icon-arrow-right"></i>
                    </a>
                    </div><!-- /.process-item -->
                    <!-- process-item #3 -->
                    <div class="process-item">
                    <span class="process__number">03</span>
                    <div class="process__icon">
                        <i class="icon-medicine"></i>
                    </div><!-- /.process__icon -->
                    <h4 class="process__title">Choose Between Our Care Programs</h4>
                    <p class="process__desc">We have protocols to protect our patients while continuing to provide
                        necessary
                        care.</p>
                    <a href="#" class="btn btn__secondary btn__link">
                        <span>Explore Programs</span>
                        <i class="icon-arrow-right"></i>
                    </a>
                    </div><!-- /.process-item -->
                    <!-- process-item #4 -->
                    <div class="process-item">
                    <span class="process__number">04</span>
                    <div class="process__icon">
                        <i class="icon-stethoscope"></i>
                    </div><!-- /.process__icon -->
                    <h4 class="process__title">Introduce You To Highly Qualified Doctors</h4>
                    <p class="process__desc">Our administration and support staff have exceptional skills and trained to
                        assist you. </p>
                    <a href="#" class="btn btn__secondary btn__link">
                        <span>Meet Our Doctors</span>
                        <i class="icon-arrow-right"></i>
                    </a>
                    </div><!-- /.process-item -->
                    <!-- process-item #5 -->
                    <div class="process-item">
                    <span class="process__number">05</span>
                    <div class="process__icon">
                        <i class="icon-head"></i>
                    </div><!-- /.process__icon -->
                    <h4 class="process__title">Your custom Next process</h4>
                    <p class="process__desc">Our administration and support staff have exceptional skills to assist you.
                    </p>
                    <a href="#" class="btn btn__secondary btn__link">
                        <span>Meet Our Doctors</span>
                        <i class="icon-arrow-right"></i>
                    </a>
                    </div><!-- /.process-item -->
                </div><!-- /.carousel -->
                </div>
            </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
        <div class="cta bg-light-blue">
            <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-2 col-lg-2">
                <img src="{{ asset('/images/icons/alert2.png') }}" class="cta__img" alt="alert">
                </div><!-- /.col-lg-2 -->
                <div class="col-sm-12 col-md-7 col-lg-7">
                <h4 class="cta__title">True Healthcare For Your Family!</h4>
                <p class="cta__desc">Serve the community by improving the quality of life through better health. We have
                    put protocols to protect our patients and staff while continuing to provide medically necessary care.
                </p>
                </div><!-- /.col-lg-7 -->
                <div class="col-sm-12 col-md-12 col-lg-3">
                <a href="appointment.html" class="btn btn__primary btn__secondary-style2 btn__rounded">
                    <span>Healthcare Programs</span>
                    <i class="icon-arrow-right"></i>
                </a>
                </div><!-- /.col-lg-3 -->
            </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.cta -->
    </section><!-- /.Work Process -->
@endsection