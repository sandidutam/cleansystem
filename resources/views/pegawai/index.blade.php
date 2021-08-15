@extends('layouts.index_master')

@section('title')
    Data Pegawai
@endsection

@section('pegawai.active')
active
@endsection 

@section('datapegawai.active')
active
@endsection

@section('datapegawai.show')
show
@endsection

@section('content')
    
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    

    <a href="{{ route('pegawai.create') }}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm">
        <i class="fas fa-plus-circle fa-sm text-white-50"></i> Data Baru</a>
</div>

{{-- <div class="row mt-2 mb-2">
    <div class="col">
        <h1>Data Pegawai</h1>
    </div>
    <div class="col">
        <a class="btn btn-md btn-primary float-end" href="{{ route('pegawai.create') }} " role="button">Data Baru</a>
    </div>
</div> --}}
    
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">  
                <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <tr >
                        <th>NO</th>
                        <th>NOMOR PEGAWAI</th>
                        <th>NAMA LENGKAP</th>
                        {{-- <th>TANGGAL LAHIR</th> --}}
                        <th>JABATAN</th>
                        <th>SEKTOR</th>
                        <th>PENEMPATAN</th>
                        <th>TANGGAL DITERIMA</th>
                        <th>QR CODE</th>
                        <th>AKSI</th>
                    </tr>
                
                    <?php $i = 1; ?>
                    @forelse($data_pegawai as $pegawai)
                    <tr >
                        <td><?= $i; ?></td>
                        <td>{{$pegawai->nomor_pegawai}}</td>
                        <td><a href="{{ route('pegawai.show', $pegawai->id) }}">{{$pegawai->nama_lengkap}}</a></td>
                        {{-- <td>{{date('d-m-Y', strtotime($pegawai->tanggal_lahir))}}</td> --}}
                        <td>{{$pegawai->jabatan}}</td>
                        <td>{{$pegawai->sektor_area}}</td>
                        <td>{{$pegawai->penempatan}}</td>
                        <td>{{date('d-m-Y', strtotime($pegawai->tanggal_diterima))}}</td> {{-- View Tanggal diubah dari Y-m-d ke d-m-Y --}}
                        <td>{!! QrCode::size(200)->generate('http://192.168.100.109:8000/api/presensi/'.$pegawai->id.'/get'); !!}</td>
                        <td>
                            <div class="row">
                                <div class="col-4">
                                    <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-md btn-warning d-flex align-items-center" type="button"><i class="fas fa-edit mr-1"></i> Edit</a>
                                </div>
                                <div class="col-4">                               
                                    <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-md btn-danger d-flex align-items-center"><i class="fas fa-trash mr-1"></i> Hapus</button>
                                    </form>
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
</div>
{{ $data_pegawai->links() }}

@endsection