@extends('layouts.main')

@section('title', $c_menu->title)
@section('meta-description', 'Rumah Sakit PKU Muhammadiyah Blora, pusat kesehatan terkemuka di Blora, Jawa Tengah. Menyediakan pelayanan kesehatan unggulan dengan tim medis profesional dan fasilitas lengkap.')

@section('styles')
@endsection

@section('scripts')
@endsection

@section('content')
    {!! $c_menu->description !!}
    <!-- ========================= 
            Google Map
    =========================  -->
    <section class="google-map py-0">
        <iframe frameborder="0" height="500" width="100%"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.3242869853525!2d111.44773257399808!3d-6.971015593029616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7741b599c30ead%3A0xfd91f5d5924da287!2sRS%20PKU%20Muhammadiyah%20Blora!5e0!3m2!1sid!2sid!4v1716834529379!5m2!1sid!2sid"></iframe>
      </section><!-- /.GoogleMap -->
  
      <!-- ==========================
          contact layout 1
      =========================== -->
      <section class="contact-layout1 pt-0 mt--100">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="contact-panel d-flex flex-wrap">
                <form class="contact-panel__form" method="post" action="assets/php/contact.php" id="contactForm">
                  <div class="row">
                    <div class="col-sm-12">
                      <h4 class="contact-panel__title">How Can We Help? </h4>
                      <p class="contact-panel__desc mb-30">Please feel welcome to contact our friendly reception staff
                        with any general or medical enquiry. Our doctors will receive or return any urgent calls.
                      </p>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                        <i class="icon-user form-group-icon"></i>
                        <input type="text" class="form-control" placeholder="Name" id="contact-name" name="contact-name"
                          required>
                      </div>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                        <i class="icon-email form-group-icon"></i>
                        <input type="email" class="form-control" placeholder="Email" id="contact-email"
                          name="contact-email" required>
                      </div>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                        <i class="icon-phone form-group-icon"></i>
                        <input type="text" class="form-control" placeholder="Phone" id="contact-Phone"
                          name="contact-phone" required>
                      </div>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                        <i class="icon-news form-group-icon"></i>
                        <select class="form-control">
                          <option value="0">Subject</option>
                          <option value="1">Subject 1</option>
                          <option value="2">Subject 1</option>
                        </select>
                      </div>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-12">
                      <div class="form-group">
                        <i class="icon-alert form-group-icon"></i>
                        <textarea class="form-control" placeholder="Message" id="contact-message"
                          name="contact-message"></textarea>
                      </div>
                      <button type="submit" class="btn btn__secondary btn__rounded btn__block btn__xhight mt-10">
                        <span>Submit Request</span> <i class="icon-arrow-right"></i>
                      </button>
                      <div class="contact-result"></div>
                    </div><!-- /.col-lg-12 -->
                  </div><!-- /.row -->
                </form>
                <div
                  class="contact-panel__info d-flex flex-column justify-content-between bg-overlay bg-overlay-primary-gradient">
                  <div class="bg-img"><img src="assets/images/banners/1.jpg" alt="banner"></div>
                  <div>
                    <h4 class="contact-panel__title color-white">Quick Contacts</h4>
                    <p class="contact-panel__desc font-weight-bold color-white mb-30">Please feel free to contact our
                      friendly staff with any medical enquiry.
                    </p>
                  </div>
                  <div>
                    <ul class="contact__list list-unstyled mb-30">
                      <li>
                        <i class="icon-phone"></i><a href="tel:+5565454117">Emergency Line: (002) 01061245741</a>
                      </li>
                      <li>
                        <i class="icon-location"></i><a href="#">Location: Brooklyn, New York</a>
                      </li>
                      <li>
                        <i class="icon-clock"></i><a href="contact-us.html">Mon - Fri: 8:00 am - 7:00 pm</a>
                      </li>
                    </ul>
                    <a href="#" class="btn btn__white btn__rounded btn__outlined">Contact Us</a>
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