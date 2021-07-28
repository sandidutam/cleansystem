<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PresensiController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexIn(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
                    'search' => 'min:6|max:14',
        ]);

        if($validator->fails()) {
            return redirect()->route('presensi.indexin')
                                ->withErrors($validator)
                                ->withInput();
        }


        if($request->has('search'))
        {
            $data_pegawai = Pegawai::where('nomor_pegawai', 'LIKE', '%'.$request->search.'%')->get();
            // $data_presensi = Presensi::where('nomor_pegawai', 'LIKE', '%'.$request->search.'%')->orderBy('id','DESC')->take(1)->get();
          
            $today = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d');
            // $status = DB::table('presensi')
            //                 ->where('tanggal' ,'=', $today )
            //                 ->count();
            // $data_pegawai = Pegawai::all();
        } else 
        {
            $today = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d');
            $data_pegawai = Pegawai::all();
            // $data_pegawai = DB::table('presensi')
            //                         ->where('tanggal' ,'=', $today )
            //                         ->where('jam_masuk' , '=', null)
            //                         ->get();

            // $data_pegawai = DB::table('pegawai')
            // ->join('presensi','nomor_pegawai','=','nomor_pegawai')
            // ->where(['tanggal' => $today , 'jam_masuk' => null ])
            // ->get();
        }
        
        // dd($data_presensi);
        // dd($status);
        // $data_pegawai = Pegawai::all();
        return view('presensi.indexIn',compact('data_pegawai'));
    }

    public function indexOut(Request $request)
    {
        if($request->has('search'))
        {
            $data_presensi = Presensi::where('nomor_pegawai', 'LIKE', '%'.$request->search.'%')->orderBy('id','DESC')->take(1)->get();
          
        } else 
        {
            $today = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d');
            $data_presensi = DB::table('presensi')
                                    ->where('tanggal' ,'=', $today )
                                    ->where('jam_keluar' , '=', null)
                                    ->get();
        }
        
        // return $data_presensi;
        // $data_presensi = Presensi::all();
        return view('presensi.indexOut',compact('data_presensi'));
    }


    public function history()
    {
        $data_presensi = Presensi::orderBy('id','DESC')->paginate(10);
        // $data_presensi = DB::table('presensi')->paginate(1);
        // $data_presensi = Presensi::all()->paginate(1);
        return view('presensi.history', compact('data_presensi'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data_pegawai = Pegawai::find($id);
        // return view('presensi.tambah',compact('data_pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // return $request->all();

        // $validator = Validator::make($request->all(), [
        //             'nomor_pegawai' => 'required|min:10|max:10',
        //             'nama_lengkap' => 'required|min:2|max:25',
        //             'tanggal' => 'required',
        //             'jabatan' => 'required',
        //             'sektor_area' => 'required',
        //             'keterangan' => 'required'
        // ]);

        // if($validator->fails()) {
        //     return redirect()->route('presensi.edit')
        //                         ->withErrors($validator)
        //                         ->withInput();
        // }


        // $check_id = Pegawai::findOrFail($id);
        // $check_nopeg = Presensi::where('nomor_pegawai', 'LIKE','&'.$request->nomor_pegawai.'&')->get();
    
        // $data_presensi = Presensi::all();

        $date = date("Y-m-d");
        // $time = time("H:i:s");
        
        
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
                return redirect()->route('presensi.history')->with('notifikasi_gagal','Pegawai hanya bisa absen masuk sekali dalam sehari !');
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
                    return redirect('/presensi/riwayat')->with('notifikasi_gagal','Belum bisa absen');
                    // return view ('presensi.history')->with('notifikasi_sukses','Belum bisa absen!');
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
                    return redirect('/presensi/riwayat')->with('notifikasi_sukses', $nama.' sudah datang !');
                }
            } else {
                return redirect('/presensi/riwayat')->with('notifikasi_gagal','Pegawai hanya bisa absen masuk sekali dalam sehari !');
            }  
        }   
        
        // elseif(isset($request->btn_keluar))
        // {
        //     $check_pres = Presensi::select('nomor_pegawai','=',$request->nomor_pegawai,)->with('tanggal','=',$today);
        //     // return "absen keluar";
        //     if( $check_pres ) {
        //         if( $check_time < $batas_awal_waktu_keluar)
        //         {
        //             // $note = 'Izin Pulang Lebih Awal';
                    
        //         } elseif ( $check_time > $batas_awal_waktu_keluar && $check_time < $batas_akhir_waktu_keluar ) { 
        //             $note = 'Pulang Tepat Waktu';
        //         } else {
        //             $note = 'Pulang Telat';
        //         }

        //         // $presensi->$check_nopeg;
        //         // $presensi->where(['tanggal'=>$today, 'nomor_pegawai' => $nomor_pegawai]);
        //         $presensi->jam_keluar = $current_time;
        //         $simpan = $presensi->update();

        //         return 'Data Masuk!';

        //         if( $simpan ) 
        //         {
        //             return redirect('/presensi/riwayat')->with('notifikasi_sukses','Pegawai sudah pulang!');
        //         }
        //     }
        // }   


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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view ('presensi.checkin',compact('data_pegawai'));
    }

    public function checkIn($id)
    {
        $today = Carbon::now()->timezone('Asia/Jakarta')->format('D, d-m-Y');
        $data_pegawai = Pegawai::find($id);
        return view ('presensi.checkin',compact('data_pegawai','today'));
    }
    public function checkOut($id)
    {
        $today = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d');
        $data_presensi = Presensi::find($id);
        return view ('presensi.checkout',compact('data_presensi','today'));
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
        
        $presensi = Presensi::findOrFail($id);
        
        
        $batas_awal_waktu_keluar = Carbon::createFromFormat('H:i:s', '16:30:00')->format('H'.'i'.'s');
        $batas_akhir_waktu_keluar = Carbon::createFromFormat('H:i:s', '17:30:00')->format('H'.'i'.'s');
       
        $today = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d');
        $current_time = Carbon::now()->timezone('Asia/Jakarta')->format('H:i:s');
        $check_time = Carbon::createFromFormat('H:i:s', $current_time)->format('H'.'i'.'s');

        // $time > $batas_awal_waktu_keluar && $time < $batas_akhir_waktu_keluar

        if(isset($request->btn_keluar))
        {
            $check_for_double = DB::table('presensi')
                                    ->where('tanggal' ,'=', $today )
                                    ->where('nomor_pegawai' ,'=', $request->nomor_pegawai)
                                    ->whereNotNull('jam_keluar')
                                    ->count();
        
            // return $check_for_double;

            if ($check_for_double > 0 ) {
                return redirect()->route('presensi.history')->with('notifikasi_gagal','Pegawai hanya bisa absen keluar sekali dalam sehari !');
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
                $nama = $request->nama_lengkap;

                $presensi->jam_keluar = $current_time;
                $presensi->catatan_keluar = $note;
                $simpan = $presensi->update();

                if( $simpan ) 
                {
                    return redirect('/presensi/riwayat')->with('notifikasi_sukses', $nama.' sudah pulang !');
                }
        }
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_presensi = Presensi::findOrFail($id);
        $data_presensi->delete();
        return redirect()->route('presensi.history')->with('notifikasi_sukses','Data sudah dihapus !');
    }

    
}
