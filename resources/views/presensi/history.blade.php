@extends('layouts.index_master')

@section('title')
    Riwayat Presensi
@endsection

@section('presensi.active')
active 
@endsection

@section('presensi.show')
show 
@endsection

@section('riwayat.active')
active 
@endsection

@section('content')
    
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

@if(session('notifikasi_tidak_masuk'))
<div class="alert alert-warning alert-dismissable mt-4 fade show" role="alert">
    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <i class="fa fa-exclamation-triangle"></i>
    {{session('notifikasi_tidak_masuk')}}
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Riwayat Presensi</h4>
    </div>

    <div class="card-body">
        <br>

        <table class="table table-striped">
        
            <tr>
                <th>NO</th>
                <th>NOMOR PEGAWAI</th>
                <th>NAMA LENGKAP</th>
                <th>JABATAN</th>
                <th>SEKTOR</th>
                <th>TANGGAL</th>
                <th>JAM MASUK</th>
                <th>JAM KELUAR</th>
                <th>CATATAN</th>
                <th>KETERANGAN</th>
                <th>AKSI</th>
            </tr>
        
            <?php $i = 1; ?>
            @forelse($data_presensi as $pegawai)
            <tr>
                <td><?= $i; ?></td>
                <td>{{$pegawai->nomor_pegawai}}</td>
                <td>{{$pegawai->nama_lengkap}}</td>
                <td>{{$pegawai->jabatan}}</td>
                <td>{{$pegawai->sektor_area}}</td>
                <td>{{date('d F Y', strtotime($pegawai->tanggal))}}</td>
                <td>
                    @if($pegawai->keterangan == null)
                    {{$pegawai->jam_masuk}}
                    @else 
                    - 
                    @endif
                </td> 
                {{-- View Tanggal diubah dari Y-m-d ke d-m-Y --}}
                <td>
                    @if($pegawai->keterangan == null)
                    {{$pegawai->jam_keluar}}
                    @else 
                    - 
                    @endif
                </td>
                <td>
                    @if($pegawai->keterangan == null)
                    {{$pegawai->catatan_masuk}}dan {{$pegawai->catatan_keluar}}
                    @else 
                    Tidak hadir
                    @endif 
                </td>
                <td>
                    @if(isset($pegawai->keterangan))
                    {{$pegawai->keterangan}}
                    @else 
                    - 
                    @endif
                </td>
                <td>
                    <div class="row">
                        <div class="col-4">
                            <form action="{{ route('presensi.destroy', $pegawai->id) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
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
        {{-- {{ $data_presensi->links() }} --}}
        {{-- {{ dd($data_presensi->links() )}} --}}

    </div>
</div>


@endsection