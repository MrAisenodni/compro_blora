@if ($contents)        
    @foreach ($contents as $content)
        <!-- ======================
            Features Layout 2
        ========================= -->
        <section class="features-layout2 pt-130 bg-overlay bg-overlay-primary">
            <div class="bg-img"><img src="{{ asset($content->picture) }}" alt="background"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-1">
                        <div class="heading__layout2 mb-50">
                        <h3 class="heading__title color-white">{{ $content->title }}</h3>
                        </div>
                    </div><!-- /col-lg-5 -->
                </div><!-- /.row -->
                <div class="row mb-100">
                    <div class="col-sm-3 col-md-3 col-lg-1 offset-lg-5">
                        <div class="heading__icon">
                            <i class="{{ $content->icon }}"></i>
                        </div>
                    </div><!-- /.col-lg-5 -->
                    <div class="col-sm-9 col-md-9 col-lg-6">
                        <p class="heading__desc font-weight-bold color-white mb-30">
                            {!! $content->description !!}
                        </p>
                        <a href="{{ $content->link_url }}" class="btn btn__white btn__link">
                            <i class="icon-arrow-right icon-filled"></i>
                            <span>{{ $content->link_title }}</span>
                        </a>
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                @if ($content->details)
                    <div class="row">
                        @foreach ($content->details as $detail)
                            <!-- Feature item #{{ $loop->iteration }} -->
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="feature-item">
                                    <div class="feature__img">
                                        <img src="{{ asset($detail->picture) }}" alt="service" loading="lazy">
                                    </div><!-- /.feature__img -->
                                    <div class="feature__content">
                                        <div class="feature__icon">
                                        <i class="{{ $detail->icon }}"></i>
                                        </div>
                                        <h4 class="feature__title">{{ $detail->title }}</h4>
                                    </div><!-- /.feature__content -->
                                    <a href="{{ $detail->url }}" class="btn__link">
                                        <i class="icon-arrow-right icon-outlined"></i>
                                    </a>
                                </div><!-- /.feature-item -->
                            </div><!-- /.col-lg-3 -->
                        @endforeach
                    </div>
                @endif
            </div><!-- /.container -->
        </section><!-- /.Features Layout 2 -->  
    @endforeach
@endif