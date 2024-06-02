@if ($contents)
    <!-- ======================
    Features Layout 3
    ========================= -->
    <section class="features-layout3 py-0">
        <div class="bg-img"><img src="{{ asset('/storage/features/background.webp') }}" alt="{{ $provider->title }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="row row-no-gutter feature-wrapper">
                        <!-- Feature item #1 -->
                        <div class="col-sm-12 col-md-4">
                            <div class="feature-item">
                                <div class="feature__content">
                                    <div class="feature__icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                    <h4 class="feature__title">Medical Advices &amp; Check Ups</h4>
                                </div><!-- /.feature__content -->
                            </div><!-- /.feature-item -->
                        </div><!-- /.col-md-4 -->
                        <!-- Feature item #2 -->
                        <div class="col-sm-12 col-md-4">
                            <div class="feature-item">
                                <div class="feature__content">
                                    <div class="feature__icon">
                                        <i class="icon-doctor"></i>
                                    </div>
                                    <h4 class="feature__title">Trusted Medical Treatment </h4>
                                </div><!-- /.feature__content -->
                            </div><!-- /.feature-item -->
                        </div><!-- /.col-md-4 -->
                        <!-- Feature item #3 -->
                        <div class="col-sm-12 col-md-4">
                            <div class="feature-item">
                                <div class="feature__content">
                                    <div class="feature__icon">
                                        <i class="icon-ambulance"></i>
                                    </div>
                                    <h4 class="feature__title">Emergency Help Available 24/7</h4>
                                </div><!-- /.feature__content -->
                            </div><!-- /.feature-item -->
                        </div><!-- /.col-md-4 -->
                    </div><!-- /.row -->
                </div><!-- /.col-lg-8 -->
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="feature-item feature-item-custom">
                        <div class="feature__content">
                            <h4 class="feature__title">Doctors Timetable</h4>
                            <p class="feature__desc">
                                Qualified doctors available six days a week, view timetable to make anappointment.</p>
                            <a href="doctors-timetable.html" class="btn btn__white btn__link">
                                <span>View Timetable</span>
                                <i class="icon-arrow-right"></i>
                            </a>
                        </div><!-- /.feature__content -->
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
@endif