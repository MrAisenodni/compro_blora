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
    @includeIf('templates.slider', ['contents' => $sliders])

    <section class="contact-info py-0">
        <div class="container">
            <div class="row row-no-gutter boxes-wrapper">
                <div class="col-sm-12 col-md-6">
                    <div class="contact-box d-flex">
                        <div class="contact__icon">
                            <i class="icon-call3"></i>
                        </div><!-- /.contact__icon -->
                        <div class="contact__content">
                            <h2 class="contact__title">Keadaan Darurat</h2>
                            <p class="contact__desc">Jika Anda dalam keadaan darurat silahkan hubungi nomor di bawah ini:</p>
                            <a href="https://api.whatsapp.com/send?phone=6285225116868" class="phone__number">
                                <i class="icon-phone"></i> <span>6285225116868</span>
                            </a>
                        </div><!-- /.contact__content -->
                    </div><!-- /.contact-box -->
                </div><!-- /.col-md-6 -->
                <div class="col-sm-12 col-md-6">
                    <div class="contact-box d-flex">
                        <div class="contact__icon">
                            <i class="icon-health-report"></i>
                        </div><!-- /.contact__icon -->
                        <div class="contact__content">
                            <h2 class="contact__title">Pendaftaran Online</h2>
                            <p class="contact__desc">Silahkan melakukan pendaftaran online di bawah ini:</p>
                            <a href="/kontak" class="btn btn__white btn__rounded" style="height: 30px">
                                <span>Daftar Online</span><i class="icon-arrow-right"></i>
                            </a>
                        </div><!-- /.contact__content -->
                    </div><!-- /.contact-box -->
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    
    <!-- ============================
        Pendaftaran Pasien
    ============================== -->
    <div class="row">
        <div class="col-lg-12">
        </div>
    </div>
    @includeIf('templates.contact_1', ['contents' => null])
    {{-- @includeIf('templates.contact_2', ['contents' => $sliders]) --}}
    @includeIf('templates.feature_3', ['contents' => null])
    @includeif('templates.about_2', ['contents' => null])
    @includeIf('templates.service_1', ['contents' => $services])
    @includeIf('templates.work_process', ['contents' => null])
@endsection