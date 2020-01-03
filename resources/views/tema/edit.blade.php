@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
    <h2>Form Mengubah Nilai Tema </h2>
    <h3>Nama : {{$siswa->nama}}</h3>
    <h3>Kelas : {{$kelas->kelas}}</h3>
    <h3>Tema : {{$nilai->tema}}</h3>
    <h3>Matapelajaran : {{$nilai->mataPelajaran}}</h3>
    <h6>Tanggal mulai penilaian nilai tema  {{$info->tanggalAwal}}</h6>
    <h6>Tanggal akhir penilaian nilai tema  {{$info->tanggalAkhir}}</h6>
    </div>
    
    <div class="card-body">
        <form action="/nilaiTema/{{$nilai->id}}" method="POST" name="form1">
            {{ csrf_field() }}
            @if ( $tanggal >= $info->tanggalAwal && $tanggal <= $info->tanggalAkhir ) 
            <div class="form-group">
                <label for="usr">Nilai Pengetahuan 1 :</label>
                <input type="number" class="form-control" name="p1" min="1" max="100"   value="{{$nilai->p1}}">
            </div>
            <div class="form-group">
                <label for="usr">Nilai Ketrampilan 1:</label>
                <input type="number" class="form-control" name="k1" min="1" max="100" value="{{$nilai->k1}}" 
            </div>
            <div class="form-group">
                <label for="usr">Nilai Pengetahuan 2 :</label>
                <input type="number" class="form-control"  name="p2" min="1" max="100" value="{{$nilai->p2}}">
            </div>
            <div class="form-group">
                <label for="usr">Nilai Ketrampilan 2:</label>
                <input type="number" class="form-control" name="k2" min="1" max="100"  value="{{$nilai->k2}}"
            </div>
            <div class="form-group">
                <label for="usr">Nilai Pengetahuan 3 :</label>
                <input type="number" class="form-control" name="p3" min="1" max="100" value="{{$nilai->p3}}">
            </div>
            <div class="form-group">
                <label for="usr">Nilai Ketrampilan 3 :</label>
                <input type="number" class="form-control" name="k3" min="1" max="100" value="{{$nilai->k3}}">
            </div>
            <div class="form-group">
                <label for="usr">Deskripsi :</label>
                <textarea name="deskripsi" class="form-control" id=""  cols="30" rows="10">{{$nilai->deskripsi}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary" id="Submit"  name="Submit">simpan nilai</button>
            <form method="post">
                <input type="hidden" name="_method" value="put" />
            </form>
            
            @else
            <h4>Maaf Penilaian tema {{$nilai->tema}} belum pada jadwalnya!</h4>
            @endif

        </form>
        
    </div>

</div>
    
@endsection