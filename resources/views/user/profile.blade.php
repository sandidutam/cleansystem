@extends('layouts.index_master')

@section('title')
    Profil {{$data_user->nama_lengkap}}
@endsection

    @section('profile.active')
    active
    @endsection 

    @section('userprofile.active')
    active
    @endsection

    @section('profile.show')
    show
    @endsection


@section('content')

    {{-- <script src="{{asset('Jam/Jam.js')}}"></script>
    <style>
        #watch {
            color: rgb(252, 150, 65);
            position: absolute;
            z-index: 1;
            height: 40px;
            width: 200px;
            overflow: show;
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            font-size: 10vw;
            -webkit-text-stroke: 3px rgb(210, 65, 36);
            text-shadow:    4px 4px 10px rgba(210, 65, 36, 0.4),
                            4px 4px 20px rgba(210, 45, 26, 0.4),
                            4px 4px 30px rgba(210, 25, 16, 0.4),
                            4px 4px 40px rgba(210, 15, 06, 0.4);
        }

    </style> --}}
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Space%20Mono">
        <style>
        .clock-box{
            font-family: 'Space Mono';
            font-size: 40px;
            color: chartreuse;
            width: auto;
            min-width: 0;
            word-wrap: break-word;
            background-color: black!important;
            background-clip: border-box;
            border-radius: 0.75rem;
            padding: 0.25rem;
        }
        </style>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="/user" class="btn btn-primary ">
            <span class="icon">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">List User</span>
        </a>
    
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Profil Pegawai</h6>
                </div>
           
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 text-center card-split">
                            <img class="img-profil-pegawai img-thumbnail" style="margin-top: 50px; margin-bottom: 25px" src="{{$data_user->getFotoUser()}}" alt="">
                            <h3 class="mt-2 mb-2"><strong>{{$data_user->nama_lengkap}}</strong></h3>
                            <p class="mt-2" >{{$data_user->jabatan}} dengan role {{$data_user->role}}</p>

                        </div>
                        <div class="col">
                            <div class="table-responsive">  
                                <table class="table table-borderless table-sm" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <td>Nomor Pegawai</td><td>{{$data_user->nomor_pegawai}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Lengkap</td><td>{{$data_user->nama_lengkap}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td><td>{{date('d F Y', strtotime($data_user->tanggal_lahir))}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan</td><td>{{$data_user->jabatan}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Role</td><td>{{$data_user->role}}</a></td>
                                    </tr>
                                </table>  
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        
    </div>

    
@endsection