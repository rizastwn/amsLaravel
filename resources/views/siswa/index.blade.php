@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Profil Siswa</h2>
    </div>
    <div class="row card-body">
            <div class="col-md-4 col-sm-4">
                <img class="img-circle" style="width: 100%" src="/storage/fotoSiswa/{{$siswa->fotoSiswa}}" alt="">
            </div>
            <div class="col-sm">
                <h5>Nama : {{$siswa->nama}}</h5>
                <h5>Tempat, tanggal lahir : {{$siswa->tempatLahir}}, {{$siswa->tanggalLahir}}</h5>
                <h5>Kelas : {{$siswa->kelas}}</h5>
                <h5>Alamat : {{$siswa->alamat}}</h5>
                <h5>Jenis Disabilitasi :{{$siswa->jenisDifabel}} </h5>
            </div>

    </div>

</div>
    
@endsection