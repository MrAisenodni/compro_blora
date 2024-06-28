@extends('layouts.main')

@section('title', $c_menu->title)
@section('meta-description', $c_menu->description)

@section('styles')
@endsection

@section('scripts')
  <script>
    // Hari dalam Seminggu
    function getDayInteger(day)
    {
      const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']

      return days[day]
    }

    // Mengambil data Jadwal Dokter berdasarkan Dokter
    function fetchDoctorScheduleData(doctor)
    {
      const doctorCode  = doctor
      const url         = `{!! env('API_URL') !!}doctor_schedule/${doctorCode}`
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

    $(document).ready(function() {
      var doctorCode  = '{!! $doctor->code !!}'
      var container   = document.getElementById('time__list');

      // Ambil data Poli dari API
      fetchDoctorScheduleData(doctorCode).done(function(data) {
        const poliOptions = data.response.data.map(function(item) {
          var dayOfWeek = getDayInteger(item.dayz - 1)

          return container.innerHTML += `<li><span>`+dayOfWeek+`</span><span>`+item.schedule+`</span></li>`;
        })
      })
    })
  </script>
@endsection

@section('content')
  <h1 style="display: none">{{ $provider->title }}</h1>
  <div style="display: none">{{ $c_menu->description }}</div>
  
  <!-- ========================
       page title 
    =========================== -->
  <section class="page-title page-title-layout5">
    <div class="bg-img"><img src="{{ asset('/images/backgrounds/6.jpg') }}" alt="{{ $provider->title }}"></div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="pagetitle__heading">{{ $doctor->name }}</h1>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ $c_menu->url }}">{{ $c_menu->title }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $doctor->name }}</li>
            </ol>
          </nav>
        </div><!-- /.col-12 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.page-title -->
    
  <section class="pt-120 pb-80">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-4">
          <aside class="sidebar has-marign-right">
            <div class="widget widget-member">
              <div class="member mb-0">
                <div class="member__img">
                  <img src="{{ asset('/storage/doctors/'.$doctor->picture) }}" alt="{{ $doctor->name }}">
                </div><!-- /.member-img -->
                <div class="member__info">
                  <h5 class="member__name"><a href="doctors-single-doctor1.html">{{ $doctor->name }}</a></h5>
                  <p class="member__job">{{ $doctor->poli_name }}</p>
                  <p class="member__desc">{{ $doctor->description }}</p>
                  <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                    <ul class="social-icons list-unstyled mb-0">
                      <li><a href="{{ $doctor->facebook }}" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                      <li><a href="{{ $doctor->twitter }}" class="twitter"><i class="fab fa-twitter"></i></a></li>
                      <li><a href="{{ $doctor->whatsapp }}" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                    </ul><!-- /.social-icons -->
                  </div>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
            </div><!-- /.widget-member -->
            <div class="widget widget-help bg-overlay bg-overlay-primary-gradient">
              <div class="bg-img"><img src="{{ asset('/images/banners/5.jpg') }}" alt="{{ $provider->title }}"></div>
              <div class="widget-content">
                <div class="widget__icon">
                  <i class="icon-call3"></i>
                </div>
                <h2 class="widget__title">Keadaan Darurat</h2>
                <p class="widget__desc">Jika Anda dalam keadaan darurat silahkan hubungi nomor di bawah ini:</p>
                <a href="https://api.whatsapp.com/send?phone=6285869467081" class="phone__number">
                  <i class="icon-phone"></i> <span>(0296) 532 257 - 0858 6946 7081</span>
                </a>
              </div><!-- /.widget-content -->
            </div><!-- /.widget-help -->
            <div class="widget widget-schedule">
              <div class="widget-content">
                <div class="widget__icon">
                  <i class="icon-charity2"></i>
                </div>
                <h4 class="widget__title">Opening Hours</h4>
                <ul class="time__list list-unstyled mb-0" id="time__list">
                </ul>
              </div><!-- /.widget-content -->
            </div><!-- /.widget-schedule -->
          </aside><!-- /.sidebar -->
        </div><!-- /.col-lg-4 -->
        <div class="col-sm-12 col-md-12 col-lg-8">
          <div class="text-block mb-50">
            <h5 class="text-block__title">Biography</h5>
            <p class="text-block__desc mb-20 font-weight-bold color-secondary">A neurologist is a medical doctor with
              specialized training
              in diagnosing, treating, and managing disorders of the brain and nervous system including, but not
              limited to, Alzheimer’s disease, amyotrophic lateral sclerosis (ALS), concussion, epilepsy, migraine,
              multiple sclerosis, Parkinson’s disease, and stroke.</p>
            <p class="text-block__desc mb-20">He then traveled to Philadelphia, Pennsylvania to complete a Fellowship
              in Intervention Cardiology at Hahnemann Hospital in conjunction with Drexel University, where he
              received extensive training in coronary as well as peripheral interventions and limb salvage procedures.
              He actively participates in clinical research trials and has been published in peer reviewed journals
              such as the Journal of the State Medical Society and Baylor University Medical Center's Proceedings.</p>
            <p class="text-block__desc mb-20">In his spare time, watches college and professional football and enjoys
              traveling, swimming and playing chess. He is currently Board Certified in Cardiovascular Disease and
              Interventional Cardiology. He moved to California where he completed both his Internship ('85-'86) and
              Residency ('87-'89) at the University of California.</p>
          </div><!-- /.text-block -->
          <ul class="details-list list-unstyled mb-60">
            <li>
              <h5 class="details__title">Speciality</h5>
              <div class="details__content">
                <p class="mb-0">Cardiology </p>
              </div>
            </li>
            <li>
              <h5 class="details__title">Degrees</h5>
              <div class="details__content">
                <p class="mb-0">M.D. of Medicine </p>
              </div>
            </li>
            <li>
              <h5 class="details__title">Areas of Expertise</h5>
              <div class="details__content">
                <ul class="list-items list-items-layout2 list-unstyled mb-0">
                  <li>Cardiac Imaging – Non-invasive.</li>
                  <li>Cardiac Rehabilitation and Exercise.</li>
                  <li>Hypertrophic Cardiomyopathy.</li>
                  <li>Inherited Heart Diseases.</li>
                </ul>
              </div>
            </li>
            <li>
              <h5 class="details__title">Office</h5>
              <div class="details__content">
                <p class="mb-0">2307 Beverley Rd Brooklyn, New York 11226 United States.</p>
              </div>
            </li>
            <li>
              <h5 class="details__title">University</h5>
              <div class="details__content">
                <p class="mb-0">Harvard University</p>
              </div>
            </li>
          </ul>
          <div class="text-block mb-50">
            <h5 class="text-block__title">Doctor’s Services</h5>
            <p class="text-block__desc mb-20">He actively participates in clinical research trials and has been
              published in peer reviewed journals such as the Journal of the State Medical Society and Baylor
              University Medical Center’s Proceedings. At Hahnemann Hospital in conjunction with Drexel University,
              where he received extensive training in coronary as well as peripheral interventions and limb salvage
              procedures.
            </p>
          </div><!-- /.text-block -->
          <div class="text-block mb-50">
            <h5 class="text-block__title">Awards And Honours</h5>
            <p class="text-block__desc mb-20">Today the hospital is recognised as a world renowned institution, not
              only providing outstanding care and treatment, but improving the outcomes for all through a
              comprehensive medical research. For over 20 years, our hospital has touched lives of millions of people,
              and provide care and treatment for the sickest in our community including rehabilitation and aged care.
            </p>
          </div><!-- /.text-block -->
          <div class="fancybox-layout2">
            <div class="row">
              <div class="col-sm-6">
                <!-- fancybox item #1 -->
                <div class="fancybox-item d-flex">
                  <div class="fancybox__icon">
                    <i class="icon-diploma"></i>
                  </div><!-- /.fancybox__icon -->
                  <div class="fancybox__content">
                    <h4 class="fancybox__title">Edison Awards</h4>
                    <p class="fancybox__desc">Honoring excellence in innovation</p>
                  </div><!-- /.fancybox-content -->
                </div><!-- /.fancybox-item -->
              </div><!-- /.col-sm-6 -->
              <div class="col-sm-6">
                <!-- fancybox item #2 -->
                <div class="fancybox-item d-flex">
                  <div class="fancybox__icon">
                    <i class="icon-diploma"></i>
                  </div><!-- /.fancybox__icon -->
                  <div class="fancybox__content">
                    <h4 class="fancybox__title">Edwin Grant Medal</h4>
                    <p class="fancybox__desc">Research in developmental biology</p>
                  </div><!-- /.fancybox-content -->
                </div><!-- /.fancybox-item -->
              </div><!-- /.col-sm-6 -->
              <div class="col-sm-6">
                <!-- fancybox item #3 -->
                <div class="fancybox-item d-flex">
                  <div class="fancybox__icon">
                    <i class="icon-diploma"></i>
                  </div><!-- /.fancybox__icon -->
                  <div class="fancybox__content">
                    <h4 class="fancybox__title">Robert L. Noble Prize</h4>
                    <p class="fancybox__desc">Canadian Cancer Society</p>
                  </div><!-- /.fancybox-content -->
                </div><!-- /.fancybox-item -->
              </div><!-- /.col-sm-6 -->
              <div class="col-sm-6">
                <!-- fancybox item #4 -->
                <div class="fancybox-item d-flex">
                  <div class="fancybox__icon">
                    <i class="icon-diploma"></i>
                  </div><!-- /.fancybox__icon -->
                  <div class="fancybox__content">
                    <h4 class="fancybox__title">National Prize for Medicine</h4>
                    <p class="fancybox__desc">Chilean Academy of Medicine etc.</p>
                  </div><!-- /.fancybox-content -->
                </div><!-- /.fancybox-item -->
              </div><!-- /.col-sm-6 -->
            </div><!-- /.row -->
          </div><!-- /.fancybox-layout2 -->
          <div class="text-block mb-40">
            <h5 class="text-block__title">Medical Education</h5>
            <p class="text-block__desc mb-20">She then went to LSU Medical School in New Orleans where she was an
              Honors Program Graduate and finished in the top quartile of his graduating class. She completed his
              Internal Medicine Residency at the University of Alabama in Birmingham, AL where he was selected as a
              Chief Internal Medicine Resident.
            </p>
          </div><!-- /.text-block -->
          <div class="timeline-wrapper mb-60">
            <!-- Timeline Item #1 -->
            <div class="timeline-item d-flex">
              <span class="timeline__year">2020</span>
              <div class="timeline__body">
                <h4 class="timeline__title">Royal College of Surgeons of Harvard</h4>
                <p class="timeline__desc mb-0">We partner with you to enable your technology so that you can focus on
                  your organization’s mission leverage our talent, and creativity to help your business succeed above
                  all your business competitors.
                </p>
              </div><!-- /.timeline__body -->
            </div><!-- /.timeline-item -->
            <!-- Timeline Item #2 -->
            <div class="timeline-item d-flex">
              <span class="timeline__year">2015</span>
              <div class="timeline__body">
                <h4 class="timeline__title">Fellowship, Royal College of Physicians of Harvard</h4>
                <p class="timeline__desc mb-0">After relocating to Louisiana she served as Director of the Cardiac
                  Catheterization Lab at Regional Medical Center of Acadiana. She was honored by the Medical
                  Association for Physician's Recognition Award from March of 2015 through May 2016.
                </p>
              </div><!-- /.timeline__body -->
            </div><!-- /.timeline-item -->
            <!-- Timeline Item #3 -->
            <div class="timeline-item d-flex">
              <span class="timeline__year">2015</span>
              <div class="timeline__body">
                <h4 class="timeline__title">Residency, St. Harvard University Hospital</h4>
                <p class="timeline__desc mb-0">Dr has also had professional accomplishments at the University of
                  Southern California School of Medicine and Medical Center including Instructor of Medicine, Chief
                  Administrative Fellow, Division of Cardiology University of Southern California.
                </p>
              </div><!-- /.timeline__body -->
            </div><!-- /.timeline-item -->
          </div><!-- /.timeline-wrapper -->
          <div class="text-block mb-40">
            <h5 class="text-block__title">Doctor’s Skills</h5>
            <p class="text-block__desc mb-20">He completed his Internal Medicine Residency at the University of
              Alabama in Birmingham, AL where he was selected as a Chief Internal Medicine Resident. He then went to
              LSU Medical School in New Orleans where he was an Honors Program Graduate and finished in the top
              quartile of his graduating class.
            </p>
          </div><!-- /.text-block -->
          <div class="animated-Progressbars mb-60">
            <!-- progress 1 -->
            <div class="progress-item">
              <h5 class="progress__title">Cardiac Rehabilitation</h5>
              <div class="progress">
                <div class="progress-bar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" role="progressbar">
                  <span class="progress__percentage"></span>
                </div>
              </div><!-- /.progress -->
            </div><!-- /.progress-item  -->
            <!-- progress 2 -->
            <div class="progress-item">
              <h5 class="progress__title">Nuclear Cardiology</h5>
              <div class="progress">
                <div class="progress-bar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" role="progressbar">
                  <span class="progress__percentage"></span>
                </div>
              </div><!-- /.progress -->
            </div><!-- /.progress-item  -->
            <!-- progress 3 -->
            <div class="progress-item">
              <h5 class="progress__title">Neurocritical Care</h5>
              <div class="progress">
                <div class="progress-bar" aria-valuenow="81" aria-valuemin="0" aria-valuemax="100" role="progressbar">
                  <span class="progress__percentage"></span>
                </div>
              </div><!-- /.progress -->
            </div><!-- /.progress-item  -->
          </div><!-- /.animated-Progressbars -->
        </div><!-- /.col-lg-8 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section>
@endsection