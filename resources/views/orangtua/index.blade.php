@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Profil Orang Tua</h5>
        <a href="" class="btn btn-success">Ubah profil</a>        
    </div>

    <div class="row card-body ">
        <div class="col-md-4 col-sm-4">
            <img class="img-circle" style="width: 100%" src="/storage/foto/{{$orangtua->foto}}" alt="">
        </div>
        <div class="col-md-6">
            <h2>Profil Orang Tua</h2>
            <h5>Nama : </h5>
            <h5>Tempat, tanggal lahir :</h5>
            <h5>Orang Tua dari : Riza Setiawan</h5>
            <h5>Alamat : </h5>
        </div> 
    </div>

</div>
    
@endsection