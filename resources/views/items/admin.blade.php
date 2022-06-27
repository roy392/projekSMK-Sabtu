@extends('admin')

@section('main-content')
<div class="panel panel-headline">

    <div class="panel-heading" style="margin-bottom: 2%">
        <h3 class="panel-title col-md-4">Selamat Datang 2022</h3>


    </div>


    <!-- Isi Content -->

    <div class="panel-body">
        <div class="row">
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-users"></i></span>
                    <p><a href="{{ route('dataMatpel') }}"><i class="lnr lnr-bookmark"></i>
                        <span class="number">#</span>
                        <span class="title">Guru</span>
                        </a>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-sort-alpha-asc"></i></span>
                    <p>
                    <a href="{{ route('dataMatpel') }}"><i class="lnr lnr-bookmark"></i> 
                        <span class="number">#</span>
                        <span class="title">Mata Pelajaran</span>
                        </a>   
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-map-o"></i></span>
                    <p><a href="{{ route('dataMatpel') }}"><i class="lnr lnr-bookmark"></i>
                        <span class="number">#</span>
                        <span class="title">Tahun Ajaran</span>
                    </a>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-users"></i></span>
                    <p><a href="{{ route('dataMatpel') }}"><i class="lnr lnr-bookmark"></i>
                        <span class="number">#</span>
                        <span class="title">Siswa</span>
                        </a> 
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-users"></i></span>
                    <p><a href="{{ route('dataMatpel') }}"><i class="lnr lnr-bookmark"></i>
                        <span class="number">#</span>
                        <span class="title">Profil Sekolah</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.Isi Content -->


</div>
@endsection

