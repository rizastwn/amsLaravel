@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
    <h2>Biodata Wali Kelas</h2>
    </div>
    <div class="row card-body">
        <div class="col-md-4 col-sm-4">
            <img class="img-circle" style="width: 100%" src="/storage/fotoGuru/{{$waliKelas->foto}}" alt="">
        </div>
        <div class="col-sm">
            <h5>Nama : {{$waliKelas->name}}</h5>
            <h5>Tempat, tanggal lahir : {{$waliKelas->tempatLahir}}, {{$waliKelas->tanggalLahir}}</h5>
            <h5>Kelas yang diampu : {{$waliKelas->kelas}}</h5>
            <h5>Alamat : {{$waliKelas->alamat}}</h5>
            <a href="/waliKelas/{{$waliKelas->id}}/edit" class="btn btn-info">Ubah Profil Wali Kelas</a>
        </div>
    </div>

</div>
    
@endsection