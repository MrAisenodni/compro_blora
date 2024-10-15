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
                  $response   = AppHelper::api(env('API_URL').'doctor_schedule/exclude/by/poli/9118', 'GET', null, null);
                  if ($response)
                  {
                    $schedules  = json_decode($response)->response->data;
                  }
                @endphp

                @if ($schedules)
                    @foreach ($schedules as $schedule)
                        <tr>
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
  
  <!-- ========================
      Doctor Grid
  ========================== -->
  <section class="team-layout3 pb-40">
    <div class="bg-img"><img src="{{ asset('/storage/services/1_service_3.png') }}" alt="{{ $provider->title }}"></div>
    <div class="container">
      @php
          $doctors = DB::table('mst_doctor')->paginate(6);
      @endphp
      <div class="row" id="doctor_list">
        @if ($doctors)
            @foreach ($doctors as $doctor)
              <!-- Member #{{ $loop->iteration }} -->
              <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="member">
                  <div class="member__img">
                    <img src="{{ ($doctor->picture) ? asset('/storage/doctors/'.$doctor->picture) : asset('/images/team/1.jpg') }}" alt="{{ $doctor->name }}">
                  </div><!-- /.member-img -->
                  <div class="member__info">
                    <h5 class="member__name"><a href="/jadwal-dokter/{{ $doctor->code }}">{{ $doctor->name }}</a></h5>
                    <p class="member__job">{{ $doctor->poli_name }}</p>
                    <p class="member__desc">{{ $doctor->description }}</p>
                    <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                      <a href="/jadwal-dokter/{{ $doctor->code }}" class="btn btn__secondary btn__link btn__rounded">
                        <span>Read More</span>
                        <i class="icon-arrow-right"></i>
                      </a>
                    </div>
                  </div><!-- /.member-info -->
                </div><!-- /.member -->
              </div><!-- /.col-lg-4 -->
            @endforeach
        @endif
      </div> <!-- /.row -->
      <div class="row">
        <div class="col-12 text-center">
          <nav class="pagination-area">
            <ul class="pagination justify-content-center">
              
              <li>
                <a class="@if ($doctors->currentPage() == 1) disabled @endif" href="@if ($doctors->currentPage() == 1) #doctor_list @else {{ $doctors->previousPageUrl() }} @endif">
                  <i class="icon-arrow-left"></i>
                </a>
              </li>
              @for ($i = 1; $i <= $doctors->lastPage(); $i++)
                <li>
                  <a class="@if ($doctors->currentPage() == $i) current @endif" href="{{ request()->url() }}?page={{ $i }}">{{ $i }}</a>
                </li>
              @endfor
              <li>
                  <a class="@if ($doctors->currentPage() == $doctors->lastPage()) disabled @endif" href="@if ($doctors->currentPage() == $doctors->lastPage()) #doctor_list @else {{ $doctors->nextPageUrl() }} @endif">
                    <i class="icon-arrow-right"></i>
                  </a>
              </li>

              {{-- <li><a class="current" href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#"><i class="icon-arrow-right"></i></a></li> --}}
            </ul>
          </nav><!-- .pagination-area -->
        </div><!-- /.col-12 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section>
@endsection