@extends('layouts.main')

@section('title', $c_menu->title)
@section('meta-description', $c_menu->description)

@section('styles')
@endsection

@section('scripts')
@endsection

@section('content')
    <h1 style="display: none">{{ $provider->title }}</h1>
    <div style="display: none">{{ $c_menu->descrtiption }}</div>

    <!-- ========================
        page title 
    =========================== -->
    <section class="page-title page-title-layout1 bg-overlay">
        <div class="bg-img"><img src="{{ asset('/storage/abouts/compro.jpeg') }}" alt="{{ $provider->title }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
                    <h1 class="pagetitle__heading">Bismillah melayani dengan sepenuh hati</h1>
                    <p class="pagetitle__desc" style="color: white">
                        Gedung RS PKU Muhammadiyah Blora dengan kapasitas 86 tempat tidur, berada di
                        jalan nasional Blora - Cepu tepatnya di Jalan Raya Blora - Cepu Km. 3 Jepon - Blora,
                        sehingga mudah dijangkau. RS PKU Muhammadiyah Blora adalah milik Yayasan Muhammadiyah 
                        yang diwakili oleh Pimpinan Cabang Muhammadiyah Blora.
                    </p>
                </div><!-- /.col-xl-5 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ======================
        Features Layout 1
    ========================= -->
    <section class="features-layout1 pt-130 pb-50 mt--90">
        <div class="container">
            <div class="row mb-40">
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <div class="heading__layout2">
                        <h3 class="heading__title">MENJADI RUMAH SAKIT YANG MAMPU MEMBERIKAN PELAYANAN ISLAMI, UNGGUL DAN PROFESIONAL</h3>
                    </div>
                </div><!-- /col-lg-5 -->
                <div class="col-sm-12 col-md-12 col-lg-5 offset-lg-1">
                    <p class="heading__desc font-weight-bold">
                        MISI:
                        <ol>
                            <li class="heading__desc font-weight-bold">Mengembangkan RS sebagai sarana dakwah dan kaderisasi andalan persyarikatan</li>
                            <li class="heading__desc font-weight-bold">Menyediakan fasilitas kesehatan yang mampu bersaing dalam kemajuan teknologi</li>
                            <li class="heading__desc font-weight-bold">Menyelenggarakan pelayanan yang bermutu berdasarkan standar akreditasi Nasional</li>
                            <li class="heading__desc font-weight-bold">Meningkatkan kesejahteraan, penampilan dan kompetensi seluruh sumber daya insani rumah sakit</li>
                        </ol>
                    </p>
                    <div class="d-flex flex-wrap align-items-center mt-40 mb-30">
                        <a href="/kontak" class="btn btn__primary btn__rounded mr-30">
                            <span>Booking Jadwal</span>
                            <i class="icon-arrow-right"></i>
                        </a>
                        <a href="/fasilitas-pelayanan" class="btn btn__secondary btn__link">
                            <i class="icon-arrow-right icon-filled"></i>
                            <span>Fasilitas Pelayanan</span>
                        </a>
                    </div>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <div class="row">
                <!-- Feature item #1 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-heart"></i>
                                <i class="icon-heart feature__overlay-icon"></i>
                            </div>
                            <h4 class="feature__title">Stroke Center</h4>
                        </div><!-- /.feature__content -->
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->

                <!-- Feature item #2 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-ambulance"></i>
                                <i class="icon-ambulance feature__overlay-icon"></i>
                            </div>
                            <h4 class="feature__title">Instalasi Gawat Darurat (IGD) 24 Jam</h4>
                        </div><!-- /.feature__content -->
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->

                <!-- Feature item #3 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-doctor"></i>
                                <i class="icon-doctor feature__overlay-icon"></i>
                            </div>
                            <h4 class="feature__title">Instalasi Kamar Bedah (OK)</h4>
                        </div><!-- /.feature__content -->
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->
            
                <!-- Feature item #4 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-drugs"></i>
                                <i class="icon-drugs feature__overlay-icon"></i>
                            </div>
                            <h4 class="feature__title">Radiologi / Rontgen (24 Jam)</h4>
                        </div><!-- /.feature__content -->
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->

                <!-- Feature item #5 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-first-aid-kit"></i>
                                <i class="icon-first-aid-kit feature__overlay-icon"></i>
                            </div>
                            <h4 class="feature__title">
                                Poliklinik / Rawat Jalan 
                            </h4>
                        </div><!-- /.feature__content -->
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->

                <!-- Feature item #6 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-hospital"></i>
                                <i class="icon-hospital feature__overlay-icon"></i>
                            </div>
                            <h4 class="feature__title">Instalasi Farmasi (24 Jam)</h4>
                        </div><!-- /.feature__content -->
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->

                <!-- Feature item #7 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-expenses"></i>
                                <i class="icon-expenses feature__overlay-icon"></i>
                            </div>
                            <h4 class="feature__title">Instalasi Rekam Medik</h4>
                        </div><!-- /.feature__content -->
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->

                <!-- Feature item #8 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-bandage"></i>
                                <i class="icon-bandage feature__overlay-icon"></i>
                            </div>
                            <h4 class="feature__title">Instalasi Gizi</h4>
                        </div><!-- /.feature__content -->
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.Features Layout 1 -->

    <!-- ========================
        gallery
    =========================== -->
    <section class="gallery pt-0 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="slick-carousel" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "autoplay": true, "arrows": true, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                        <a class="popup-gallery-item" href="{{ asset('/storage/galleries/1.jpg') }}">
                            <img src="{{ asset('/storage/galleries/1.jpg') }}" alt="{{ $provider->title }}">
                        </a>
                        <a class="popup-gallery-item" href="{{ asset('/storage/galleries/2.jpg') }}">
                            <img src="{{ asset('/storage/galleries/2.jpg') }}" alt="{{ $provider->title }}">
                        </a>
                        <a class="popup-gallery-item" href="{{ asset('/storage/galleries/3.jpg') }}">
                            <img src="{{ asset('/storage/galleries/3.jpg') }}" alt="{{ $provider->title }}">
                        </a>
                        <a class="popup-gallery-item" href="{{ asset('/storage/galleries/4.jpg') }}">
                            <img src="{{ asset('/storage/galleries/4.jpg') }}" alt="{{ $provider->title }}">
                        </a>
                        <a class="popup-gallery-item" href="{{ asset('/storage/galleries/5.jpg') }}">
                            <img src="{{ asset('/storage/galleries/5.jpg') }}" alt="{{ $provider->title }}">
                        </a>
                        <a class="popup-gallery-item" href="{{ asset('/storage/galleries/6.jpg') }}">
                            <img src="{{ asset('/storage/galleries/6.jpg') }}" alt="{{ $provider->title }}">
                        </a>
                    </div><!-- /.gallery-images-wrapper -->
                </div><!-- /.col-xl-5 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.gallery 2 -->
@endsection