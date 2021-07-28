<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_user = User::paginate(100);
        return view ('user.index', compact('data_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search' => 'min:4|max:30',
        ]);

        if($validator->fails()) {
            return redirect()->route('user.create')
                                ->withErrors($validator)
                                ->withInput();
        }

        if($request->has('search'))
        {
            $data_pegawai = Pegawai::where('nama_depan', 'LIKE', '%'.$request->search.'%')->get();
        } else 
        {
            $data_pegawai = Pegawai::all();
        }

        return view('user.create',compact('data_pegawai'));      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_depan' => 'required|min:2|max:25',
            'nama_belakang' => 'required|min:2|max:25',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan' => 'required',
            'foto_user' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->route('user.create')
                                ->withErrors($validator)
                                ->withInput();
        }

        $nama_depan = $request->nama_depan;
        $nama_belakang = $request->nama_belakang;
        $nama_lengkap = $nama_depan." ".$nama_belakang;
        $pw = $request->password;
        // $password = strval($pw);

        $data_user = new User();
        // Hasil Input dimasukkan ke database
        $data_user->email = $request->email;
        // $data_user->password = $request->password;
        // $data_user->password = $password;
        $data_user->password = bcrypt($pw);
        // $data_user->password = $pw;
        $data_user->nomor_pegawai = $request->nomor_pegawai;
        $data_user->nama_depan = $nama_depan;
        $data_user->nama_belakang = $nama_belakang;
        $data_user->nama_lengkap = $nama_lengkap;
        $data_user->tanggal_lahir = $request->tanggal_lahir;
        $data_user->jenis_kelamin = $request->jenis_kelamin; 
        $data_user->role = $request->role;
        $data_user->jabatan = $request->jabatan;
        $data_user->remember_token = str_random(60);
        $data_user->update();

        if($request->hasFile('foto_user')) {
            $request->file('foto_user')->move('images/',$request->file('foto_user')->getClientOriginalName());
            $data_user->foto_user = $request->file('foto_user')->getClientOriginalName();
         
            $data_user->save();
        }

        // dd($data_user);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_user = User::find($id);
        return view ('user.profile', compact('data_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data_user = User::find($id);
        // $data_pegawai = Pegawai::paginate(1);

        $validator = Validator::make($request->all(), [
            'search' => 'min:4|max:30',
        ]);

        if($validator->fails()) {
            return redirect()->route('user.edit',$data_user->id)
                                ->withErrors($validator)
                                ->withInput();
        }

        // menangkap data pencarian
        $search = $request->search;
    
        // mengambil data dari table pegawai sesuai pencarian data
        // $data_pegawai = DB::table('pegawai')
        // ->where('nama_depan','like',"%".$search."%")
        // ->get();

        if($request->has('search'))
        {
            $data_pegawai = Pegawai::where('nama_depan', 'LIKE', '%'.$request->search.'%')->get();
        } else 
        {
            $data_pegawai = Pegawai::all();
        }

        return view ('user.edit', compact('data_user','data_pegawai'));
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
        $data_user = User::findOrFail($id);
        // $data_pegawai->update($request->all());

        $nama_depan = $request->nama_depan;
        $nama_belakang = $request->nama_belakang;
        $nama_lengkap = $nama_depan." ".$nama_belakang;
        $pw = $request->password;
        // $password = strval($pw);

        // Hasil Input dimasukkan ke database
        $data_user->email = $request->email;
        // $data_user->password = $request->password;
        // $data_user->password = $password;
        $data_user->password = bcrypt($pw);
        // $data_user->password = $pw;
        $data_user->nomor_pegawai = $request->nomor_pegawai;
        $data_user->nama_depan = $nama_depan;
        $data_user->nama_belakang = $nama_belakang;
        $data_user->nama_lengkap = $nama_lengkap;
        $data_user->tanggal_lahir = $request->tanggal_lahir;
        $data_user->jenis_kelamin = $request->jenis_kelamin; 
        $data_user->role = $request->role;
        $data_user->jabatan = $request->jabatan;
        $data_user->remember_token = str_random(60);
        $data_user->update();

        if($request->hasFile('foto_user')) {
            $request->file('foto_user')->move('images/',$request->file('foto_user')->getClientOriginalName());
            $data_user->foto_user = $request->file('foto_user')->getClientOriginalName();
         
            $data_user->update();
        }

        // dd($data_user);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
