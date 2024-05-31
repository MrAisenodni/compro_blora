@if ($contents)
    <!-- ============================
        contact info
    ============================== -->
    <section class="contact-info py-0">
        <div class="bg-img"><img src="{{ asset('/storage/contact_info/background.png') }}" alt="{{ $provider->title }}"></div>
        <div class="container">
            <div class="row row-no-gutter boxes-wrapper">
                @foreach ($contents as $content)
                    <div class="col-sm-12 col-md-4">
                        <div class="contact-box d-flex">
                            <div class="contact__icon">
                                <i class="{{ $content->icon }}"></i>
                            </div><!-- /.contact__icon -->
                            <div class="contact__content">
                                <h2 class="contact__title">{{ $content->title }}</h2>
                                {!! $content->description !!}
                            </div><!-- /.contact__content -->
                        </div><!-- /.contact-box -->
                    </div><!-- /.col-md-4 -->
                @endforeach
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.contact-info -->
@endif