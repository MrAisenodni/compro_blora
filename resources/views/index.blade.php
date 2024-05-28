@extends('layouts.main')

@section('title', 'Dashboard')

@section('styles')
@endsection

@section('scripts')
@endsection

@section('content')
    <!-- ============================
        Slider
    ============================== -->
    <section class="slider">
        <div class="slick-carousel m-slides-0" data-slick='{"slidesToShow": 1, "arrows": true, "dots": false, "speed": 700,"fade": true,"cssEase": "linear"}'>
            <div class="slide-item align-v-h">
                <div class="bg-img" style="background-repeat: no-repeat; background-size: contain"><img src="{{ asset('/storage/slider/1_slider_1.jpg') }}" alt="slide img" height="100%"></div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
                            {{-- <div class="slide__content">
                                <h2 class="slide__title">Providing Best Medical Care</h2>
                                <p class="slide__desc">
                                    The health and well-being of our patients and their health care team will
                                    always be our priority, so we follow the best practices for cleanliness.
                                </p>
                            </div><!-- /.slide-content --> --}}
                        </div><!-- /.col-xl-7 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.slide-item -->
            <div class="slide-item align-v-h">
                <div class="bg-img"><img src="{{ asset('/storage/slider/1_slider_2.jpg') }}" alt="slide img"></div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
                            <div class="slide__content">
                                {{-- <h2 class="slide__title">Pelayanan Rawat Inap</h2>
                                <p class="slide__desc">
                                    The health and well-being of our patients and their health care team will
                                    always be our priority, so we follow the best practices for cleanliness.
                                </p> --}}
                            </div><!-- /.slide-content -->
                        </div><!-- /.col-xl-7 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.slide-item -->
        </div><!-- /.carousel -->
    </section><!-- /.slider -->

    <!-- ============================
        contact info
    ============================== -->
    <section class="contact-info py-0">
        <div class="container">
            <div class="row row-no-gutter boxes-wrapper">
                <div class="col-sm-12 col-md-4">
                    <div class="contact-box d-flex">
                        <div class="contact__icon">
                            <i class="icon-call3"></i>
                        </div><!-- /.contact__icon -->
                        <div class="contact__content">
                            <h2 class="contact__title">Emergency Cases</h2>
                            <p class="contact__desc">Please feel free to contact our friendly reception staff with any general or medical enquiry.</p>
                            <a href="tel:+201061245741" class="phone__number">
                                <i class="icon-phone"></i> <span>01061245741</span>
                            </a>
                        </div><!-- /.contact__content -->
                    </div><!-- /.contact-box -->
                </div><!-- /.col-md-4 -->
                <div class="col-sm-12 col-md-4">
                    <div class="contact-box d-flex">
                        <div class="contact__icon">
                            <i class="icon-health-report"></i>
                        </div><!-- /.contact__icon -->
                        <div class="contact__content">
                            <h2 class="contact__title">Doctors Timetable</h2>
                            <p class="contact__desc">Qualified doctors available six days a week, view our timetable to make an appointment.</p>
                            <a href="doctors-timetable.html" class="btn btn__white btn__outlined btn__rounded">
                                <span>View Timetable</span><i class="icon-arrow-right"></i>
                            </a>
                        </div><!-- /.contact__content -->
                    </div><!-- /.contact-box -->
                </div><!-- /.col-md-4 -->
                <div class="col-sm-12 col-md-4">
                    <div class="contact-box d-flex">
                        <div class="contact__icon">
                            <i class="icon-heart2"></i>
                        </div><!-- /.contact__icon -->
                        <div class="contact__content">
                            <h2 class="contact__title">Opening Hours</h2>
                            <ul class="time__list list-unstyled mb-0">
                                <li><span>Monday - Friday</span><span>8.00 - 7:00 pm</span></li>
                                <li><span>Saturday</span><span>9.00 - 10:00 pm</span></li>
                                <li><span>Sunday</span><span>10.00 - 12:00 pm</span></li>
                            </ul>
                        </div><!-- /.contact__content -->
                    </div><!-- /.contact-box -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.contact-info -->

    <!-- ========================
        Services Layout 1
    =========================== -->
    <section class="services-layout1 services-carousel">
        <div class="bg-img"><img src="{{ asset('/images/backgrounds/2.jpg') }}" alt="background"></div>
        <div class="container">
            <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                <div class="heading text-center mb-60">
                <h2 class="heading__subtitle">The Best Medical And General Practice Care!</h2>
                <h3 class="heading__title">Providing Medical Care For The Sickest In Our Community.</h3>
                </div><!-- /.heading -->
            </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <div class="row">
            <div class="col-12">
                <div class="slick-carousel"
                data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                <!-- service item #1 -->
                <div class="service-item">
                    <div class="service__icon">
                    <i class="icon-head"></i>
                    <i class="icon-head"></i>
                    </div><!-- /.service__icon -->
                    <div class="service__content">
                    <h4 class="service__title">Neurology Clinic</h4>
                    <p class="service__desc">Some neurologists receive subspecialty training focusing on a particular area
                        of
                        the fields, these training programs are called fellowships, and are one to two years.
                    </p>
                    <ul class="list-items list-items-layout1 list-unstyled">
                        <li>Neurocritical Care</li>
                        <li>Neuro Oncology</li>
                        <li>Geriatric Neurology</li>
                    </ul>
                    <a href="services-single.html" class="btn btn__secondary btn__outlined btn__rounded">
                        <span>Read More</span>
                        <i class="icon-arrow-right"></i>
                    </a>
                    </div><!-- /.service__content -->
                </div><!-- /.service-item -->
                <!-- service item #2 -->
                <div class="service-item">
                    <div class="service__icon">
                    <i class="icon-heart"></i>
                    <i class="icon-heart"></i>
                    </div><!-- /.service__icon -->
                    <div class="service__content">
                    <h4 class="service__title">Cardiology Clinic</h4>
                    <p class="service__desc">All cardiologists study the disorders of the heart, but the study of adult
                        and
                        child heart disorders are trained to take care of small children and adult heart disease.
                    </p>
                    <ul class="list-items list-items-layout1 list-unstyled">
                        <li>Neurocritical Care</li>
                        <li>Neuro Oncology</li>
                        <li>Geriatric Neurology</li>
                    </ul>
                    <a href="services-single.html" class="btn btn__secondary btn__outlined btn__rounded">
                        <span>Read More</span>
                        <i class="icon-arrow-right"></i>
                    </a>
                    </div><!-- /.service__content -->
                </div><!-- /.service-item -->
                <!-- service item #3 -->
                <div class="service-item">
                    <div class="service__icon">
                    <i class="icon-microscope"></i>
                    <i class="icon-microscope"></i>
                    </div><!-- /.service__icon -->
                    <div class="service__content">
                    <h4 class="service__title">Pathology Clinic</h4>
                    <p class="service__desc">Pathology is the study of disease, it is the bridge between science and
                        medicine.
                        Also it underpins every aspect of patient care, from diagnostic testing and treatment.
                    </p>
                    <ul class="list-items list-items-layout1 list-unstyled">
                        <li>Surgical Pathology</li>
                        <li>Histopathology</li>
                        <li>Cytopathology </li>
                    </ul>
                    <a href="services-single.html" class="btn btn__secondary btn__outlined btn__rounded">
                        <span>Read More</span>
                        <i class="icon-arrow-right"></i>
                    </a>
                    </div><!-- /.service__content -->
                </div><!-- /.service-item -->
                <!-- service item #4 -->
                <div class="service-item">
                    <div class="service__icon">
                    <i class="icon-dropper"></i>
                    <i class="icon-dropper"></i>
                    </div><!-- /.service__icon -->
                    <div class="service__content">
                    <h4 class="service__title">Laboratory Analysis</h4>
                    <p class="service__desc">Analyzing the radon or radon progeny concentrations with passive devices, or
                        the
                        act of calibrating radon or radon progeny measurement devices.
                    </p>
                    <ul class="list-items list-items-layout1 list-unstyled">
                        <li>Newborn Care</li>
                        <li>Umbilical Cord Appearance </li>
                        <li>Repositioning Techniques</li>
                    </ul>
                    <a href="services-single.html" class="btn btn__secondary btn__outlined btn__rounded">
                        <span>Read More</span>
                        <i class="icon-arrow-right"></i>
                    </a>
                    </div><!-- /.service__content -->
                </div><!-- /.service-item -->
                <!-- service item #5 -->
                <div class="service-item">
                    <div class="service__icon">
                    <i class="icon-heart3"></i>
                    <i class="icon-heart3"></i>
                    </div><!-- /.service__icon -->
                    <div class="service__content">
                    <h4 class="service__title">Pediatric Clinic</h4>
                    <p class="service__desc">Pediatric providers see patients from birth into early adulthood to make sure
                        children achieve stay healthy. Our care includes preventive health checkups.
                    </p>
                    <ul class="list-items list-items-layout1 list-unstyled">
                        <li>Clinical laboratory</li>
                        <li>Research Analyst</li>
                        <li>Quality Assurance</li>
                    </ul>
                    <a href="services-single.html" class="btn btn__secondary btn__outlined btn__rounded">
                        <span>Read More</span>
                        <i class="icon-arrow-right"></i>
                    </a>
                    </div><!-- /.service__content -->
                </div><!-- /.service-item -->
                <!-- service item #6 -->
                <div class="service-item">
                    <div class="service__icon">
                    <i class="icon-heart2"></i>
                    <i class="icon-heart2"></i>
                    </div><!-- /.service__icon -->
                    <div class="service__content">
                    <h4 class="service__title">Cardiac Clinic</h4>
                    <p class="service__desc">For people requiring additional follow up, the Cardiac Clinic provides rapid
                        access to professionals specialized in diagnosing and treating heart disease.
                    </p>
                    <ul class="list-items list-items-layout1 list-unstyled">
                        <li>Macular degeneration</li>
                        <li>Diabetic retinopathy</li>
                        <li>Excessive tearing</li>
                    </ul>
                    <a href="services-single.html" class="btn btn__secondary btn__outlined btn__rounded">
                        <span>Read More</span>
                        <i class="icon-arrow-right"></i>
                    </a>
                    </div><!-- /.service__content -->
                </div><!-- /.service-item -->
                </div>
            </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.Services Layout 1 -->

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