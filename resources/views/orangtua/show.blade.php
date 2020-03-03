@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Profil Orang Tua</h2>
    </div>
    <div class="row card-body">
        <div class="col-md-4 col-sm-4">
            
            <img class="img-circle" style="width: 100%" src="/storage/foto/{{$orangtua->foto}}" alt="">
        </div>
        <div class="col-sm">
            <h5>Nama : {{$orangtua->name}}</h5>
            <h5>Tempat, tanggal lahir : {{$orangtua->tempatLahir}}, {{$orangtua->tanggalLahir}}</h5>
            <h5>Pekerjaan : {{$orangtua->pekerjaan}}</h5>
            <h5>Alamat : {{$orangtua->alamat}}</h5>            
            <a href="/orangtua/{{$orangtua->id}}/edit" class="btn btn-info">Ubah Profil </a>
        </div>

    </div>

</div>

@endsection