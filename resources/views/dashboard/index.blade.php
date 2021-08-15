@extends('layouts.index_master')

@section('title')
    Dashboard Sistem Informasi Pegawai
@endsection

@section('dashboard.active')
active
@endsection 

@section('content')

<div class="card">
    <h1>Welcome</h1>
    {!! QrCode::size(500)->generate('Ahay'); !!}

</div>
@endsection