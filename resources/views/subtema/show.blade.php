@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
    <h2>Deskripsi Kegiatan</h2>
    <h4>Mata Pelajaran : {{$subtema->mataPelajaran}}</h4>
    <h4>Semester :  {{$kelas->semester}}</h4>
    <h4>Tema :  {{$subtema->tema}}</h4>
    <h4>Subtema :  {{$subtema->subtema}}</h4>
    </div>
    <div class="card-body">
        <h5>Judul Kegiatan : {{$subtema->judul}} </h5>
        <h5>Deskripsi: <br>  {{$subtema->deskripsi}}</h5>
    </div>

</div>
    
@endsection