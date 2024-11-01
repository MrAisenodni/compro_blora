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
      Terms and Privacy
  ========================== -->
  <section style="padding-top: 50px; padding-bottom: 50px">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2>Kebijakan Privasi</h2>
          <p>Kebijakan Privasi untuk Rumah Sakit PKU Muhammadiyah Blora</p>
          <p>Di Website Rumah Sakit PKU Muhammadiyah Blora, dapat diakses dari www.pkublora.id, salah satu prioritas utama kami adalah privasi pengunjung kami. Dokumen Kebijakan Privasi ini berisi jenis informasi yang dikumpulkan dan dicatat oleh Rumah Sakit PKU Muhammadiyah Blora dan bagaimana kami menggunakannya.</p>
          <p>Jika Anda memiliki pertanyaan tambahan atau memerlukan informasi lebih lanjut tentang Kebijakan Privasi kami, jangan ragu untuk menghubungi kami.</p>
          
          <h3>File Log</h3>
          <p>Rumah Sakit PKU Muhammadiyah Blora mengikuti prosedur standar menggunakan file log. File-file ini mencatat pengunjung ketika mereka mengunjungi situs web. Semua perusahaan hosting melakukan ini dan merupakan bagian dari analisis layanan hosting. Informasi yang dikumpulkan oleh file log termasuk alamat protokol internet (IP), jenis browser, Penyedia Layanan Internet (ISP), cap tanggal dan waktu, halaman rujukan/keluar, dan mungkin jumlah klik. Ini tidak terkait dengan informasi apa pun yang dapat diidentifikasi secara pribadi.</p>
          <p>Tujuan dari informasi ini adalah untuk menganalisis tren, mengelola situs, melacak pergerakan pengguna di situs web, dan mengumpulkan informasi demografis. Kebijakan Privasi kami dibuat dengan bantuan Generator Kebijakan Privasi.</p>
          
          <h3>Cookie dan Web Beacon</h3>
          <p>Seperti situs web lainnya, Rumah Sakit PKU Muhammadiyah Blora menggunakan ‘cookies’. Cookie ini digunakan untuk menyimpan informasi termasuk preferensi pengunjung, dan halaman di situs web yang diakses atau dikunjungi pengunjung. Informasi tersebut digunakan untuk mengoptimalkan pengalaman pengguna dengan menyesuaikan konten halaman web kami berdasarkan jenis browser pengunjung dan/atau informasi lainnya.</p>
          
          <h3>Cookie Google DoubleClick DART</h3>
          <p>Google adalah salah satu vendor pihak ketiga di situs kami. Ini juga menggunakan cookie, yang dikenal sebagai cookie DART, untuk menayangkan iklan kepada pengunjung situs kami berdasarkan kunjungan mereka ke www.website.com dan situs lain di internet. Namun, pengunjung dapat memilih untuk menolak penggunaan cookie DART dengan mengunjungi Kebijakan Privasi jaringan iklan dan konten Google di URL berikut – https://policies.google.com/technologies/ads</p>
          
          <h3>Mitra Periklanan Kami</h3>
          <p>Beberapa pengiklan di situs kami mungkin menggunakan cookie dan suar web. Mitra periklanan kami tercantum di bawah ini. Setiap mitra periklanan kami memiliki Kebijakan Privasi mereka sendiri untuk kebijakan mereka tentang data pengguna. Untuk akses yang lebih mudah, kami menautkan ke Kebijakan Privasi mereka di bawah ini.</p>
          <ul>
            <li>Google - <a href="https://policies.google.com/technologies/ads">https://policies.google.com/technologies/ads</a></li>
          </ul>
          
          <h3>Kebijakan Privasi Pihak Ketiga</h3>
          <p>Kebijakan Privasi Rumah Sakit PKU Muhammadiyah Blora tidak berlaku untuk pengiklan atau situs web lain. Oleh karena itu, kami menyarankan Anda untuk berkonsultasi dengan Kebijakan Privasi masing-masing dari server iklan pihak ketiga ini untuk informasi lebih rinci. Ini mungkin termasuk praktik dan instruksi mereka tentang cara memilih keluar dari opsi tertentu.</p>
          <p>Anda dapat memilih untuk menonaktifkan cookie melalui opsi browser individual Anda. Untuk mengetahui informasi lebih rinci tentang manajemen cookie dengan browser web tertentu, dapat ditemukan di situs web masing-masing browser.</p>

          <h3>Informasi Anak</h3>
          <p>Bagian lain dari prioritas kami adalah menambahkan perlindungan bagi anak-anak saat menggunakan internet. Kami mendorong orang tua dan wali untuk mengamati, berpartisipasi, dan/atau memantau dan memandu aktivitas online mereka.</p>
          <p>Rumah Sakit PKU Muhammadiyah Blora tidak secara sadar mengumpulkan Informasi Identifikasi Pribadi apa pun dari anak di bawah 13 tahun. Jika Anda berpikir bahwa anak Anda memberikan informasi semacam ini di situs web kami, kami sangat menganjurkan Anda untuk menghubungi kami segera dan kami akan melakukan upaya terbaik kami untuk segera menghapus informasi tersebut dari catatan kami.</p>

          <h3>Hanya Kebijakan Privasi Online</h3>
          <p>Kebijakan Privasi ini hanya berlaku untuk aktivitas online kami dan berlaku untuk pengunjung situs web kami sehubungan dengan informasi yang mereka bagikan dan/atau kumpulkan di Rumah Sakit PKU Muhammadiyah Blora. Kebijakan ini tidak berlaku untuk informasi apa pun yang dikumpulkan secara offline atau melalui saluran selain situs web ini.</p>

          <h3>Izin</h3>
          <p>Dengan menggunakan situs web kami, Anda dengan ini menyetujui Kebijakan Privasi kami dan menyetujui Syarat dan Ketentuannya.</p>
        </div>
      </div>
    </div>
  </section>
@endsection
