@if ($contents)
    @foreach ($contents as $content)
        <!-- ========================
        Services Layout 2
        =========================== -->
        <section class="services-layout1 pt-130">
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
                        @foreach ($content->details as $detail)
                            <!-- service item #{{ $loop->iteration }} -->
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="service-item">
                                    <div class="service__icon">
                                        <i class="{{ $detail->icon }}"></i>
                                        <i class="{{ $detail->icon }}"></i>
                                    </div><!-- /.service__icon -->
                                    <div class="service__content">
                                        <h4 class="service__title">{{ $detail->title }}</h4>
                                        {!! $detail->description !!}
                                    </div><!-- /.service__content -->
                                </div><!-- /.service-item -->
                            </div><!-- /.col-lg-4 -->
                        @endforeach
                    </div><!-- /.row -->
                @endif
            </div><!-- /.container -->
        </section><!-- /.Features Layout 2 -->
    @endforeach
@endif