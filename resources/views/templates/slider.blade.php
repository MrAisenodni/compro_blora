@if ($contents)
    <!-- ============================
        Slider
    ============================== -->
    <section class="slider">
        <div class="slick-carousel m-slides-0" data-slick='{"slidesToShow": 1, "arrows": true, "dots": false, "speed": 700,"fade": true,"cssEase": "linear"}'>
            @foreach ($contents as $content)
                <div class="slide-item align-v-h">
                    <div class="bg-img"><img src="{{ asset('/storage/sliders/' . $content->picture) }}" alt="{{ $provider->title }}"></div>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
                                <div class="slide__content">
                                    <h2 class="slide__title">{{ $content->title }}</h2>
                                    <p class="slide__desc">
                                        {{ $content->description }}
                                    </p>
                                </div><!-- /.slide-content -->
                            </div><!-- /.col-xl-7 -->
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div><!-- /.slide-item -->
            @endforeach
        </div><!-- /.carousel -->            
    </section><!-- /.slider -->
@endif