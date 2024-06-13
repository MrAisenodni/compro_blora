@extends('layouts.main')

@section('title', $c_menu->title)
@section('meta-description', 'Rumah Sakit PKU Muhammadiyah Blora - Layanan kesehatan terbaik dengan fasilitas modern dan dokter spesialis berpengalaman. Terletak di Blora, Jawa Tengah, kami siap melayani kebutuhan medis Anda.')

@section('styles')
@endsection

@section('scripts')
@endsection

@section('content')
    {!! $c_menu->description !!}
    @includeIf('templates.slider', ['contents' => $sliders])
    @includeIf('templates.contact_1', ['contents' => null])
    {{-- @includeIf('templates.contact_2', ['contents' => $sliders]) --}}
    @includeIf('templates.feature_3', ['contents' => null])
    @includeif('templates.about_2', ['contents' => null])
    @includeIf('templates.service_1', ['contents' => $services])
    @includeIf('templates.work_process', ['contents' => null])

    <!-- Modal -->
    <div class="modal fade contact-panel__form" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <div class="row row-no-gutter feature-wrapper">
                        <div class="col-sm-12 col-md-12"> --}}
                            <div class="contact-panel mb-50" style="padding: 30px">
                                <nav class="nav nav-tabs">
                                    <a class="nav__link active" data-toggle="tab" href="#pasien_baru">Pasien Baru</a>
                                    <a class="nav__link" data-toggle="tab" href="#pasien_lama">Pasien Lama</a>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active mb-20 pt-20" id="pasien_baru">
                                        <form class="contact-panel__form" method="post" action="/contact" id="contactForm">
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
                                                    <label class="form-label" for="doctor">Dokter <span class="text-danger">*</span></label>
                                                    <div class="form-group">
                                                        <select class="form-control" id="doctor" name="doctor" required>
                                                            <option value="">=== Pilih Dokter ===</option>
                                                            <option value="1">DR. ZAKKY ANWAR, S.PD</option>
                                                            <option value="2">DR. MUFLI ROHYAN, S.PD</option>
                                                        </select>
                                                    </div>
                                                </div><!-- /.col-lg-6 -->
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <label class="form-label" for="schedule">Jadwal <span class="text-danger">*</span></label>
                                                    <div class="form-group">
                                                        <select class="form-control" id="schedule" name="schedule" required>
                                                            <option value="">=== Pilih Jadwal ===</option>
                                                            <option value="1">09:00 - 14:00</option>
                                                            <option value="2">14:00 - 20:00</option>
                                                        </select>
                                                    </div>
                                                </div><!-- /.col-lg-6 -->
                                            </div>
                                            <hr style="margin-top: -10px; border: 1px solid; margin-bottom: 10px">
                                            <div class="row" style="margin-right: 0px">
                                                <div class="col-3"><span class="text-danger">* Wajib diisi</span></div>
                                                <div class="col-3"></div>
                                                <div class="col-3"></div>
                                                <div class="col-3">
                                                    <button type="submit" class="btn btn__secondary btn__rounded btn__block btn__xhight mt-10">
                                                        <span>Ambil Antrian</span> <i class="icon-arrow-right"></i>
                                                    </button>
                                                    <div class="contact-result"></div>
                                                </div><!-- /.col-lg-12 -->
                                            </div><!-- /.row -->
                                        </form>
                                    </div><!-- /.desc-tab -->
                                    <div class="tab-pane fade mb-20 pt-20" id="pasien_lama">
                                        <form class="contact-panel__form" method="post" action="/contact" id="contactForm">
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
                                                    <label class="form-label" for="doctor">Dokter <span class="text-danger">*</span></label>
                                                    <div class="form-group">
                                                        <select class="form-control" id="doctor" name="doctor" required>
                                                            <option value="">=== Pilih Dokter ===</option>
                                                            <option value="1">DR. ZAKKY ANWAR, S.PD</option>
                                                            <option value="2">DR. MUFLI ROHYAN, S.PD</option>
                                                        </select>
                                                    </div>
                                                </div><!-- /.col-lg-6 -->
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <label class="form-label" for="schedule">Jadwal <span class="text-danger">*</span></label>
                                                    <div class="form-group">
                                                        <select class="form-control" id="schedule" name="schedule" required>
                                                            <option value="">=== Pilih Jadwal ===</option>
                                                            <option value="1">09:00 - 14:00</option>
                                                            <option value="2">14:00 - 20:00</option>
                                                        </select>
                                                    </div>
                                                </div><!-- /.col-lg-6 -->
                                            </div>
                                            <hr style="margin-top: -10px; border: 1px solid; margin-bottom: 10px">
                                            <div class="row" style="margin-right: 0px">
                                                <div class="col-3"><span class="text-danger">* Wajib diisi</span></div>
                                                <div class="col-3"></div>
                                                <div class="col-3"></div>
                                                <div class="col-3">
                                                    <button type="submit" class="btn btn__secondary btn__rounded btn__block btn__xhight mt-10">
                                                        <span>Ambil Antrian</span> <i class="icon-arrow-right"></i>
                                                    </button>
                                                    <div class="contact-result"></div>
                                                </div><!-- /.col-lg-12 -->
                                            </div><!-- /.row -->
                                        </form>
                                    </div><!-- /.desc-tab -->
                                </div>
                                
                            </div>
                        {{-- </div>
                    </div> --}}
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-2">
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-8">
                                
                            </div><!-- /.col-lg-7 -->
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection