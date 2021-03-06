@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Nama Siswa : {{$siswa->nama}}</h5>
        <h5>Kelas : {{$kelas->kelas}}</h5>
        <h5>Mata Pelajaran : {{$nilaiSubtema->mataPelajaran}}</h5>
        <h5>Tema : {{$nilaiSubtema->tema}} - {{$tema->judul}} </h5>
        <h5>Subtema : {{$nilaiSubtema->subtema}}</h5>
        <a class="btn btn-info" href="/nilaiTema/{{$nilaiSubtema->id}}/edit">Ubah Nilai</a></td>
    </div>
    <div class="card-header" align="justify">
        <h5>Judul Subtema : {{$subtema->judul}}</h5>
        <h5>Nilai Subtema : {{$nilaiSubtema->nilai}}</h5>
        
        <h5>Deskripsi Penilaian : {!! $nilaiSubtema->deskripsi !!}</h5>
        <h5>Hasil Kegiatan : </h5>
        <div class="col-md-6">
            <img  style="width: 100%" src="/storage/fotoSubtema/{{$nilaiSubtema->fotoHasil}}" alt="">
        </div> <br>
        <h5> {!! $subtema->deskripsi !!}</h5>
        
    </div>

</div>
    
@endsection