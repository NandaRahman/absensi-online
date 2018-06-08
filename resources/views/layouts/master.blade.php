<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ config('app.name', 'Absen') }}</title>
    @role('user')
    <link href="{{asset('public/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="{{asset('public/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>
    <!-- Custom styles for this template -->
    <link href="{{asset('public/css/grayscale.css')}}" rel="stylesheet">
    @endrole

    @role('admin')
    <link href="{{asset('public/sb-admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('public/sb-admin/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('public/sb-admin/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('public/sb-admin/vendor/morrisjs/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('public/sb-admin/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('public/css/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/jquery.paginate.min.css')}}">

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">

    <!-- DataTables CSS -->
    <link href="{{asset('public/sb-admin/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('public/sb-admin/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    @endrole
    @role('admin')
    <!-- jQuery -->
    <script src="{{asset('public/sb-admin/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('public/sb-admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('public/sb-admin/vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{asset('public/sb-admin/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/sb-admin/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('public/sb-admin/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{asset('public/sb-admin/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('public/sb-admin/vendor/morrisjs/morris.min.js')}}"></script>
    <script src="{{asset('public/sb-admin/data/morris-data.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('public/sb-admin/dist/js/sb-admin-2.js')}}"></script>
    @endrole


    @role('user')
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('public/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('public/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script> -->

    <!-- Custom scripts for this template -->
    <script src="{{asset('public/js/grayscale.min.js')}}"></script>
    @endrole


    <script src="{{asset('public/code/highstock.js')}}"></script>
    <script src="{{asset('public/code/modules/exporting.js')}}"></script>
    <script src="{{asset('public/code/modules/export-data.js')}}"></script>

</head>
<body>
<main style="height: 100%">
    <div id="wrapper">
        @role('admin')
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{asset('home')}}">ABSEN.SI</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i>
                        {{ __('Logout') }}, {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li><a href="{{route('home')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
                        @role('admin')
                        <li><a href="{{ route('report.absence') }}"><i class="fa fa-paperclip fa-fw"></i> {{ __('Absen') }}</a></li>
                        <li><a href="{{ route('admin.time') }}"><i class="fa fa-times-circle fa-fw"></i> {{ __('Jam') }}</a></li>
                        <li><a href="{{ route('admin.schedule') }}"><i class="fa fa-hacker-news fa-fw"></i> {{ __('Jadwal') }}</a></li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Data Dasar<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ route('admin.teacher') }}"><i class="fa fa-times-circle fa-fw"></i> {{ __('Guru') }}</a></li>
                                <li><a href="{{ route('admin.student') }}"><i class="fa fa-times-circle fa-fw"></i> {{ __('Siswa') }}</a></li>
                                <li><a href="{{ route('admin.class') }}"><i class="fa fa-times-circle fa-fw"></i> {{ __('Kelas') }}</a></li>
                                <li><a href="{{ route('admin.lesson') }}"><i class="fa fa-times-circle fa-fw"></i> {{ __('Pelajaran') }}</a></li>
                            </ul>
                        </li>
                        @endrole
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        @endrole
        @role('user')
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">absen.si</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
        @endrole

        <div id="page-wrapper">
            {{--<div class="container">--}}
                @yield('content')
            {{--</div>--}}
        </div>
    </div>
</main>
</body>
</html>
