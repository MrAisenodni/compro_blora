@if ($content)
    <!-- ========================
        About Layout 2
    =========================== -->
    <section class="about-layout2 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-7 offset-lg-1">
                    <div class="heading-layout2">
                        <h3 class="heading__title mb-60">Improving The Quality Of Your <br> Life Through Better Health.</h3>
                    </div><!-- /heading -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <div class="text-with-icon">
                        <div class="text__icon">
                            <i class="icon-doctor"></i>
                        </div>
                        <div class="text__content">
                            <p class="heading__desc font-weight-bold color-secondary mb-30">Our goal is to deliver quality of care
                                in a courteous, respectful, and
                                compassionate manner. We hope you will allow us to care for you and strive to be the first and best
                                choice for healthcare.
                            </p>
                            <a href="/doctor-schedule" class="btn btn__secondary btn__rounded mb-70">
                                <span>Find A Doctor</span> <i class="icon-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="video-banner-layout2 bg-overlay">
                        <img src="{{ asset('/images/about/2.jpg') }}" alt="about" class="w-100">
                        <a class="video__btn video__btn-white popup-video" href="https://www.youtube.com/watch?v=-1AO79yjdNs">
                            <div class="video__player">
                                <i class="fa fa-play"></i>
                            </div>
                            <span class="video__btn-title color-white">Watch Our Video!</span>
                        </a>
                    </div><!-- /.video-banner -->
                </div><!-- /.col-lg-6 -->
                <div class="col-sm-12 col-md-12 col-lg-7">
                    <div class="about__text bg-white">
                        <p class="heading__desc mb-30">
                            Our goal is to deliver quality of care in a courteous, respectful, and compassionate
                            manner. We hope you will allow us to care for you and to be the first and best choice for healthcare.
                        </p>
                        <p class="heading__desc mb-30">
                            We will work with you to develop individualised care plans, including management of
                            chronic diseases. We are committed to being the region’s premier healthcare network providing patient
                            centered care that inspires clinical and service excellence.</p>
                        <ul class="list-items list-unstyled">
                            <li>We conduct a range of tests to help us work out why you're not feeling well and determine the
                                right
                                treatment for you.</li>
                            <li>Our expert doctors, nurses and allied health professionals manage patients with a broad range of
                                medical issues.
                            </li>
                            <li>We offer a wide range of care and support to our patients, from diagnosis to treatment and
                                rehabilitation.
                            </li>
                        </ul>
                    </div>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.About Layout 2 -->    
@endif