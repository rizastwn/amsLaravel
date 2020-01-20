@include('layouts.messages')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AMS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style4.css')}}">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>
<body>
        <div class="wrapper">
                <!-- Sidebar  -->
                <nav id="sidebar">
                    <div class="sidebar-header">
                        <h3> <a href="/home">Aplikasi Monitoring Siswa</a> </h3>
                        <strong> <a href="/home">AMS</a></strong>
                    </div>
        
                    <ul class="list-unstyled components">
                        @auth
                        
                        {{-- side bar untuk orang tua siswa --}}
                        @if (Auth::user()->role == 'orang tua')
                        <li>
                            <a href="/siswa">
                                <i class="fa fa-address-card"></i> Profil Siswa
                            </a>
                        </li>
                        <li>
                        <a href="/orangtua">
                                <i class="fa fa-address-card"></i> Profil Orang tua murid
                            </a>
                        </li>

                        <li>
                            <a href="/nilaiTema">
                                <i class="fa fa-book"></i> Nilai Tema
                            </a>
                        </li>
                        <li>
                            <a href="/nilaiSubtemaSiswa">
                                <i class="fa fa-book"></i> Nilai Subtema
                            </a>
                        </li>
                        <li>
                            <a href="/nilaiUtsUas">
                                <i class="fa fa-book"></i> Nilai UTS dan UAS
                            </a>
                        </li>
                        <li>
                            <a href="/nilaiRapot">
                                <i class="fa fa-briefcase"></i> Nilai Rapot
                            </a>
                        </li>
                        
                       
                        @endif
                        {{-- side bar untuk orang tua siswa --}}
                        
                        
                        {{-- side bar untuk admin --}}
                        @if (Auth::user()->role == 'admin')
                        <li>
                            <a href="/daftarSiswa">
                                <i class="fa fa-address-card"></i> Daftar siswa
                            </a>
                        </li>
                        <li>
                            <a href="/daftarOrangtua">
                                <i class="fa fa-id-card"></i> Daftar Orang tua 
                            </a>
                        </li>
                        <li>
                            <a href="/waliKelas">
                                <i class="fa fa-id-card"></i> Daftar Wali Kelas
                            </a>
                        </li>
                        <li>
                            <a href="/jadwalAkademik">
                                <i class="fa fa-calendar"></i> Jadwal akademik
                            </a>
                        </li>
                        <li>
                            <a href="/daftarTema">
                                <i class="fa fa-list"></i> Daftar Tema 
                            </a>
                        </li>
                        <li>
                            <a href="/standarNilai">
                                <i class="fa fa-book"></i> Standar Nilai Siswa 
                            </a>
                        </li>
                        @endif
                        {{-- side bar untuk admin --}}
                        {{-- side bar untuk wali kelas --}}
                        @if (Auth::user()->role == 'wali kelas')
                        
                        <li>
                            <a href="/daftarNilaiTema">
                                <i class="fa fa-book"></i> Daftar Nilai Tema
                            </a>
                        </li>
                        <li>
                        <li>
                            <a href="/daftarNilaiSubtema">
                                <i class="fa fa-book"></i> Daftar Nilai Subtema
                            </a>
                        </li>
                        <li>
                            <a href="/subtema">
                                <i class="fa fa-book"></i> Rancangan Subtema
                            </a>
                        </li>
                        <li>
                            <a href="/daftarNilaiUtsUas">
                                <i class="fa fa-book"></i> Daftar Nilai UTS dan UAS
                            </a>
                        </li>
                        <li>
                            <a href="/daftarNilaiRapot">
                                <i class="fa fa-briefcase"></i> Daftar Nilai Rapot
                            </a>
                        </li>
                        
                        @endif
                        {{-- side bar untuk wali kelas --}}
                        @endauth
                    </ul>
                </nav>
        
                <!-- Page Content  -->
                <div id="content">
        
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
        
                            <button type="button" id="sidebarCollapse" class="btn btn-success">
                                <i class="fas fa-align-left"></i>
                                <span>Menu</span>
                            </button>
                            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-align-justify"></i>
                            </button>
        
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="nav navbar-nav ml-auto">
                                    <li class="nav-item">
                                            <a class="btn btn-danger" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                             {{ __('Logout') }}
                                         </a>
     
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                             @csrf
                                         </form>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </nav>
                   
                    @yield('content')
                    
                            
                    
                </div>
            </div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
</body>
</html>

