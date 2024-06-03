<div class="header-topbar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between">
                    <ul class="contact__list d-flex flex-wrap align-items-center list-unstyled mb-0">
                        <li>
                            <i class="icon-phone"></i><a href="tel:{{ $provider->office_no }}">Emergency Line: {{ $provider->office_no }}</a>
                        </li>
                        <li>
                            <i class="icon-location"></i><a href="#">Location: {{ $provider->city }}, {{ $provider->province }}</a>
                        </li>
                        {{-- <li>
                            <i class="icon-clock"></i><a href="contact-us.html">Mon - Fri: 8:00 am - 7:00 pm</a>
                        </li> --}}
                    </ul><!-- /.contact__list -->
                    <div class="d-flex">
                        <ul class="social-icons list-unstyled mb-0 mr-30">
                            @if ($sosmeds)
                                @foreach ($sosmeds as $sosmed)
                                    <li><a href="{{ $sosmed->url }}" data-title="{{ $sosmed->title }}"><i class="{{ $sosmed->icon }}"></i></a></li>
                                @endforeach
                            @endif
                        </ul><!-- /.social-icons -->
                        {{-- <form class="header-topbar__search">
                            <input type="text" class="form-control" placeholder="Search...">
                            <button class="header-topbar__search-btn"><i class="fa fa-search"></i></button>
                        </form> --}}
                    </div>
                </div>
            </div><!-- /.col-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>