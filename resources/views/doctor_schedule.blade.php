@extends('layouts.main')

@section('title', $c_menu->title)
@section('meta-description', 'Dapatkan perawatan medis dari dokter spesialis berpengalaman di Rumah Sakit PKU Muhammadiyah Blora. Kami berkomitmen memberikan pelayanan kesehatan terbaik untuk Anda dan keluarga.')

@section('styles')
@endsection

@section('scripts')
@endsection

@section('content')
    {!! $c_menu->description !!}
    <!-- ========================
       page title 
    =========================== -->
    <section class="page-title page-title-layout5">
        <div class="bg-img"><img src="assets/images/backgrounds/6.jpg" alt="background"></div>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h1 class="pagetitle__heading">Doctor’s Timetable</h1>
              <nav>
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Doctor’s Timetable</li>
                </ol>
              </nav>
            </div><!-- /.col-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.page-title -->
  
      <!-- ========================
         Doctors Timetable
      ========================== -->
      <section>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="doctors-timetable w-100">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Sunday</th>
                      <th>Monday</th>
                      <th>Tuesday</th>
                      <th>Wednesday</th>
                      <th>Thursday</th>
                      <th>Friday</th>
                      <th>Saturday</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        08.00
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Neurology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>08.00</span><span>09.00</span>
                        </div>
                        <div class="doctor__name">Dr. Muldoone. R</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Cardiology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>08.00</span><span>09.00</span>
                        </div>
                        <div class="doctor__name">Dr. Brain.M</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Pathology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>08.00</span><span>09.00</span>
                        </div>
                        <div class="doctor__name">Dr. Andaloro.M</div>
                      </td>
                      <td class="event" rowspan="3">
                        <a class="event__header" href="#">Laboratory</a>
                        <div class="event__type">Analysis</div>
                        <div class="event__time">
                          <span>08.00</span><span>11.00</span>
                        </div>
                        <div class="doctor__name">Dr. Markus.S</div>
                        <hr>
                        <a class="event__header" href="#">Ophthalmology</a>
                        <div class="event__type">Analysis</div>
                        <div class="event__time">
                          <span>08.00</span><span>10.00</span>
                        </div>
                        <div class="doctor__name">Dr. Markus.S</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Pediatric</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>08.00</span><span>09.00</span>
                        </div>
                        <div class="doctor__name">Dr. Nicole. B</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Physiotherapy</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>08.00</span><span>09.00</span>
                        </div>
                        <div class="doctor__name">Dr. Alex.K</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Urology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>08.00</span><span>09.00</span>
                        </div>
                        <div class="doctor__name">Dr. Darlen.G</div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        09.00
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Maternity</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>09.00</span><span>10.00</span>
                        </div>
                        <div class="doctor__name">Dr. Muldoone. R</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Oncology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>09.00</span><span>10.00</span>
                        </div>
                        <div class="doctor__name">Dr. Brain.M</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Pathology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>09.00</span><span>10.00</span>
                        </div>
                        <div class="doctor__name">Dr. Andaloro.M</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Audiology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>09.00</span><span>10.00</span>
                        </div>
                        <div class="doctor__name">Dr. Nicole. B</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Cardiac</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>09.00</span><span>10.00</span>
                        </div>
                        <div class="doctor__name">Dr. Alex.K</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Urology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>09.00</span><span>10.00</span>
                        </div>
                        <div class="doctor__name">Dr. Darlen.G</div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        10.00
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Neurology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>09.00</span><span>11.00</span>
                        </div>
                        <div class="doctor__name">Dr. Muldoone. R</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Cardiology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>09.00</span><span>11.00</span>
                        </div>
                        <div class="doctor__name">Dr. Brain.M</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Pathology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>09.00</span><span>11.00</span>
                        </div>
                        <div class="doctor__name">Dr. Andaloro.M</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Maternity</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>09.00</span><span>11.00</span>
                        </div>
                        <div class="doctor__name">Dr. Nicole. B</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Oncology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>09.00</span><span>11.00</span>
                        </div>
                        <div class="doctor__name">Dr. Alex.K</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Urology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>09.00</span><span>11.00</span>
                        </div>
                        <div class="doctor__name">Dr. Darlen.G</div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        11.00
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Physiotherapy</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>11.00</span><span>12.00</span>
                        </div>
                        <div class="doctor__name">Dr. Muldoone. R</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Cardiology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>11.00</span><span>12.00</span>
                        </div>
                        <div class="doctor__name">Dr. Brain.M</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Maternity</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>11.00</span><span>12.00</span>
                        </div>
                        <div class="doctor__name">Dr. Andaloro.M</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Pediatric</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>11.00</span><span>12.00</span>
                        </div>
                        <div class="doctor__name">Dr. Nicole. B</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Cardiac</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>11.00</span><span>12.00</span>
                        </div>
                        <div class="doctor__name">Dr. Alex.K</div>
                      </td>
                      <td class="event" rowspan="3">
                        <a class="event__header" href="#">Laboratory</a>
                        <div class="event__type">Analysis</div>
                        <div class="event__time">
                          <span>11.00</span><span>13.00</span>
                        </div>
                        <div class="doctor__name">Dr. Markus.S</div>
                        <hr>
                        <a class="event__header" href="#">Physiotherapy</a>
                        <div class="event__type">Analysis</div>
                        <div class="event__time">
                          <span>12.00</span><span>14.00</span>
                        </div>
                        <div class="doctor__name">Dr. Markus.S</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Urology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>11.00</span><span>12.00</span>
                        </div>
                        <div class="doctor__name">Dr. Darlen.G</div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        12.00
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Neurology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>12.00</span><span>15.00</span>
                        </div>
                        <div class="doctor__name">Dr. Muldoone. R</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Ophthalmology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>12.00</span><span>15.00</span>
                        </div>
                        <div class="doctor__name">Dr. Brain.M</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Oncology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>12.00</span><span>15.00</span>
                        </div>
                        <div class="doctor__name">Dr. Andaloro.M</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Audiology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>12.00</span><span>15.00</span>
                        </div>
                        <div class="doctor__name">Dr. Nicole. B</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Physiotherapy</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>12.00</span><span>15.00</span>
                        </div>
                        <div class="doctor__name">Dr. Alex.K</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Urology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>12.00</span><span>15.00</span>
                        </div>
                        <div class="doctor__name">Dr. Darlen.G</div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        13.00
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Oncology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>13.00</span><span>14.00</span>
                        </div>
                        <div class="doctor__name">Dr. Muldoone. R</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Audiology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>13.00</span><span>14.00</span>
                        </div>
                        <div class="doctor__name">Dr. Brain.M</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Pathology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>13.00</span><span>14.00</span>
                        </div>
                        <div class="doctor__name">Dr. Andaloro.M</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Pediatric</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>13.00</span><span>14.00</span>
                        </div>
                        <div class="doctor__name">Dr. Nicole. B</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Maternity</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>13.00</span><span>14.00</span>
                        </div>
                        <div class="doctor__name">Dr. Alex.K</div>
                      </td>
                      <td class="event">
                        <a class="event__header" href="#">Ophthalmology</a>
                        <div class="event__type">Consultation</div>
                        <div class="event__time">
                          <span>13.00</span><span>14.00</span>
                        </div>
                        <div class="doctor__name">Dr. Darlen.G</div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div><!-- /.col-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.Doctors Timetable  -->
@endsection