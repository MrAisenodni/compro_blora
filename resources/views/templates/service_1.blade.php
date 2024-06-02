@if ($contents)
    @foreach ($contents as $content)
        <!-- ========================
            Services Layout 1
        =========================== -->
        <section class="services-layout1 services-carousel">
            <div class="bg-img"><img src="{{ asset('/storage/services/'.$content->picture) }}" alt="{{ $provider->title }}"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                        <div class="heading text-center mb-60">
                            <h2 class="heading__subtitle">{{ $content->subtitle }}</h2>
                            <h3 class="heading__title">{{ $content->title }}</h3>
                        </div><!-- /.heading -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                @if ($content->details)
                    <div class="row">
                        <div class="col-12">
                            <div class="slick-carousel" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                                @foreach ($content->details as $detail)
                                    <!-- service item #{{ $loop->iteration }} -->
                                    <div class="service-item">
                                        <div class="service__icon">
                                            <i class="{{ $detail->icon }}"></i>
                                            <i class="{{ $detail->icon }}"></i>
                                        </div><!-- /.service__icon -->
                                        <div class="service__content">
                                            <h4 class="service__title">{{ $detail->title }}</h4>
                                            {!! $detail->description !!}
                                            <a href="/service-facilities/{{ $detail->id }}" class="btn btn__secondary btn__outlined btn__rounded">
                                                <span>Read More</span>
                                                <i class="icon-arrow-right"></i>
                                            </a>
                                        </div><!-- /.service__content -->
                                    </div><!-- /.service-item -->
                                @endforeach
                        </div><!-- /.col-12 -->
                    </div><!-- /.row -->
                @endif
            </div><!-- /.container -->
        </section><!-- /.Services Layout 1 -->
    @endforeach
@endif