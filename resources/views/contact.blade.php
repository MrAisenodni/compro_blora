@extends('layouts.main')

@section('title', $c_menu->title)
@section('meta-description', $c_menu->description)

@section('styles')
  <link rel="stylesheet" href="{{ asset('/js/select2/css/select2.min.css') }}">
@endsection

@section('scripts')
  <script src="{{ asset('/js/select2/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('/js/select2/select2-init.js') }}"></script>
  <script>
    // $(document).ready(function() {
    //   var api_url = '{!! env('API_URL'); !!}'
    //   var x_token = '{!! env('X_TOKEN'); !!}'

    //   $(".select2-ajax-doctor").select2({
    //     ajax: {
    //       url: api_url+'doctor',
    //       dataType: 'json',
    //       delay: 250,
    //       headers: {
    //           'x-token': x_token
    //       },
    //       data: function (params) {
    //         return {
    //           q: params.term
    //         }
    //       },
    //       processResults: function (data) {
    //           return {
    //               results: data.map(function (item) {
    //                   return {
    //                       id: item.doctor_code,
    //                       text: '('+item.poli_code+') '+item.doctor_name
    //                   }
    //               })
    //           }
    //       },
    //       cache: true
    //     },
    //     placeholder: '=== Pilih Dokter ==='
    //   });
    // })
  </script>
@endsection

@section('content')
  <h1 style="display: none">{{ $provider->title }}</h1>
  <div style="display: none">{{ $c_menu->description }}</div>

  {{-- Tarik Data dari LAWU API Service --}}
  @php
    // Ambil Data Dokter dan Poli
    $response = AppHelper::api(env('API_URL').'doctor', 'GET', null, null);
    $doctors = json_decode($response)->response->data;

    // Ambil Data Jadwal Dokter
    $response = AppHelper::api(env('API_URL').'doctor_time_input', 'GET', null, null);
    $times = json_decode($response)->response->data;
  @endphp

  <!-- ========================= 
          Google Map
  =========================  -->
  <section class="google-map py-0">
    <iframe frameborder="0" height="500" width="100%" src="{!! $provider->maps !!}"></iframe>
  </section><!-- /.GoogleMap -->
  
      <!-- ==========================
          contact layout 1
      =========================== -->
      <section id="kontak" class="contact-layout1 pt-0 mt--100">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="contact-panel d-flex flex-wrap">
                <div class="contact-panel__form">
                  <nav class="nav nav-tabs">
                    <a class="nav__link active" data-toggle="tab" href="#pasien_baru">Pasien Baru</a>
                    <a class="nav__link" data-toggle="tab" href="#pasien_lama">Pasien Lama</a>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active mb-20 pt-20" id="pasien_baru">
                        <form class="" method="post" action="{{ $c_menu->url }}" id="contactForm">
                            @csrf
                            <h4 class="contact-panel__title">Data Pasien</h4>
                            <hr style="margin-top: -10px; border: 1px solid; margin-bottom: 10px">
                            <input type="hidden" name="type" value="new">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label class="form-label" for="nik">NIK <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <i class="icon-news form-group-icon"></i>
                                        <input type="text" class="form-control" placeholder="NIK" id="nik" name="nik" value="{{ old('nik') }}" required>
                                    </div>
                                </div><!-- /.col-lg-4 -->
                                <div class="col-sm-12 col-md-6 col-lg-5">
                                    <label class="form-label" for="full_name">Nama Lengkap <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <i class="icon-user form-group-icon"></i>
                                        <input type="text" class="form-control" placeholder="Nama Lengkap" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
                                    </div>
                                </div><!-- /.col-lg-5 -->
                                <div class="col-sm-12 col-md-2 col-lg-3">
                                    <label class="form-label" for="gender">Jenis Kelamin <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select class="form-control" id="gender" name="gender" required>
                                            <option value="" disabled selected>Jenis Kelamin</option>
                                            <option value="L" @if(old('gender') == 'L') selected @endif>Pria</option>
                                            <option value="P" @if(old('gender') == 'P') selected @endif>Wanita</option>
                                        </select>
                                    </div>
                                </div><!-- /.col-lg-3 -->
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <label class="form-label" for="birth_date">Tanggal Lahir <span class="text-danger">*</span></label>
                                    <div class="form-group form-group-date">
                                        <i class="icon-calendar form-group-icon"></i>
                                        <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}" required>
                                    </div>
                                </div><!-- /.col-lg-4 -->
                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <label class="form-label" for="email">Email</label>
                                    <div class="form-group">
                                        <i class="icon-email form-group-icon"></i>
                                        <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{ old('email') }}">
                                    </div>
                                </div><!-- /.col-lg-4 -->
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <label class="form-label" for="phone_no">No HP</label>
                                    <div class="form-group">
                                        <i class="icon-phone form-group-icon"></i>
                                        <input type="text" class="form-control" placeholder="No HP" id="phone_no" name="phone_no" value="{{ old('phone_no') }}">
                                    </div>
                                </div><!-- /.col-lg-4 -->
                            </div>
                            <h4 class="contact-panel__title">Booking Dokter</h4>
                            <hr style="margin-top: -10px; border: 1px solid; margin-bottom: 10px">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label class="form-label" for="new_doctor">Dokter <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select class="form-control single-select" id="new_doctor" name="doctor" required>
                                            <option value="">=== Pilih Dokter ===</option>
                                            @if ($doctors)
                                                @foreach ($doctors as $doctor)
                                                  <option value="{{ $doctor->doctor_code.'_'.$doctor->poli_code }}">({{ $doctor->poli_name }}) {{ $doctor->doctor_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div><!-- /.col-lg-6 -->
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label class="form-label" for="new_schedule">Jadwal <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select class="form-control single-select" id="new_schedule" name="schedule" required>
                                            <option value="">=== Pilih Jadwal ===</option>
                                            @if ($times)
                                                @foreach ($times as $time)
                                                    <option value="{{ $time->book_time }}">{{ date('H:i', strtotime($time->book_time)) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div><!-- /.col-lg-6 -->
                            </div>
                            <hr style="margin-top: -10px; border: 1px solid; margin-bottom: 10px">
                            <div class="row" style="margin-right: 0px">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><span class="text-danger">* Wajib diisi</span></div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-right pr-0">
                                    <button type="submit" class="btn btn__secondary btn__rounded btn-custom">
                                        <span>Ambil Antrian</span> <i class="icon-arrow-right"></i>
                                    </button>
                                    <div class="contact-result"></div>
                                </div><!-- /.col-lg-12 -->
                            </div><!-- /.row -->
                        </form>
                    </div><!-- /.desc-tab -->
                    <div class="tab-pane fade mb-20 pt-20" id="pasien_lama">
                        <form class="" method="post" action="{{ $c_menu->url }}" id="contactForm">
                            @csrf
                            <h4 class="contact-panel__title">Data Pasien</h4>
                            <hr style="margin-top: -10px; border: 1px solid; margin-bottom: 10px">
                            <input type="hidden" name="type" value="old">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label class="form-label" for="mr_no">No RM <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <i class="icon-bandage form-group-icon"></i>
                                        <input type="text" class="form-control" placeholder="No RM" id="mr_no" name="mr_no" value="{{ old('mr_no') }}" required>
                                    </div>
                                </div><!-- /.col-lg-4 -->
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label class="form-label" for="nik">NIK <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <i class="icon-news form-group-icon"></i>
                                        <input type="text" class="form-control" placeholder="NIK" id="nik" name="nik" value="{{ old('nik') }}" required>
                                    </div>
                                </div><!-- /.col-lg-4 -->
                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <label class="form-label" for="birth_date">Tanggal Lahir <span class="text-danger">*</span></label>
                                    <div class="form-group form-group-date">
                                        <i class="icon-calendar form-group-icon"></i>
                                        <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}" required>
                                    </div>
                                </div><!-- /.col-lg-4 -->
                            </div>
                            <h4 class="contact-panel__title">Booking Dokter</h4>
                            <hr style="margin-top: -10px; border: 1px solid; margin-bottom: 10px">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label class="form-label" for="old_doctor">Dokter <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select class="single-select" id="old_doctor" name="doctor" required>
                                            <option value="">=== Pilih Dokter ===</option>
                                            @if ($doctors)
                                                @foreach ($doctors as $doctor)
                                                  <option value="{{ $doctor->doctor_code.'_'.$doctor->poli_code }}">({{ $doctor->poli_name }}) {{ $doctor->doctor_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div><!-- /.col-lg-6 -->
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label class="form-label" for="old_schedule">Jadwal <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select class="form-control single-select" id="old_schedule" name="schedule" required>
                                            <option value="">=== Pilih Jadwal ===</option>
                                            @if ($times)
                                                @foreach ($times as $time)
                                                <option value="{{ $time->book_time }}">{{ date('H:i', strtotime($time->book_time)) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div><!-- /.col-lg-6 -->
                            </div>
                            <hr style="margin-top: -10px; border: 1px solid; margin-bottom: 10px">
                            <div class="row" style="margin-right: 0px">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><span class="text-danger">* Wajib diisi</span></div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-right pr-0">
                                    <button type="submit" class="btn btn__secondary btn__rounded btn-custom">
                                        <span>Ambil Antrian</span> <i class="icon-arrow-right"></i>
                                    </button>
                                    <div class="contact-result"></div>
                                </div><!-- /.col-lg-12 -->
                            </div><!-- /.row -->
                        </form>
                    </div><!-- /.desc-tab -->
                </div>
                </div>
                <div class="contact-panel__info d-flex flex-column justify-content-between bg-overlay bg-overlay-primary-gradient">
                  <div class="bg-img"><img src="{{ asset('/images/banners/1.jpg') }}" alt="RS Muhammadiyah Blora"></div>
                  <div>
                    <h4 class="contact-panel__title color-white">Jadwal Dokter Hari Ini</h4>
                  </div>
                  <div>
                    <ul class="contact__list list-unstyled mb-30">
                      @php
                        $dayz = date('w', strtotime("+1 day", strtotime(now())));
                        $dayz = $dayz + 1;
                        $response = AppHelper::api(env('API_URL').'doctor_schedule/'.$dayz, 'GET', null, null);
                        $schedules = json_decode($response)->response->data;
                      @endphp

                      @if ($schedules)
                        @for ($i = 0; $i < 5; $i++)
                          <li>
                            <i class="icon-clock"></i><a href="/jadwal-dokter/{{ $schedules[$i]->doctor_code }}">{{ $schedules[$i]->doctor_name }} ({{ $schedules[$i]->poli_name }}): <b>{{ date('H:i', strtotime($schedules[$i]->start_time)) }}-{{ date('h:i', strtotime($schedules[$i]->end_time)) }}</b></a>
                          </li>
                        @endfor
                      @endif
                      <li>
                        <i class="icon-location"></i><a href="{{ $provider->maps }}">Lokasi: {{ $provider->address }}</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div><!-- /.col-lg-6 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.contact layout 1 -->
  
      <!-- ========================= 
        Testimonials layout 2
        =========================  -->
      <section class="testimonials-layout2 pt-40 pb-40">
        <div class="container">
          <div class="testimonials-wrapper">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-5">
                <div class="heading-layout2">
                  <h3 class="heading__title">Inspiring Stories!</h3>
                </div><!-- /.heading -->
              </div><!-- /.col-lg-5 -->
              <div class="col-sm-12 col-md-12 col-lg-7">
                <div class="slider-with-navs">
                  <!-- Testimonial #1 -->
                  <div class="testimonial-item">
                    <h3 class="testimonial__title">“Their doctors include highly qualified practitioners who come from a
                      range of backgrounds and bring with them a diversity of skills and special interests. They also have
                      registered nurses on staff who are available to triage any urgent matters, and the administration
                      and support staff all have exceptional people skills”
                    </h3>
                  </div><!-- /. testimonial-item -->
                  <!-- Testimonial #2 -->
                  <div class="testimonial-item">
                    <h3 class="testimonial__title">“Their doctors include highly qualified practitioners who come from a
                      range of backgrounds and bring with them a diversity of skills and special interests. They also have
                      registered nurses on staff who are available to triage any urgent matters, and the administration
                      and support staff all have exceptional people skills”
                    </h3>
                  </div><!-- /. testimonial-item -->
                  <!-- Testimonial #3 -->
                  <div class="testimonial-item">
                    <h3 class="testimonial__title">“Their doctors include highly qualified practitioners who come from a
                      range of backgrounds and bring with them a diversity of skills and special interests. They also have
                      registered nurses on staff who are available to triage any urgent matters, and the administration
                      and support staff all have exceptional people skills”
                    </h3>
                  </div><!-- /. testimonial-item -->
                </div><!-- /.slick-carousel -->
                <div class="slider-nav mb-60">
                  <div class="testimonial__meta">
                    <div class="testimonial__thmb">
                      <img src="assets/images/testimonials/thumbs/1.png" alt="author thumb">
                    </div><!-- /.testimonial-thumb -->
                    <div>
                      <h4 class="testimonial__meta-title">Sami Wade</h4>
                      <p class="testimonial__meta-desc">7oroof Inc</p>
                    </div>
                  </div><!-- /.testimonial-meta -->
                  <div class="testimonial__meta">
                    <div class="testimonial__thmb">
                      <img src="assets/images/testimonials/thumbs/2.png" alt="author thumb">
                    </div><!-- /.testimonial-thumb -->
                    <div>
                      <h4 class="testimonial__meta-title">Ahmed</h4>
                      <p class="testimonial__meta-desc">Web Inc</p>
                    </div>
                  </div><!-- /.testimonial-meta -->
                  <div class="testimonial__meta">
                    <div class="testimonial__thmb">
                      <img src="assets/images/testimonials/thumbs/3.png" alt="author thumb">
                    </div><!-- /.testimonial-thumb -->
                    <div>
                      <h4 class="testimonial__meta-title">Sonia Blake</h4>
                      <p class="testimonial__meta-desc">Web Inc</p>
                    </div>
                  </div><!-- /.testimonial-meta -->
                </div><!-- /.slider-nav -->
              </div><!-- /.col-lg-7 -->
            </div><!-- /.row -->
          </div><!-- /.testimonials-wrapper -->
        </div><!-- /.container -->
      </section><!-- /.testimonials layout 2 -->
  
      <!-- ========================
       gallery
      =========================== -->
      <section class="gallery pt-0 pb-90">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="slick-carousel"
                data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "autoplay": true, "arrows": true, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                <a class="popup-gallery-item" href="assets/images/gallery/1.jpg">
                  <img src="assets/images/gallery/1.jpg" alt="gallery img">
                </a>
                <a class="popup-gallery-item" href="assets/images/gallery/2.jpg">
                  <img src="assets/images/gallery/2.jpg" alt="gallery img">
                </a>
                <a class="popup-gallery-item" href="assets/images/gallery/3.jpg">
                  <img src="assets/images/gallery/3.jpg" alt="gallery img">
                </a>
                <a class="popup-gallery-item" href="assets/images/gallery/4.jpg">
                  <img src="assets/images/gallery/4.jpg" alt="gallery img">
                </a>
                <a class="popup-gallery-item" href="assets/images/gallery/5.jpg">
                  <img src="assets/images/gallery/5.jpg" alt="gallery img">
                </a>
                <a class="popup-gallery-item" href="assets/images/gallery/6.jpg">
                  <img src="assets/images/gallery/6.jpg" alt="gallery img">
                </a>
              </div><!-- /.gallery-images-wrapper -->
            </div><!-- /.col-xl-5 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.gallery 2 -->
@endsection