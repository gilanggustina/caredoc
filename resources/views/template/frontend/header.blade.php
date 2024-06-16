<header class="header-area" id="page-top">
    <!-- site-navbar start -->
    <div class="navbar-area">
        <div class="container">
            <nav class="site-navbar">
                <!-- site logo -->
                <div class="content-image">
                    <img src="{!!asset('assets/images/caredoc.png')!!}" alt="caredoc-logo">
                </div>
                <!-- site menu/nav -->
                <ul class="menu" id="menu">
                    <li class="{{ request()->segment(1) == '' ? 'active' : '' }}">
                        <a href="{!! route('index') !!}/#page-top" class="scroll">Beranda</a>
                    </li>
                    <li><a href="{!! route('index') !!}/#about" class="scroll">Tentang</a></li>
                    <li><a href="{!! route('index') !!}/#caredoc" class="scroll">Caredoc</a></li>
                    <li><a href="{!! route('index') !!}/#reservasi" class="scroll">Reservasi</a></li>
                    <li class="{{ request()->segment(1) === 'illness' ? 'active' : '' }}"><a href="{!!route('illness.index')!!}">Artikel</a></li>
                    {{-- <li><a href="tim.php">Tim</a></li> --}}
                </ul>
                <!-- nav-toggler for mobile version only -->
                <button class="nav-toggler">
                    <span></span>
                </button>
            </nav>
        </div>
    </div>
</header>
