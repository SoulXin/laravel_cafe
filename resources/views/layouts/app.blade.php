<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{ asset('side_bar/css/styles.css')}}">

    <!-- Font awesome -->
    <link href="{{ asset('vendor/fontawesome/css/fontawesome.min.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        /* Memberikan efek transition pada container yang akan dirender */
        #container_render{
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }
    </style>
</head>
<body>
    @include('sweet::alert')
    <div id="app">
        @auth
            <div id="body-pd">
                <header class="header" id="header">
                    <div class="header__toggle">
                        <i class='bx bx-menu' id="header-toggle"></i>
                    </div>
                         
                    <div>
                        <span>Login Sebagai : </span>
                        <b>{{ Auth::user()->name  }}</b>
                    </div>
                </header>

                <div class="l-navbar" id="nav-bar">
                    <nav class="nav">
                        <div>
                            <a href="#" class="nav__logo">
                                <i class='bx bxs-coffee nav__logo-icon'></i>
                                <span class="nav__logo-name">Admin Cafetaria</span>
                            </a>

                            <div class="nav__list">
                                <a href = "{{ route('dashboard') }}" class="nav__link active">
                                    <i class='bx bx-grid-alt nav__icon' ></i>
                                    <span class="nav__name">Dashboard</span>
                                </a>

                                <a href = " {{ route('pesanan') }} " class="nav__link">
                                    <i class='bx bx-list-ul nav__icon' ></i>
                                    <span class="nav__name">Pesanan</span>
                                </a>
                                
                                <a href = " {{ route('makanan.index') }} " class="nav__link" >
                                    <i class='bx bxs-food-menu nav__icon' ></i>
                                    <span class="nav__name">Makanan</span>
                                </a>
                                <a href = "" class="sub-btn nav__link" id="akun">
                                    <i class='bx bxs-user nav__icon dropdown' ></i>
                                    <span class="nav__name">Akun</span>
                                </a>
                                <ul class="sub-menu">
                                    <a href = "/register" class="nav__link sub_nav_link" >
                                        <span class="nav__name">Tambah Akun</span>
                                    </a>
                                    <a href = " {{ route('makanan.index') }} " class="nav__link sub_nav_link" >
                                        <span class="nav__name">Daftar Akun</span>
                                    </a>

                                    <a href = " {{ route('hak_akses.index') }} " class="nav__link sub_nav_link" >
                                        <span class="nav__name">Hak Akses</span>
                                    </a>
                                </ul>
                                <a href = " {{ route('makanan.index') }} " class="nav__link" >
                                    <i class='bx bxs-food-menu nav__icon' ></i>
                                    <span class="nav__name">Makanan</span>
                                </a>
                            </div>
                        </div>
                        
                        <a href =" {{ route('logout') }} " class="nav__link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class='bx bx-log-out nav__icon' ></i>
                            <span class="nav__name">Log Out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </nav>
                </div>
            </div>
        @endauth
        <main class="py-0" id="content">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('side_bar/js/main.js') }}"></script>
    <script>
        $('.sub-menu').hide();

        $(document).ready(function () {
            const   link = $('.nav__link'),
                    render_body = $('#render_body');
 
            link.on('click',function(t){
                t.preventDefault();
                let route = $(this).attr('href');
                
                if(route){
                    $.get(route,function(data){
                        render_body.html(data);
                    });
                } 
            })

            $('.sub-btn').click(function(){
                $(this).next('.sub-menu').slideToggle();
                $(this).find('.dropdown').toggleClass('rotate');
            });
        })
    </script>
</body>
</html>
