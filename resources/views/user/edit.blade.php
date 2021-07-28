@extends('layouts.index_master')

@section('title')
        Edit Data {{$data_user->nama_lengkap}}
    @endsection

    @section('profile.active')
    active
    @endsection 

    @section('edituser.active')
    active
    @endsection

    @section('profile.show')
    show
    @endsection

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="/user" class="btn btn-primary ">
            <span class="icon">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">List User</span>
        </a>
    </div>

    <div class="row ml-1" >
        <div class="col-4 mr-2">
            <div class="card shadow mb-4" >
                <div class="card-header">
                    <div class="row ">
                        <h5 class="card-title" >Form Edit Data {{$data_user->nama_lengkap}}</h5>
                        {{-- <button type="button" class="btn btn-sm btn-circle" aria-label="Close">X</button> --}}
                    </div>
                </div>
        
                {{-- Awal Form --}}
                <div class="card-body">
        
                
                    {!! Form::model($data_user ,['route'=>['user.update', $data_user->id], 'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                    
                    {{-- <div class="row">
                        <div class="col text-center">
                            <a class="btn btn-outline-primary collapsed show" href="#" data-toggle="collapse" data-target="#collapseBiodata"
                                aria-expanded="true" aria-controls="collapseUtilities" >
                                <span>Personal Info</span>
                                <i class="fas fa-arrow-down"></i>
                            </a>
                        </div>
                        <div class="col text-center">
                            <a class="btn btn-outline-primary collapsed" href="#" data-toggle="collapse" data-target="#collapseAccount"
                            aria-expanded="true" aria-controls="collapseUtilities">
                            <span>Account Info</span>
                            <i class="fas fa-arrow-down"></i>
                        </a>
                        </div>
                    </div>
                     --}}
                     
                
                    <div class="row mb-2" > 
                        <div class="form-group">
                            <label for="nomor_pegawai" class="form-label"> Nomor Pegawai : </label> 
                            {!! Form::text('nomor_pegawai', null, ['class'=>'form-control','id'=>'nomor_pegawai']) !!}
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <div class="form-group">
                            <label for="nama_depan" class="form-label"> Nama Depan : </label> 
                            {!! Form::text('nama_depan', null, ['class'=>'form-control','id'=>'nama_depan']) !!}
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="form-group">
                            <label for="nama_belakang" class="form-label"> Nama Belakang : </label> 
                            {!! Form::text('nama_belakang', null, ['class'=>'form-control','id'=>'nama_belakang']) !!}
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <div class="form-group "> 
                            <label for="tanggal_lahir" class="form-label"> Tanggal Lahir : </label> 
                            {!! Form::text('tanggal_lahir', null, ['class'=>'datepicker form-control','id'=>'tanggal_lahir']) !!}
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="form-group">
                            <label for="jenis_kelamin" class="mb-2"> Jenis Kelamin : </label>
                            {{-- {!! Form::select('jenis_kelamin', $data_pegawai->jenis_kelamin, 'Pilih', ['class'=>'form-control', 'id'=>'jenis_kelamin']) !!} --}}
                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" >
                            <option>Pilih</option>
                            <option {{old('jenis_kelamin', $data_user->jenis_kelamin)=="L"? 'selected':''}} value="L">Laki-Laki</option>
                            <option {{old('jenis_kelamin', $data_user->jenis_kelamin)=="P"? 'selected':''}} value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <div class="form-group">
                                <label for="role" > Role : </label>
                                <select name="role" class="form-control" id="role" >
                                <option>Pilih</option>
                                <option {{old('role', $data_user->role)=="SuperAdmin"? 'selected':''}} value="SuperAdmin">SuperAdmin</option>
                                <option {{old('role', $data_user->role)=="Admin"? 'selected':''}} value="Admin">Admin</option>
                                <option {{old('role', $data_user->role)=="Staff"? 'selected':''}} value="Staff">Staff</option>
                                <option {{old('role', $data_user->role)=="Mandor"? 'selected':''}} value="Mandor">Mandor</option>
                                </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="form-group">
                                <label for="jabatan" > Jabatan : </label>
                                <select name="jabatan" class="form-control" id="jabatan" >
                                <option>Pilih</option>
                                <option {{old('jabatan', $data_user->jabatan)=="Manajer"? 'selected':''}} value="Manajer">Manajer</option>
                                <option {{old('jabatan', $data_user->jabatan)=="Staff"? 'selected':''}} value="Staff">Staff</option>
                                <option {{old('jabatan', $data_user->jabatan)=="Mandor"? 'selected':''}} value="Mandor">Mandor</option>
                                <option {{old('jabatan', $data_user->jabatan)=="Cleaning Service"? 'selected':''}} value="Cleaning Service">Cleaning Service</option>
                                </select>
                        </div>
                    </div>

                    <hr>

            
                    <div class="row mb-2">
                        <div class="form-group">
                            <label for="email" class="form-label"> Email : </label> 
                            {!! Form::email('email', null, ['class'=>'form-control','id'=>'email']) !!}
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="form-group">
                            <label for="password" class="form-label"> Password : </label> 
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group {{$errors->has('foto_user') ? 'has-error' : ''}} "> 
                        <div class="mb-3">
                            <label for="foto_user" class="form-label">Unggah foto user :</label>
                            <input class="form-control" type="file" name="foto_user" id="foto_user" value="{{old('foto_user')}}">
                                @if($errors->has('foto_user'))
                                    <span class="help-block text-danger">{{$errors->first('foto_user')}}</span>
                                @endif
                        </div>
                    </div>                   
          
                      
                </div>

                

                <div class="d-flex justify-content-center mb-3 ml-3">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelModal">Batal</button>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
                <!-- Button trigger modal -->
      
           
            </div>       
                {!! Form::close() !!}
                {{-- Akhir Form --}}
        </div>

        <div class="col">
            <div class="card card-sticky shadow mb-4" >
                <div class="card-header ">
                    <h5 class="card-title">Tabel Data Pegawai</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <form action="{{route('user.edit', $data_user->id )}} " method="GET">
                                <div class="row">
                                    <label for="search" class="text-danger fst-italic fw-bold" style="">*Masukkan Nama Pegawai</label>
                                </div>
                                <div class="row {{$errors->has('search') ? 'has-error' : ''}} ">
                                    <div class="col-6">
                                        <input type="text" name="search" id="search" class="form-control" placeholder="contoh : Aldo" aria-describedby="helpIdautocomplete="off">
                                    </div>
                                    <div class="col-3 ml-2">
                                        <button type="submit" class="btn btn-outline-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
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
                    <table class="table table-tiny table-striped table-borderless table-hover" id="table">

                        <tr class="text-center">
                            <th>NO</th>
                            <th>NOMOR PEGAWAI</th>
                            <th>NAMA DEPAN</th>
                            <th>NAMA BELAKANG</th>
                            <th>TANGGAL LAHIR</th>
                            <th>JENIS KELAMIN</th>
                            <th>JABATAN</th>
                            <th>AKSI</th>
                        </tr>
                      
                        <?php $i = 1; ?>
                        @forelse($data_pegawai as $pegawai )
                        
                        <tr class="text-center">
                            <td><?= $i; ?></td>
                            <td>{{$pegawai->nomor_pegawai}}</td>
                            <td>{{$pegawai->nama_depan}}</td>
                            <td>{{$pegawai->nama_belakang}}</td>
                            <td>{{$pegawai->tanggal_lahir}}</td>
                            <td>{{$pegawai->jenis_kelamin}}</td>
                            <td>{{$pegawai->jabatan}}</td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <button class="btn-c btn-sm btn-outline-primary" onmouseout="outFunc()">
                                        <span class="tooltiptext" id="myTooltip{{$i}}">Copy to clipboard</span>
                                        Copy
                                        </button>
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

    </div>


    <!-- Modal Cancel Edit -->
    <div class="modal fade" id="cancelModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Perhatian !</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Anda ingin membatalkan?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
            <a role="button" href="{{route('user.index')}}" class="btn btn-primary">Ya</a>
            </div>
        </div>
        </div>
    </div>



    <script type="text/javascript">
        $('.datepicker').datepicker({  
           format: 'yyyy-mm-dd'
         });  

        function myFunction() {
        /* Get the text field */
        var copyText = document.getElementById("myInput");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */
        alert("Copied the text: " + copyText.value);
        }

        var table = document.getElementById("table"),rIndex;

        for(var i = 0; i < table.rows.length; i++)
        {
            table.rows[i].onclick = function()
            {
                rIndex = this.rowIndex;
                document.getElementById("nomor_pegawai").value = this.cells[1].innerHTML;
                document.getElementById("nama_depan").value = this.cells[2].innerHTML;
                document.getElementById("nama_belakang").value = this.cells[3].innerHTML;
                document.getElementById("tanggal_lahir").value = this.cells[4].innerHTML;
                document.getElementById("jenis_kelamin").value = this.cells[5].innerHTML;
                document.getElementById("jabatan").value = this.cells[6].innerHTML;

                var name =  document.getElementById("nama_depan");
                // alert("Copied " + name.value + " data");
                for(var a = 1; a < table.rows.length; a++)
                {
                    var tooltip = document.getElementById("myTooltip"+a);
                    tooltip.innerHTML = "Copied " + name.value + " data";
                    
                }
                
            }
        }
        
        function outFunc() {
            for(var a = 1; a < table.rows.length; a++)
            {
                var tooltip = document.getElementById("myTooltip"+a);
                tooltip.innerHTML = "Copy to clipboard";
            }
        }

        // var x ="", i;
        // for (i=1; i < table.rows.length ; i++) {
        // x = x +  "<span class='tooltiptext' id='myTooltip"+i+"'"+">Copy to clipboard</span> Copy text";
        // }
        // document.getElementById("loopbtn").innerHTML = x;


    </script> 
   
@endsection
