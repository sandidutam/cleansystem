<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayoutMasterController extends Controller
{
    public function index()
    {
        $data_user = User::all();
        return view ('layouts.index_master', compact('data_user'));
    }

}
