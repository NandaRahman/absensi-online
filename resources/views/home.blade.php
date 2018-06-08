@extends('layouts.master')

@role('admin')
@section('content')
    <div class="container-fluid">
        <div class="text-center" style="height: 500px; margin-top: 200px;">
            <div class="col-sm-12">
                <h1>absen.si</h1>
                <p>Sistem absensi terbaru berbasis online<br> pada SMK Rajasa Surabaya</p>
                @if (\App\Models\StatusAbsensi::all()->where('tanggal','=', date('Y-m-d'))->count() == 0 )
                    <a href="{{route('admin.open-absence')}}" class="btn btn-default btn-lg js-scroll-trigger">
                        <span><i class="fa fa-pencil-square-o animated"></i> Buka Absen</span>
                    </a>
                @else
                    <a href="" disabled="" class="btn btn-default btn-lg js-scroll-trigger">
                        <span><i class="fa fa-pencil-square-o animated"></i> Absen Telah Dibuka</span>
                    </a>
                @endif
            </div>
        </div>

    </div>
@endsection
@endrole


@role('user')
@section('content')
<!-- Intro Header -->
<header class="masthead" style="height: 700px !important;">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1 class="brand-heading">absen.si</h1>
                    <p class="intro-text">Sistem absensi terbaru berbasis online<br> pada SMK Rajasa Surabaya</p>
                    <a href="#absen" class="btn btn-default btn-lg js-scroll-trigger">
                        <span><i class="fa fa-pencil-square-o animated"></i> Absen</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- absen section -->
<section id="absen" class="content-section text-center">
    <div class="container">
        <div class="col-lg-8 mx-auto">
            @if(isset($data))
                <h1>Jadwal Hari Ini</h1>
                <p>Pelajaran Kelas Tanggal</p>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Jam</th>
                        <th>Kelas</th>
                        <th>Pelajaran</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    @foreach($data as $val)
                        <tr>
                            <td>{{date("H:i",strtotime($val->jam))}}</td>
                            <td>{{$val->kode_kelas}}</td>
                            <td>{{$val->pelajaran}}</td>
                            <td>
                                <form method="post" action="{{route('user.open-absence')}}">
                                    @csrf
                                    <input type="hidden" value="{{$val->id}}" name="id">
                                    @if($val->avail==1)
                                        <button type="submit" class="btn btn-sm btn-success">Buka</button>
                                    @else
                                        <button type="button" class="btn btn-sm btn-danger" disabled>Tutup</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <h3>Tidak ada Jadwal Mengajar untuk Hari Ini.</h3>
            @endif
        </div>
    </div>

</section>

<!-- Footer -->
<footer>
    <div class="container text-center">
        <p>Copyright &copy; Lima Gangsal 2018</p>
    </div>
</footer>
@endsection
@endrole