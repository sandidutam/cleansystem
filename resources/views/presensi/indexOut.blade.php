@extends('layouts.index_master')

@section('title')
    Presensi Keluar
@endsection

@section('presensi.active')
active 
@endsection

@section('presensi.show')
show 
@endsection

@section('indexout.active')
active
@endsection 

@section('content')

<!-- Page Heading -->
{{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{ route('pegawai.create') }}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm">
    <i class="fas fa-plus-circle fa-sm text-white-50"></i> Data Baru</a>
</div> --}}

@if(session('notifikasi_sukses'))
<div class="alert alert-success alert-dismissable mt-4 fade show" role="alert">
    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <i class="fa fa-check-circle"></i>
    {{session('notifikasi_sukses')}}
</div>
@endif

@if(session('notifikasi_gagal'))
<div class="alert alert-danger alert-dismissable mt-4 fade show" role="alert">
    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <i class="fa fa-exclamation-triangle"></i>
    {{session('notifikasi_gagal')}}
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Menu Presensi Keluar</h4>
    </div>

    <div class="card-body">
        <br>


        <div class="row">
            <div class="col">
                <form action="{{route('presensi.indexout')}} " method="GET">
                    <div class="row">
                        <label for="search" class="text-danger fst-italic fw-bold" style=""> *Masukkan Nomor Pegawai</label>
                    </div>
                    <div class="row {{$errors->has('search') ? 'has-error' : ''}} ">
                        <div class="col-6">
                            <input type="text" name="search" id="search" class="form-control" placeholder="contoh : PGW-2020001" aria-describedby="helpId" autocomplete="off">
                        </div>
                        <div class="col-3 ml-2">
                            <button type="submit" class="btn btn-outline-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                                Cari
                            </button>
                        </div>
                        @if($errors->has('search'))
                            <span class="help-block text-danger">{{$errors->first('search')}}</span>
                        @endif
                    </div>   
                </form>
            </div>
            <div class="col"></div>
        </div>
        <br>
        <br>

        <table class="table table-sm table-hover table-striped">
            <tr class="text-center">
                <th>NO</th>
                <th>NOMOR PEGAWAI</th>
                <th>NAMA LENGKAP</th>
                <th>JABATAN</th>
                <th>SEKTOR</th>
                {{-- <th>TANGGAL</th>
                <th>JAM MASUK</th>
                <th>JAM KELUAR</th>
                <th>CATATAN</th> --}}
                <th>AKSI</th>
            </tr>
        
            <?php $i = 1; ?>
            @forelse($data_presensi as $pegawai)
            <tr class="text-center">
                <td><?= $i; ?></td>
                <td>{{$pegawai->nomor_pegawai}}</td>
                <td>{{$pegawai->nama_lengkap}}</td>
                <td>{{$pegawai->jabatan}}</td>
                <td>{{$pegawai->sektor_area}}</td>
                {{-- <td>{{date('d F Y', strtotime($pegawai->tanggal))}}</td>
                <td>{{$pegawai->jam_masuk}}</td> 
                <td>{{$pegawai->jam_keluar}}</td>
                <td>{{$pegawai->catatan_masuk}} {{$pegawai->catatan_keluar}}</td> --}}
                <td>
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('presensi.checkout', $pegawai->id) }}" class="btn btn-md btn-danger text-white" type="button">Presensi Keluar</a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php $i++; ?>
            @empty 
            <tr>
                <td colspan="11" class="text-center text-white bg-secondary"><i><b>TIDAK ADA DATA UNTUK DITAMPILKAN</b></i></td>
            </tr>

            @endforelse
        </table>

    </div>
</div>

@endsection