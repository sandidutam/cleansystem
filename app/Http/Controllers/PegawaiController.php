<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pegawai = Pegawai::paginate(100);
        // $data_pegawai = Pegawai::all();
        return view('pegawai.index',compact('data_pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $validator = Validator::make($request->all(), [
                        'nama_depan' => 'required|min:2|max:25',
                        'nama_belakang' => 'required|min:2|max:25',
                        'tempat_lahir' => 'required',
                        'tanggal_lahir' => 'required',
                        'jenis_kelamin' => 'required',
                        'agama' => 'required',
                        'alamat' => 'required',
                        'kelurahan' => 'required',
                        'kecamatan' => 'required',
                        'kota_kabupaten' => 'required',
                        'provinsi' => 'required',
                        'penempatan' => 'required',
                        'sektor_area' => 'required',
                        'jabatan' => 'required',
                        'pendidikan' => 'required',
                        'tanggal_diterima' => 'required',
                        'foto_pegawai' => 'required'
            ]);
    
            if($validator->fails()) {
                return redirect()->route('pegawai.create')
                                    ->withErrors($validator)
                                    ->withInput();
            }
    
            // dd($request->all());
    
            // Proses otomatisasi nomor pegawai
            $id = Pegawai::getId();
            $index = Pegawai::all();
            
            if($index->isEmpty()) {
                
                $idbaru = 0;
                $tgl_sertijab = Carbon::createFromFormat('Y-m-d', $request->tanggal_diterima)->format('Y'.'m');
            
                $no_pegawai= 'PGW-'.$tgl_sertijab.str_pad($idbaru+1, 4, '0', STR_PAD_LEFT);
            } else {
                foreach ($id as $value);
                $idlama = $value->id;
                $idbaru = $idlama + 1;
                $tgl_sertijab = Carbon::createFromFormat('Y-m-d', $request->tanggal_diterima)->format('Y'.'m');
                
                $no_pegawai= 'PGW-'.$tgl_sertijab.str_pad($idbaru, 4, '0', STR_PAD_LEFT);    
            }
    
            $nama_depan = $request->nama_depan;
            $nama_belakang = $request->nama_belakang;
            $nama_lengkap = $nama_depan." ".$nama_belakang;

            $protoqr = QrCode::generate('http://192.168.100.109:8000/api/presensi/'.$idbaru.'/get');
            

            // return $protoqr;

            // Hasil Input dimasukkan ke database
            $data = new Pegawai();
            $data->nomor_pegawai = $no_pegawai;
            $data->nama_depan = $nama_depan;
            $data->nama_belakang = $nama_belakang;
            $data->nama_lengkap = $nama_lengkap;
            $data->tempat_lahir = $request->tempat_lahir;
            $data->tanggal_lahir = $request->tanggal_lahir;
            $data->jenis_kelamin = $request->jenis_kelamin; 
            $data->agama = $request->agama;
            $data->alamat = $request->alamat;
            $data->provinsi = $request->provinsi;
            $data->kota_kabupaten = $request->kota_kabupaten;
            $data->kecamatan = $request->kecamatan;
            $data->kelurahan = $request->kelurahan; 
            $data->pendidikan = $request->pendidikan;
            $data->jabatan = $request->jabatan;
            $data->penempatan = $request->penempatan;
            $data->sektor_area = $request->sektor_area;
            $data->tanggal_diterima = $request->tanggal_diterima ;
            // $data->qr_code = $protoqr;
            // $data->foto_pegawai = $request->foto_pegawai;
   
            // return $postqr;
            // return $protoqr;

            if($request->hasFile('foto_pegawai')) {
                $request->file('foto_pegawai')->move('images/',$request->file('foto_pegawai')->getClientOriginalName());
                $data->foto_pegawai = $request->file('foto_pegawai')->getClientOriginalName();
                $simpan = $data->save();
    
            }
    
            // $request->file('foto_pegawai')->move('images/',$request->file('foto_pegawai'));
            // $data->foto_pegawai = $request->file('foto_pegawai');
    
            if($simpan) 
            {
                return redirect('/pegawai');
                // return redirect()->route('pegawai.index');
            }
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        // $tanggal = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $today = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d');
        // $jam = Carbon::now()->isoFormat('H:i:s:u');
        $current_time = Carbon::now()->timezone('Asia/Jakarta')->format('H:i:s');
        // return $current_time;

        $data_pegawai = Pegawai::find($id);

        // dd($data_pegawai);
        // return $data_pegawai;

        $name = $data_pegawai->nama_lengkap;
        $nopeg = $data_pegawai->nomor_pegawai;

        // return $nopeg;
        // return $name;

        $data_presensi = DB::table('presensi')
                                    ->where('nomor_pegawai', '=', $nopeg)
                                    ->where('nama_lengkap' , '=', $name)
                                    ->where('tanggal' ,'=', $today )
                                    ->get();

        // dd($data_presensi);
        // return $data_presensi;

        // $data_pegawai = Pegawai::where('id',$id)->get();
        return view('pegawai.profile', compact('data_pegawai','today','data_presensi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_pegawai = Pegawai::find($id);
        return view ('pegawai.edit',compact('data_pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_pegawai = Pegawai::findOrFail($id);
        // $data_pegawai->update($request->all());

        $nama_depan = $request->nama_depan;
        $nama_belakang = $request->nama_belakang;
        $nama_lengkap = $nama_depan." ".$nama_belakang;
    
         // Hasil Input dimasukkan ke database
         
         $data_pegawai->nama_depan = $nama_depan;
         $data_pegawai->nama_belakang = $nama_belakang;
         $data_pegawai->nama_lengkap = $nama_lengkap;
         $data_pegawai->tempat_lahir = $request->tempat_lahir;
         $data_pegawai->tanggal_lahir = $request->tanggal_lahir;
         $data_pegawai->jenis_kelamin = $request->jenis_kelamin; 
         $data_pegawai->agama = $request->agama;
         $data_pegawai->alamat = $request->alamat;
         $data_pegawai->provinsi = $request->provinsi;
         $data_pegawai->kota_kabupaten = $request->kota_kabupaten;
         $data_pegawai->kecamatan = $request->kecamatan;
         $data_pegawai->kelurahan = $request->kelurahan; 
         $data_pegawai->pendidikan = $request->pendidikan;
         $data_pegawai->jabatan = $request->jabatan;
         $data_pegawai->penempatan = $request->penempatan;
         $data_pegawai->sektor_area = $request->sektor_area;
         $data_pegawai->update();

        if($request->hasFile('foto_pegawai')) {
            $request->file('foto_pegawai')->move('images/',$request->file('foto_pegawai')->getClientOriginalName());
            $data_pegawai->foto_pegawai = $request->file('foto_pegawai')->getClientOriginalName();
         
            $data_pegawai->update();
        }
        return redirect()->route('pegawai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_pegawai = Pegawai::findOrFail($id);
        $data_pegawai->delete();
        return redirect()->route('pegawai.index');
    }
}
