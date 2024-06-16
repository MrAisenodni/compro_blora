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
         Doctors Timetable
      ========================== -->
      <section style="padding-top: 50px; padding-bottom: 50px">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="doctors-timetable w-100">
                  <thead>
                    <tr>
                      <th></th>
                      @for ($i = 0; $i < 7; $i++)
                        @php
                          $date = date('d M Y', strtotime("+$i day", strtotime(now())));
                          $dayz = date('w', strtotime("+$i day", strtotime(now())));
                        @endphp
                        <th>{{ $date }}<br>{{ AppHelper::indo_day($dayz) }}</th>
                      @endfor
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $response = AppHelper::api(env('API_URL').'doctor_time', 'GET', null, null);
                      $data = json_decode($response)->response->data;
                    @endphp

                    @if ($data)
                        @foreach ($data as $item)
                            <tr>
                              <td>
                                {{ $item->range_time }}
                              </td>
                              
                              @for ($i = 0; $i < 7; $i++)
                                @php
                                  $dayz = date('w', strtotime("+$i day", strtotime(now())));
                                  $dayz = $dayz + 1;
                                  $response = AppHelper::api(env('API_URL').'doctor_schedule/'.$dayz, 'GET', null, null);
                                  $schedules = json_decode($response)->response->data;
                                @endphp

                                <td>
                                  @if ($schedules)
                                    @foreach ($schedules as $schedule)
                                      <div class="custom-td event">
                                        <a class="event__header" href="/jadwal_dokter/{{ $schedule->doctor_code }}">{{ $schedule->poli_name }}</a>
                                        <div class="event__time">
                                          <span>{{ date('H:i', strtotime($schedule->start_time)) }}-{{ date('h:i', strtotime($schedule->end_time)) }}</span>
                                        </div>
                                        <div class="doctor__name">{{ $schedule->doctor_name }}</div>
                                      </div>
                                    @endforeach
                                  @endif                                  
                                </td>  
                              @endfor=
                            </tr>
                        @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div><!-- /.col-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.Doctors Timetable  -->
@endsection