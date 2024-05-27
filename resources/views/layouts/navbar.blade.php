
<nav class="navbar navbar-expand-lg sticky-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.html">
            <img src="{{ asset('/storage/logo_header.png') }}" class="logo-light" alt="logo" height="70px">
            <img src="{{ asset('/storage/logo_header.png') }}" class="logo-dark" alt="logo" height="70px">
        </a>
        <button class="navbar-toggler" type="button">
            <span class="menu-lines"><span></span></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavigation">
            <ul id="menu_list" class="navbar-nav ml-auto">
            </ul><!-- /.navbar-nav -->
            <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
        </div><!-- /.navbar-collapse -->
        <div class="d-none d-xl-flex align-items-center position-relative ml-30">
            <a href="appointment.html" class="btn btn__primary btn__rounded ml-30">
                <i class="icon-calendar"></i>
                <span>Appointment</span>
            </a>
        </div>
    </div><!-- /.container -->
</nav><!-- /.navabr -->

<script>
    var container = document.getElementById('menu_list');

    @if ($menus)
        @foreach($menus as $menu)
            var id = {{ $menu->id }}
            var conid = document.getElementById('menu_{{ $menu->parent_id }}');

            @if ($menu->is_parent == 1 && $menu->parent_id == 0)
                container.innerHTML += `<li class="nav__item has-dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link">{{ $menu->title }}</a>
                        <ul id="menu_{{ $menu->id }}" class="dropdown-menu">
                        </ul>
                    </li>`;
            @elseif ($menu->is_parent == 0 && $menu->parent_id == 0)
                container.innerHTML += `<li class="nav__item"><a href="{{ $menu->url }}" class="nav__item-link @if ($c_menu == $menu->url) active @endif">{{ $menu->title }}</a></li>`;
            @elseif ($menu->is_parent == 1 && $menu->parent_id <> 0)
                container.innerHTML += `<li class="nav__item has-dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link">{{ $menu->title }}</a>
                        <ul id="menu_{{ $menu->id }}" class="dropdown-menu">
                        </ul>
                    </li>`;
            @elseif ($menu->is_parent == 0 && $menu->parent_id <> 0)
                container.innerHTML += `<li class="nav__item"><a href="{{ $menu->url }}" class="nav__item-link @if ($c_menu == $menu->url) active @endif">{{ $menu->title }}</a></li>`;
            @endif
        @endforeach
    @endif
</script>