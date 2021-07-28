@extends('layouts.index_master')

@section('title')
    Data User
@endsection

@section('user.active')
active
@endsection 

@section('userindex.active')
active
@endsection

@section('user.show')
show
@endsection

@yield('user.id')

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
        <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">  
                <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <tr >
                        <th>NO</th>
                        <th>NOMOR PEGAWAI</th>
                        <th>NAMA LENGKAP</th>
                        <th>JABATAN</th>
                        <th>ROLE</th>
                        <th>AKSI</th>
                    </tr>
                
                    <?php $i = 1; ?>
                    @forelse($data_user as $user)
                    <tr >
                        <td><?= $i; ?></td>
                        <td>{{$user->nomor_pegawai}}</td>
                        <td><a href="{{ route('user.show', $user->id) }}">{{$user->nama_lengkap}}</a></td>
                        <td>{{$user->jabatan}}</td>
                        <td>{{$user->role}}</td>
                        <td>
                            <div class="row">
                                <div class="col-4">
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-md btn-warning d-flex align-items-center" type="button"><i class="fas fa-edit mr-1"></i> Edit</a>
                                </div>
                                <div class="col-4">                               
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
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
{{ $data_user->links() }}

@endsection