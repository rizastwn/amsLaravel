@extends('layouts.app')
<style>
    p{
        color: black;
    }
</style>
@section('content')
<div class="card">
    <div class="card-header">
    <h2>Deskripsi Kegiatan</h2>
    <h4>Mata Pelajaran : {{$subtema->mataPelajaran}}</h4>
    <h4>Semester :  {{$kelas->semester}}</h4>
    <h4>Tema :  {{$tema->tema}} - {{$tema->judul}}</h4>
    <h4>Subtema : {{$subtema->tema}} - {{$subtema->judul}} </h4>
    </div>
    <div class="card-body">
        
        <h5>Judul Kegiatan : {{$subtema->judul}} </h5>
        
       <p>{!! $subtema->deskripsi !!}</p>
    </div>

</div>
    
@endsection