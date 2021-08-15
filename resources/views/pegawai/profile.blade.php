@extends('layouts.index_master')

@section('title')
    Profil {{$data_pegawai->nama_lengkap}}
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
        <a href="/pegawai" class="btn btn-primary ">
            <span class="icon">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Data Pegawai</span>
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
                            <img class="img-profil-pegawai img-thumbnail" style="margin-top: 50px; margin-bottom: 25px" src="{{$data_pegawai->getFotoPegawai()}}" alt="">
                            <h3 class="mt-2 mb-2"><strong>{{$data_pegawai->nama_lengkap}}</strong></h3>
                            <p class="mt-2" >{{$data_pegawai->jabatan}} di Sektor {{$data_pegawai->sektor_area}}</p>
                            <p class="mt-2" >{!! QrCode::size(200)->generate('http://192.168.100.109:8000/api/presensi/'.$data_pegawai->id.'/get'); !!} </p>

                        </div>
                        <div class="col">
                            <div class="table-responsive">  
                                <table class="table table-borderless table-sm" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <td>Nomor Pegawai</td><td>{{$data_pegawai->nomor_pegawai}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Lengkap</td><td>{{$data_pegawai->nama_lengkap}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td><td>{{date('d F Y', strtotime($data_pegawai->tanggal_lahir))}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td><td>{{$data_pegawai->agama}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Pendidikan</td><td>{{$data_pegawai->pendidikan}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td><td>{{$data_pegawai->alamat}}, <br> {{$data_pegawai->kelurahan}}, {{$data_pegawai->kecamatan}}, <br> {{$data_pegawai->kota_kabupaten}}, {{$data_pegawai->provinsi}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan</td><td>{{$data_pegawai->jabatan}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Penempatan</td><td>{{$data_pegawai->penempatan}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Sektor</td><td>{{$data_pegawai->sektor_area}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal diterima</td><td>{{date('d F Y', strtotime($data_pegawai->tanggal_diterima))}}</a></td>
                                    </tr>
                                </table>  
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col"> 
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Presensi Pegawai</h6>
                </div>
                <div class="card-body" >
                    {{-- <div class="row fs-6 text-uppercase d-flex justify-content-center ">
                        Tanggal :
                    </div>
                    <div class="row fs-2 text-uppercase text-center  mb-4">
                        <strong>{{$today}}</strong>
                    </div> --}}
                    {{-- <div class="row fs-6 text-uppercase d-flex justify-content-center ">
                        Jam :
                    </div> --}}
                    <div class="row clock-box watch text-uppercase text-center mb-4 mx-auto">
                        <div class="row mb-2 mt-2">
                            <div class="row fs-6 text-uppercase d-flex justify-content-center ">
                                Tanggal : 
                            </div>
                            <div class="row fs-1 text-uppercase d-flex justify-content-center">
                                {{date('D, d-M-Y', strtotime($today))}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="row fs-6 text-uppercase d-flex justify-content-center ">
                                Jam :
                            </div>
                            <label id="clock" >
                            </label>
                            {{-- <label id="clock" style="   font-size: 100px; color: #0A77DE; -webkit-text-stroke: 3px #00ACFE;
                                                        text-shadow:    4px 4px 10px #36D6FE,
                                                                        4px 4px 20px #36D6FE,
                                                                        4px 4px 30px #36D6FE,
                                                                        4px 4px 40px #36D6FE; ">
                            </label> --}}

                        </div>
                    </div>
                   
                    <div class="row border-bottom" style="margin-bottom: 20px">
                        
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <a href="{{ route('presensi.checkin', $data_pegawai->id) }}" class="btn btn-lg btn-success" type="button">Presensi Masuk</a>
                        </div>
                        @foreach ($data_presensi as $pegawai)   
                        <div class="col d-flex justify-content-center">
                            <a href="{{ route('presensi.checkout', $pegawai->id) }}" class="btn btn-lg btn-warning" type="button">Presensi Keluar</a>  
                        </div>
                        @endforeach
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection