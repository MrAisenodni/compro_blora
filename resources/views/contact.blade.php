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
    // Hari dalam Seminggu
    function getDayInteger(day)
    {
      const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']

      return days.indexOf(day)
    }

    // Mengambil data Poli berdasarkan Hari
    function fetchPoliData(day)
    {
      const dayInteger = getDayInteger(day) + 1;
      const url = `{!! env('API_URL') !!}poli/${dayInteger}`
      const token = `{!! env('X_TOKEN') !!}`

      return $.ajax({
        url: url,
        dataType: 'json',
        method: 'GET',
        beforeSend: function(xhr) {
          xhr.setRequestHeader('x-token', token)
        }
      })
    }

    // Mengambil data Dokter berdasarkan Hari dan Poli
    function fetchDoctorData(day, poli)
    {
      const dayInteger = getDayInteger(day) + 1
      const poliCode = poli
      const url = `{!! env('API_URL') !!}doctor/${dayInteger}/${poliCode}`
      const token = `{!! env('X_TOKEN') !!}`

      return $.ajax({
        url: url,
        dataType: 'json',
        method: 'GET',
        beforeSend: function(xhr) {
          xhr.setRequestHeader('x-token', token)
        }
      })
    }

    // Mengambil data Jadwal Dokter berdasarkan Hari, Poli, dan Dokter
    function fetchDoctorScheduleData(day, poli, doctor)
    {
      const dayInteger  = getDayInteger(day) + 1
      const poliCode    = poli
      const doctorCode  = doctor
      const url         = `{!! env('API_URL') !!}doctor_schedule/${dayInteger}/${poliCode}/${doctorCode}`
      const token       = `{!! env('X_TOKEN') !!}`

      return $.ajax({
        url: url,
        dataType: 'json',
        method: 'GET',
        beforeSend: function(xhr) {
          xhr.setRequestHeader('x-token', token)
        }
      })
    }

    // Bagian untuk Pendaftaran Pasien Lama
    $(document).ready(function() {
      $('#old_registration_date').change(function() {
        const selectedDate  = new Date($(this).val());
        const dayOfWeek     = selectedDate.toLocaleString('en-us', { weekday: 'long' })
        
        // Ambil data Poli dari API
        fetchPoliData(dayOfWeek).done(function(data) {
          const poliOptions = data.response.data.map(function(item) {
            return {
              id: item.code,
              text: item.name
            }
          })

          // Tampilkan data Poli di select2
          $('#old_poli').empty().select2({
            data: poliOptions,
            placeholder: '=== Pilih Poli ===',
            allowClear: true
          }).val(null).trigger('change').prop('disabled', false)

          $('#old_doctor').empty().prop('disabled', true) // Reset Pilihan Dokter
          $('#old_schedule').empty().prop('disabled', true) // Reset Pilihan Jadwal Dokter
        })
      })

      $('#old_poli').change(function() {
        const selectedDate  = new Date($('#old_registration_date').val());
        const dayOfWeek     = selectedDate.toLocaleString('en-us', { weekday: 'long' })
        const selectedPoli  = $(this).val()

        // Ambil data Dokter dari API
        fetchDoctorData(dayOfWeek, selectedPoli).done(function(data) {
          const doctorOptions = data.response.data.map(function(item) {
            return {
              id: item.code,
              text: item.name
            }
          })

          // Tampilkan data Dokter di select2
          $('#old_doctor').empty().select2({
            data: doctorOptions,
            placeholder: '=== Pilih Dokter ===',
            allowClear: true
          }).val(null).trigger('change').prop('disabled', false)

          $('#old_schedule').empty().prop('disabled', true) // Reset Pilihan Jadwal Dokter
        })
      })

      $('#old_doctor').change(function() {
        const selectedDate    = new Date($('#old_registration_date').val());
        const dayOfWeek       = selectedDate.toLocaleString('en-us', { weekday: 'long' })
        const selectedPoli    = $('#old_poli').val()
        const selectedDoctor  = $(this).val()

        // Ambil data Jadwal Dokter dari API
        fetchDoctorScheduleData(dayOfWeek, selectedPoli, selectedDoctor).done(function(data) {
          const doctorOptions = data.response.data.map(function(item) {
            const timeParts = item.start_time.split(':')
            const formattedTime = `${timeParts[0]}:${timeParts[1]}`

            return {
              id: item.start_time,
              text: formattedTime
            }
          })

          // Tampilkan data Jadwal Dokter di select2
          $('#old_schedule').empty().select2({
            data: doctorOptions,
            placeholder: '=== Pilih Jadwal Dokter ===',
            allowClear: true
          }).val(null).trigger('change').prop('disabled', false)
        })
      })
    })

    // Bagian untuk Pendaftaran Pasien Baru
    $(document).ready(function() {
      $('#new_registration_date').change(function() {
        const selectedDate  = new Date($(this).val());
        const dayOfWeek     = selectedDate.toLocaleString('en-us', { weekday: 'long' })
        
        // Ambil data Poli dari API
        fetchPoliData(dayOfWeek).done(function(data) {
          const poliOptions = data.response.data.map(function(item) {
            return {
              id: item.code,
              text: item.name
            }
          })

          // Tampilkan data Poli di select2
          $('#new_poli').empty().select2({
            data: poliOptions,
            placeholder: '=== Pilih Poli ===',
            allowClear: true
          }).val(null).trigger('change').prop('disabled', false)

          $('#new_doctor').empty().prop('disabled', true) // Reset Pilihan Dokter
          $('#new_schedule').empty().prop('disabled', true) // Reset Pilihan Jadwal Dokter
        })
      })

      $('#new_poli').change(function() {
        const selectedDate  = new Date($('#new_registration_date').val());
        const dayOfWeek     = selectedDate.toLocaleString('en-us', { weekday: 'long' })
        const selectedPoli  = $(this).val()

        // Ambil data Dokter dari API
        fetchDoctorData(dayOfWeek, selectedPoli).done(function(data) {
          const doctorOptions = data.response.data.map(function(item) {
            return {
              id: item.code,
              text: item.name
            }
          })

          // Tampilkan data Dokter di select2
          $('#new_doctor').empty().select2({
            data: doctorOptions,
            placeholder: '=== Pilih Dokter ===',
            allowClear: true
          }).val(null).trigger('change').prop('disabled', false)

          $('#new_schedule').empty().prop('disabled', true) // Reset Pilihan Jadwal Dokter
        })
      })

      $('#new_doctor').change(function() {
        const selectedDate    = new Date($('#new_registration_date').val());
        const dayOfWeek       = selectedDate.toLocaleString('en-us', { weekday: 'long' })
        const selectedPoli    = $('#new_poli').val()
        const selectedDoctor  = $(this).val()

        // Ambil data Jadwal Dokter dari API
        fetchDoctorScheduleData(dayOfWeek, selectedPoli, selectedDoctor).done(function(data) {
          const doctorOptions = data.response.data.map(function(item) {
            const timeParts = item.start_time.split(':')
            const formattedTime = `${timeParts[0]}:${timeParts[1]}`

            return {
              id: item.start_time,
              text: formattedTime
            }
          })

          // Tampilkan data Jadwal Dokter di select2
          $('#new_schedule').empty().select2({
            data: doctorOptions,
            placeholder: '=== Pilih Jadwal Dokter ===',
            allowClear: true
          }).val(null).trigger('change').prop('disabled', false)
        })
      })
    })

    // Inputan Tanggal Registrasi hanya bisa dipilih hari ini s/d 7 hari ke depan
    document.addEventListener('DOMContentLoaded', () => {
      const newDateInput = document.getElementById('new_registration_date');
      const oldDateInput = document.getElementById('old_registration_date');
      const today = new Date();
      const maxDate = new Date();

      // Set the maxDate to 7 days from today
      maxDate.setDate(today.getDate() + 7);

      // Format the dates to yyyy-mm-dd
      const formatDate = (date) => {
          const year = date.getFullYear();
          const month = String(date.getMonth() + 1).padStart(2, '0');
          const day = String(date.getDate()).padStart(2, '0');
          return `${year}-${month}-${day}`;
      };

      newDateInput.min = formatDate(today);
      newDateInput.max = formatDate(maxDate);
      oldDateInput.min = formatDate(today);
      oldDateInput.max = formatDate(maxDate);
    });
  </script>

  @if (session('status'))
    <script>
      // JavaScript to show modal on page load
      window.onload = function() {
          var modal = document.getElementById("myModal");
          modal.style.display = "block";
      
          var span1 = document.getElementById("close1");
          span1.onclick = function() {
              modal.style.display = "none";
          }
          var span2 = document.getElementById("close2");
          span2.onclick = function() {
              modal.style.display = "none";
          }
      
          window.onclick = function(event) {
              if (event.target == modal) {
                  modal.style.display = "none";
              }
          }

          const myModal = document.getElementById('myModal')
          const myInput = document.getElementById('myInput')

          myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
          })
      }
    </script>
  @endif
  @if (session('error'))
    <script>
      // JavaScript to show modal on page load
      window.onload = function() {
          var modal = document.getElementById("myModal");
          modal.style.display = "block";
      
          var span1 = document.getElementById("close1");
          span1.onclick = function() {
              modal.style.display = "none";
          }
          var span2 = document.getElementById("close2");
          span2.onclick = function() {
              modal.style.display = "none";
          }
      
          window.onclick = function(event) {
              if (event.target == modal) {
                  modal.style.display = "none";
              }
          }

          const myModal = document.getElementById('myModal')
          const myInput = document.getElementById('myInput')

          myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
          })
      }
    </script>
  @endif
@endsection

@section('content')
  <h1 style="display: none">{{ $provider->title }}</h1>
  <div style="display: none">{{ $c_menu->description }}</div>

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
                          <form class="" method="post" action="{{ $c_menu->url }}">
                              @csrf
                              <h4 class="contact-panel__title">Data Pasien</h4>
                              <hr style="margin-top: -10px; border: 1px solid; margin-bottom: 10px">
                              <input type="hidden" name="new_patient" value="1">
                              <div class="row">
                                  <div class="col-sm-12 col-md-6 col-lg-5">
                                      <label class="form-label" for="new_nik">NIK <span class="text-danger">*</span></label>
                                      <div class="form-group">
                                          <i class="icon-news form-group-icon"></i>
                                          <input type="text" class="form-control @error('new_nik') is-invalid @enderror" placeholder="NIK" id="new_nik" name="new_nik" value="{{ old('new_nik') }}">
                                          @error('new_nik')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                      </div>
                                  </div><!-- /.col-lg-5 -->
                                  <div class="col-sm-12 col-md-6 col-lg-7">
                                      <label class="form-label" for="full_name">Nama Lengkap <span class="text-danger">*</span></label>
                                      <div class="form-group">
                                          <i class="icon-user form-group-icon"></i>
                                          <input type="text" class="form-control @error('full_name') is-invalid @enderror" placeholder="Nama Lengkap" id="full_name" name="full_name" value="{{ old('full_name') }}">
                                          @error('full_name')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                      </div>
                                  </div><!-- /.col-lg-7 -->
                              </div>
                              <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <label class="form-label" for="gender">Jenis Kelamin <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                            <option value="" disabled selected>Jenis Kelamin</option>
                                            <option value="L" @if(old('gender') == 'L') selected @endif>Pria</option>
                                            <option value="P" @if(old('gender') == 'P') selected @endif>Wanita</option>
                                        </select>
                                        @error('gender')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!-- /.col-lg-4 -->
                                  <div class="col-sm-12 col-md-12 col-lg-4">
                                      <label class="form-label" for="new_birth_date">Tanggal Lahir <span class="text-danger">*</span></label>
                                      <div class="form-group form-group-date">
                                          <i class="icon-calendar form-group-icon"></i>
                                          <input type="date" class="form-control @error('new_birth_date') is-invalid @enderror" id="new_birth_date" name="new_birth_date" value="{{ old('new_birth_date') }}">
                                          @error('new_birth_date')
                                            <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                      </div>
                                  </div><!-- /.col-lg-4 -->
                                  <div class="col-sm-12 col-md-12 col-lg-4">
                                      <label class="form-label" for="birth_place">Tempat Lahir</label>
                                      <div class="form-group">
                                          <i class="icon-location form-group-icon"></i>
                                          <input type="text" class="form-control @error('birth_place') is-invalid @enderror" placeholder="Tempat Lahir" id="birth_place" name="birth_place" value="{{ old('birth_place') }}">
                                          @error('birth_place')
                                            <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                      </div>
                                  </div><!-- /.col-lg-4 -->
                              </div>
                              <div class="row">
                                  <div class="col-sm-12 col-md-12 col-lg-6">
                                      <label class="form-label" for="email">Email</label>
                                      <div class="form-group">
                                          <i class="icon-email form-group-icon"></i>
                                          <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email" name="email" value="{{ old('email') }}">
                                          @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                      </div>
                                  </div><!-- /.col-lg-6 -->
                                  <div class="col-sm-12 col-md-12 col-lg-6">
                                      <label class="form-label" for="phone_no">No HP</label>
                                      <div class="form-group">
                                          <i class="icon-phone form-group-icon"></i>
                                          <input type="text" class="form-control @error('phone_no') is-invalid @enderror" placeholder="No HP" id="phone_no" name="phone_no" value="{{ old('phone_no') }}">
                                          @error('phone_no')
                                            <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                      </div>
                                  </div><!-- /.col-lg-6 -->
                              </div>
                              <h4 class="contact-panel__title">Booking Dokter</h4>
                              <hr style="margin-top: -10px; border: 1px solid; margin-bottom: 10px">
                              <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <label class="form-label" for="new_registration_date">Tanggal Pendaftaran <span class="text-danger">*</span></label>
                                    <div class="form-group form-group-date">
                                        <i class="icon-calendar form-group-icon"></i>
                                        <input type="date" class="form-control @error('new_registration_date') is-invalid @enderror" id="new_registration_date" name="new_registration_date" value="{{ old('new_registration_date') }}">
                                        @error('new_registration_date')
                                          <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!-- /.col-lg-6 -->
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label class="form-label" for="new_poli">Poli <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select class="form-control single-select @error('new_poli') is-invalid @enderror" id="new_poli" name="new_poli" disabled>
                                            <option value="">=== Pilih Poli ===</option>
                                        </select>
                                        @error('new_poli')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!-- /.col-lg-6 -->
                              </div>
                              <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label class="form-label" for="new_doctor">Dokter <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select class="form-control single-select @error('new_doctor') is-invalid @enderror" id="new_doctor" name="new_doctor" disabled>
                                            <option value="">=== Pilih Dokter ===</option>
                                        </select>
                                        @error('new_doctor')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!-- /.col-lg-6 -->
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label class="form-label" for="new_schedule">Jadwal <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select class="form-control single-select @error('new_schedule') is-invalid @enderror" id="new_schedule" name="new_schedule" disabled>
                                            <option value="">=== Pilih Jadwal ===</option>
                                        </select>
                                        @error('new_schedule')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
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
                          <form class="" method="post" action="{{ $c_menu->url }}">
                              @csrf
                              <h4 class="contact-panel__title">Data Pasien</h4>
                              <hr style="margin-top: -10px; border: 1px solid; margin-bottom: 10px">
                              <input type="hidden" name="new_patient" value="0">
                              <div class="row">
                                  <div class="col-sm-12 col-md-12 col-lg-4">
                                      <label class="form-label" for="mr_no">No RM <span class="text-danger">*</span></label>
                                      <div class="form-group">
                                          <i class="icon-news form-group-icon"></i>
                                          <input type="text" class="form-control @error('mr_no') is-invalid @enderror" placeholder="No RM" id="mr_no" name="mr_no" value="{{ old('mr_no') }}">
                                          @error('mr_no')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                      </div>
                                  </div><!-- /.col-lg-4 -->
                                  <div class="col-sm-12 col-md-12 col-lg-4">
                                      <label class="form-label" for="old_nik">NIK <span class="text-danger">*</span></label>
                                      <div class="form-group">
                                          <i class="icon-news form-group-icon"></i>
                                          <input type="text" class="form-control @error('old_nik') is-invalid @enderror" placeholder="NIK" id="old_nik" name="old_nik" value="{{ old('old_nik') }}">
                                          @error('old_nik')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                      </div>
                                  </div><!-- /.col-lg-4 -->
                                  <div class="col-sm-12 col-md-12 col-lg-4">
                                      <label class="form-label" for="old_birth_date">Tanggal Lahir <span class="text-danger">*</span></label>
                                      <div class="form-group form-group-date">
                                          <i class="icon-calendar form-group-icon"></i>
                                          <input type="date" class="form-control @error('old_birth_date') is-invalid @enderror" id="old_birth_date" name="old_birth_date" value="{{ old('old_birth_date') }}">
                                          @error('old_birth_date')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                      </div>
                                  </div><!-- /.col-lg-4 -->
                              </div>
                              <h4 class="contact-panel__title">Booking Dokter</h4>
                              <hr style="margin-top: -10px; border: 1px solid; margin-bottom: 10px">
                              <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <label class="form-label" for="old_registration_date">Tanggal Pendaftaran <span class="text-danger">*</span></label>
                                    <div class="form-group form-group-date">
                                        <i class="icon-calendar form-group-icon"></i>
                                        <input type="date" class="form-control @error('old_registration_date') is-invalid @enderror" id="old_registration_date" name="old_registration_date" value="{{ old('old_registration_date') }}">
                                        @error('old_registration_date')
                                          <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!-- /.col-lg-6 -->
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label class="form-label" for="old_poli">Poli <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select class="form-control single-select @error('old_poli') is-invalid @enderror" id="old_poli" name="old_poli" disabled>
                                            <option value="">=== Pilih Poli ===</option>
                                        </select>
                                        @error('old_poli')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!-- /.col-lg-6 -->
                              </div>
                              <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label class="form-label" for="old_doctor">Dokter <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select class="form-control single-select @error('old_doctor') is-invalid @enderror" id="old_doctor" name="old_doctor" disabled>
                                            <option value="">=== Pilih Dokter ===</option>
                                        </select>
                                        @error('old_doctor')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!-- /.col-lg-6 -->
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label class="form-label" for="old_schedule">Jadwal <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select class="form-control single-select @error('old_schedule') is-invalid @enderror" id="old_schedule" name="old_schedule" disabled>
                                            <option value="">=== Pilih Jadwal ===</option>
                                        </select>
                                        @error('old_schedule')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
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
            <div class="contact-panel__info d-flex flex-column bg-overlay bg-overlay-primary-gradient">
              <div class="bg-img"><img src="{{ asset('/images/banners/1.jpg') }}" alt="RS Muhammadiyah Blora"></div>
              <div>
                <h4 class="contact-panel__title color-white">Jadwal Dokter Hari Ini</h4>
              </div>
              <div>
                <ul class="contact__list list-unstyled mb-30">
                  {{--
                  @php
                    $dayz = date('w', strtotime("+1 day", strtotime(now())));
                    $dayz = $dayz + 1;
                    $response = AppHelper::api(env('API_URL').'doctor_schedule/'.$dayz, 'GET', null, null);
                    $schedules = json_decode($response)->response->data;
                  @endphp

                  @if ($schedules)
                    @foreach ($schedules as $schedule)
                      <li>
                        <i class="icon-clock"></i><a href="/jadwal-dokter/{{ $schedule->doctor_code }}">{{ $schedule->doctor_name }} ({{ $schedule->poli_name }}): <b>{{ date('H:i', strtotime($schedule->start_time)) }}-{{ date('h:i', strtotime($schedule->end_time)) }}</b></a>
                      </li>
                    @endforeach
                    {{-- @for ($i = 0; $i < 10; $i++)
                      <li>
                        <i class="icon-clock"></i><a href="/jadwal-dokter/{{ $schedules[$i]->doctor_code }}">{{ $schedules[$i]->doctor_name }} ({{ $schedules[$i]->poli_name }}): <b>{{ date('H:i', strtotime($schedules[$i]->start_time)) }}-{{ date('h:i', strtotime($schedules[$i]->end_time)) }}</b></a>
                      </li>
                    @endfor 
                  @endif --}}
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
              <h3 class="heading__title">Kelas Rawat Inap!</h3>
            </div><!-- /.heading -->
          </div><!-- /.col-lg-5 -->
          <div class="col-sm-12 col-md-12 col-lg-7">
            <div class="slider-with-navs">
              <!-- Testimonial #1 -->
              <div class="testimonial-item">
                <h3 class="testimonial__title">
                  Di RS PKU Muhammadiyah Blora, kelas rawat inap kami bukan hanya tempat untuk mendapatkan perawatan medis, tetapi juga merupakan tempat di mana Anda merasa seperti di rumah sendiri. Kami berkomitmen untuk menyediakan lingkungan yang mendukung proses penyembuhan Anda dengan pelayanan yang berkualitas tinggi dan perhatian yang tulus dari seluruh tim kami. Jangan ragu untuk menghubungi kami untuk informasi lebih lanjut atau untuk mengatur kunjungan ke kelas rawat inap kami. Kami siap membantu Anda dalam memulai perjalanan menuju kesehatan yang lebih baik.
                </h3>
              </div><!-- /. testimonial-item -->
            </div><!-- /.slick-carousel -->
            <div class="slider-nav mb-60">
              <div class="testimonial__meta">
                <div class="testimonial__thmb">
                  <img src="{{ asset('/images/testimonials/thumbs/1.png') }}" alt="author thumb">
                </div><!-- /.testimonial-thumb -->
                <div>
                  <h4 class="testimonial__meta-title">Dokter</h4>
                  <p class="testimonial__meta-desc">Konsultan</p>
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
            <a class="popup-gallery-item" href="{{ asset('/storage/galleries/1.jpg') }}">
              <img src="{{ asset('/storage/galleries/1.jpg') }}" alt="gallery img">
            </a>
            <a class="popup-gallery-item" href="{{ asset('/storage/galleries/2.jpg') }}">
              <img src="{{ asset('/storage/galleries/2.jpg') }}" alt="gallery img">
            </a>
            <a class="popup-gallery-item" href="{{ asset('/storage/galleries/3.jpg') }}">
              <img src="{{ asset('/storage/galleries/3.jpg') }}" alt="gallery img">
            </a>
            <a class="popup-gallery-item" href="{{ asset('/storage/galleries/4.jpg') }}">
              <img src="{{ asset('/storage/galleries/4.jpg') }}" alt="gallery img">
            </a>
            <a class="popup-gallery-item" href="{{ asset('/storage/galleries/5.jpg') }}">
              <img src="{{ asset('/storage/galleries/5.jpg') }}" alt="gallery img">
            </a>
            <a class="popup-gallery-item" href="{{ asset('/storage/galleries/6.jpg') }}">
              <img src="{{ asset('/storage/galleries/6.jpg') }}" alt="gallery img">
            </a>
          </div><!-- /.gallery-images-wrapper -->
        </div><!-- /.col-xl-5 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.gallery 2 -->

  <!-- ========================
    Modal Structure
  =========================== -->
  <div class="modal" tabindex="-1" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            @if (session('status'))
                Pendaftaran <span class="text-success">Berhasil</span>
            @endif
            @if (session('error'))
                Pendaftaran <span class="text-danger">Gagal</span>
            @endif
          </h5>
          <button type="button" class="btn-close close" id="close1">&times;</button>
        </div>
        <div class="modal-body">
          @if (session('status'))
            <b class="text-success bold">{{ session('status') }}</b><br>
            <p>{{ session('data')->description }}</p>
          @endif
          @if (session('error'))
              @foreach (session('error') as $item)
                  <b class="text-danger">{{ $item->text }}</b><br>
              @endforeach
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="close2">Tutup</button>
        </div>
      </div>
    </div>
  </div>
@endsection