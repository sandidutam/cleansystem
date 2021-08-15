<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class apiController extends Controller
{
    public function login(Request $request)
    {
        return response()->json(
            "Ahay",
        );
    }

    public function dummy(Request $request)
    {
        $allUser = User::all();
        $user = User::where('email', 'sandiduta@gmail.com')->get();
        
        $response = 
            [
                'user' => $user
            ];
            
        
        
        // return response($user);

        return response()->json($response);

        // return response()->json([
        //     'name' => 'Abigail',
        //     'state' => 'CA',
        // ]);
    }

    public function present(Request $request)
    {
        
        $date = date("Y-m-d");

        $batas_awal_waktu_masuk = Carbon::createFromFormat('H:i:s', '05:40:00')->format('H'.'i'.'s');
        $batas_akhir_waktu_masuk = Carbon::createFromFormat('H:i:s', '07:00:00')->format('H'.'i'.'s');
        $batas_awal_waktu_keluar = Carbon::createFromFormat('H:i:s', '16:30:00')->format('H'.'i'.'s');
        $batas_akhir_waktu_keluar = Carbon::createFromFormat('H:i:s', '17:30:00')->format('H'.'i'.'s');
        
        $today = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d');
        $current_time = Carbon::now()->timezone('Asia/Jakarta')->format('H:i:s');
        $check_time = Carbon::createFromFormat('H:i:s', $current_time)->format('H'.'i'.'s');
        $yesterday = Carbon::yesterday()->timezone('Asia/Jakarta')->format('Y-m-d');
        $tomorrow = Carbon::tomorrow()->timezone('Asia/Jakarta')->format('Y-m-d');
        
        // $time > $batas_awal_waktu_keluar && $time < $batas_akhir_waktu_keluar

        $check_nopeg = Presensi::where('nomor_pegawai','=',$request->nomor_pegawai)->get();
        $check_date = Presensi::where('tanggal','=',$current_time)->count();
        $nama = $request->nama_lengkap;

        $presensi = new Presensi();
        
        // Awal Fungsi Absen Masuk

        $check_for_double = DB::table('presensi')
                                ->where('tanggal' ,'=', $today )
                                ->where('nomor_pegawai' ,'=', $request->nomor_pegawai)
                                ->count();

        if ($check_for_double > 0) {
            return response()->json('Pegawai '.$nama.' hanya bisa absen masuk sekali dalam sehari !');
        }
        
        if( $today ) 
        {
            
            if( $check_time > $batas_awal_waktu_masuk && $check_time < $batas_akhir_waktu_masuk ) 
            {
                $note = 'Datang Tepat Waktu ';

            } 
            elseif( $check_time > $batas_akhir_waktu_masuk) 
            {
                $note = 'Datang Telat ';
            } 
            else 
            {
                return response()->json('Belum bisa absen!');
            }

            
            $presensi->pegawai_id = $request->id;
            $presensi->nomor_pegawai = $request->nomor_pegawai;
            $presensi->nama_lengkap = $request->nama_lengkap;
            $presensi->jabatan = $request->jabatan;
            $presensi->sektor_area = $request->sektor_area;
            $presensi->tanggal = $today;
            $presensi->jam_masuk = $current_time;
            $presensi->catatan_masuk = $note;
            // dd($presensi);
            $simpan = $presensi->save();
           
            if( $simpan ) 
            {
                // return redirect('/presensi/riwayat')->with('notifikasi_sukses', $nama.' sudah datang !');
                return response()->json($nama.' sudah datang '.$note);
            }
        }
    
    }

    public function absent(Request $request)
    {
        $nama = $request->nama_lengkap;
        $today = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d');
        $check_for_double = DB::table('presensi')
        ->where('tanggal' ,'=', $today )
        ->where('nomor_pegawai' ,'=', $request->nomor_pegawai)
        ->count();

        if ($check_for_double > 0) {
        return response()->json('Pegawai '.$nama.' hanya bisa absen masuk sekali dalam sehari !');
        }

        
        $ket = $request->keterangan;

        $presensi->pegawai_id = $request->id;
        $presensi->nomor_pegawai = $request->nomor_pegawai;
        $presensi->nama_lengkap = $request->nama_lengkap;
        $presensi->jabatan = $request->jabatan;
        $presensi->sektor_area = $request->sektor_area;
        $presensi->tanggal = $today;
        $presensi->jam_masuk = "-";
        $presensi->catatan_masuk = "-";
        $presensi->jam_keluar = "-";
        $presensi->keterangan = $request->keterangan;

        // dd($presensi);

        $simpan = $presensi->save();

        if( $simpan )
        {
        // return redirect('/presensi/riwayat');

        return response()->json($nama." pada tanggal ".$today.$ket );
        }

    }

    public function update(Request $request, $id)
    {
        
        // $np = $request->nomor_pegawai;

        $presensi = Presensi::findOrFail($id);
        $pegawai_id = $request->pegawai_id;
        $nama = $request->nama_lengkap;
        // $nama = $request->nama_lengkap;
        
        $batas_awal_waktu_keluar = Carbon::createFromFormat('H:i:s', '16:30:00')->format('H'.'i'.'s');
        $batas_akhir_waktu_keluar = Carbon::createFromFormat('H:i:s', '17:30:00')->format('H'.'i'.'s');
       
        $today = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d');
        $current_time = Carbon::now()->timezone('Asia/Jakarta')->format('H:i:s');
        $check_time = Carbon::createFromFormat('H:i:s', $current_time)->format('H'.'i'.'s');

        // $time > $batas_awal_waktu_keluar && $time < $batas_akhir_waktu_keluar


        $check_for_double = DB::table('presensi')
                                ->where('pegawai_id' ,'=', $pegawai_id)
                                ->where('tanggal' ,'=', $today )
                                // ->where('nomor_pegawai' ,'=', $request->nomor_pegawai)
                                ->whereNotNull('jam_keluar')
                                ->count();
                                // ->get();

        // debug
        // if ($check_for_double == 0) {
        //     return $check_for_double;
            
        // }   else  {
        //     return "empty";
        // }

       

        if ($check_for_double > 0 ) {
            return response()->json('Pegawai '.$nama.' hanya bisa absen keluar sekali dalam sehari !');
        }

        if( $check_time < $batas_awal_waktu_keluar)
        {
            $note = 'Izin Pulang Lebih Awal';
        } elseif ( $check_time > $batas_awal_waktu_keluar && $check_time < $batas_akhir_waktu_keluar ) { 
            $note = 'Pulang Tepat Waktu';
        } else {
            $note = 'Pulang Telat';
        }
        // $presensi->$check_nopeg;
        // $presensi->where(['tanggal'=>$today, 'nomor_pegawai' => $nomor_pegawai]);
        
        $presensi->jam_keluar = $current_time;
        $presensi->catatan_keluar = $note;
        $simpan = $presensi->update();

        if( $simpan ) 
        {
            return response()->json($nama.' sudah pulang pada jam '.$current_time);
        }
        

    }

}
