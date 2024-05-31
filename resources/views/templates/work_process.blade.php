@if ($contents)
    @foreach ($contents as $content)
        <!-- ======================
            Work Process 
        ========================= -->
        <section class="work-process work-process-carousel pt-130 pb-0 bg-overlay bg-overlay-secondary">
            <div class="bg-img"><img src="{{ asset('/storage/work_process/'.$content->picture) }}" alt="{{ $provider->title }}"></div>
            <div class="container">
                <div class="row heading-layout2">
                    <div class="col-12">
                        <h2 class="heading__subtitle color-primary">{{ $content->title }}</h2>
                    </div><!-- /.col-12 -->
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-5">
                        <h3 class="heading__title color-white">{{ $content->subtitle }}</h3>
                    </div><!-- /.col-xl-5 -->
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 offset-xl-1">
                        {!! $content->description !!}
                    </div><!-- /.col-xl-6 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="carousel-container mt-90">
                            <div class="slick-carousel"
                                data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "infinite":false, "arrows": false, "dots": false, "responsive": [{"breakpoint": 1200, "settings": {"slidesToShow": 3}}, {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                                @if ($content->details)
                                    @foreach ($content->details as $detail)
                                        <!-- process item #{{ $loop->iteration }} -->
                                        <div class="process-item">
                                            <span class="process__number">{{ $loop->iteration }}</span>
                                            <div class="process__icon">
                                                <i class="{{ $detail->icon }}"></i>
                                            </div><!-- /.process__icon -->
                                            <h4 class="process__title">{{ $detail->title }}</h4>
                                            <p class="process__desc">
                                                {!! $detail->description !!}
                                            </p>
                                            <a href="/work-process/{{ $detail->id }}" class="btn btn__secondary btn__link">
                                                <span>{{ $detail->link_name }}</span>
                                                <i class="icon-arrow-right"></i>
                                            </a>
                                        </div><!-- /.process-item -->
                                    @endforeach
                                @endif
                            </div><!-- /.carousel -->
                        </div>
                    </div><!-- /.col-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
            {{-- <div class="cta bg-light-blue">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-2 col-lg-2">
                            <img src="{{ asset('/images/icons/alert2.png') }}" class="cta__img" alt="alert">
                        </div><!-- /.col-lg-2 -->
                        <div class="col-sm-12 col-md-7 col-lg-7">
                            <h4 class="cta__title">True Healthcare For Your Family!</h4>
                            <p class="cta__desc">
                                Serve the community by improving the quality of life through better health. We have
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
            </div><!-- /.cta --> --}}
        </section><!-- /.Work Process -->
    @endforeach
@endif