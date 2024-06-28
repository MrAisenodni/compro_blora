@extends('layouts.main')

@section('title', $c_menu->title)
@section('meta-description', $c_menu->description)

@section('styles')
@endsection

@section('scripts')
@endsection

@section('content')
  <h1 style="display: none">{{ $provider->title }}</h1>
  <div style="display: none">{{ $c_menu->description }}</div>
  
  <!-- ========================
      page title 
  =========================== -->
  <section class="page-title page-title-layout5">
    <div class="bg-img"><img src="{{ asset('/images/backgrounds/6.jpg') }}" alt="background"></div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="pagetitle__heading">{{ $c_menu->title }}</h1>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $c_menu->title }}</li>
            </ol>
          </nav>
        </div><!-- /.col-12 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.page-title -->
  
  <!-- ========================
      Doctors Schedule
  ========================== -->
  <section style="padding-top: 50px; padding-bottom: 50px">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table class="doctors-timetable w-100">
              <thead>
                <tr>
                  <th>
                    <div class="custom-th event">Poliklinik</div>
                  </th>
                  <th>
                    <div class="custom-th event">Dokter</div>
                  </th>
                  <th>
                    <div class="custom-th event">Senin</div>
                  </th>
                  <th>
                    <div class="custom-th event">Selasa</div>
                  </th>
                  <th>
                    <div class="custom-th event">Rabu</div>
                  </th>
                  <th>
                    <div class="custom-th event">Kamis</div>
                  </th>
                  <th>
                    <div class="custom-th event">Jumat</div>
                  </th>
                  <th>
                    <div class="custom-th event">Sabtu</div>
                  </th>
                  <th>
                    <div class="custom-th event">Minggu</div>
                  </th>
                </tr>
              </thead>
              <tbody>
                @php
                  $response   = AppHelper::api(env('API_URL').'doctor_schedule', 'GET', null, null);
                  $schedules  = json_decode($response)->response->data;
                @endphp

                @if ($schedules)
                    @foreach ($schedules as $schedule)
                        <tr>
                          {{-- <td>
                            <div class="custom-td event">
                              <a class="event__header" href="/fasilitas-pelayanan/{{ $schedule->poli_code }}">{{ $schedule->poli_name }}</a>
                            </div>
                          </td>
                          <td>
                            <div class="custom-td event">
                              <a class="event__header" href="/jadwal-dokter/{{ $schedule->doctor_code }}">{{ $schedule->doctor_name }}</a>
                            </div>
                          </td> --}}
                          <td>{{ $schedule->poli_name }}</td>
                          <td>{{ $schedule->doctor_name }}</td>
                          <td>{{ ($schedule->monday) ? $schedule->monday : '-' }}</td>
                          <td>{{ ($schedule->tuesday) ? $schedule->tuesday : '-' }}</td>
                          <td>{{ ($schedule->wednesday) ? $schedule->wednesday : '-' }}</td>
                          <td>{{ ($schedule->thursday) ? $schedule->thursday : '-' }}</td>
                          <td>{{ ($schedule->friday) ? $schedule->friday : '-' }}</td>
                          <td>{{ ($schedule->saturday) ? $schedule->saturday : '-' }}</td>
                          <td>{{ ($schedule->sunday) ? $schedule->sunday : '-' }}</td>
                        </tr>
                    @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection