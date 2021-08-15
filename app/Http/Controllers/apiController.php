<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function store(Request $request)
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
  
        $presensi = new Presensi();
        
        // Awal Fungsi Absen Masuk

        if(isset($request->btn_masuk)) 
        {
            
            $check_for_double = DB::table('presensi')
                                    ->where('tanggal' ,'=', $today )
                                    ->where('nomor_pegawai' ,'=', $request->nomor_pegawai)
                                    ->count();

            if ($check_for_double > 0) {

                return response()->json('Pegawai hanya bisa absen masuk sekali dalam sehari !');
                // return redirect()->route('presensi.history')->with('notifikasi_gagal','Pegawai hanya bisa absen masuk sekali dalam sehari !');
            }

            
            if( $today ) 
            {
                
                if( $check_time > $batas_awal_waktu_masuk && $check_time < $batas_akhir_waktu_masuk ) 
                {
                    $note = 'Datang Tepat Waktu ';
                    // return "aku tepat waktu";
                } elseif( $check_time > $batas_akhir_waktu_masuk) 
                {
                    $note = 'Datang Telat ';
                    // return $current_time;
                    // return $check_time;
                    // return "telat";
                } else 
                {
                    // return $check_time;
                    // return $id;
                    // return $batas_akhir_waktu_masuk;
                    // return $batas_awal_waktu_masuk;
                    // return "Angling Dharma";
                    // return view ('presensi.history')->with('notifikasi_sukses','Belum bisa absen!');
                    // return redirect('/presensi/riwayat')->with('notifikasi_gagal','Belum bisa absen');
                    return response()->json('Belum bisa absen!');
                }
                $nama = $request->nama_lengkap;
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
                    return response()->json($nama.' sudah datang !');
                }
            } else {
                // return redirect('/presensi/riwayat')->with('notifikasi_gagal','Pegawai hanya bisa absen masuk sekali dalam sehari !');
                return response()->json('Pegawai hanya bisa absen masuk sekali dalam sehari !');
            }  
        }   


        elseif(isset($request->btn_absen))
        {   
            // return "Izin";
            $check_for_double = DB::table('presensi')
                                    ->where('tanggal' ,'=', $today )
                                    ->where('nomor_pegawai' ,'=', $request->nomor_pegawai)
                                    ->count();

            if ($check_for_double > 0) {
                return redirect()->route('presensi.history')->with('notifikasi_gagal','Pegawai hanya bisa absen masuk sekali dalam sehari !');
            }

            $nama = $request->nama_lengkap;
            $ket = $request->keterangan;

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
                
                return redirect()->route('presensi.history')->with('notifikasi_tidak_masuk', $nama." hari ini ".$ket );
            }

        } else {
            return "Gagal";
        }
    
    }

}
