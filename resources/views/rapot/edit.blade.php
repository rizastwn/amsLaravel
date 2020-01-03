@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
    <h2>Form Mengubah Nilai Akhir </h2>
    <h3>Nama : {{$siswa->nama}}</h3>
    <h3>Kelas : {{$kelas->kelas}}</h3>
    <h3>Matapelajaran : {{$nilaiRapot->mataPelajaran}} </h3>
    <h6>Tanggal mulai penilaian nilai akhir {{$info->tanggalAwal}}</h6>
    <h6>Tanggal akhir penilaian nilai akhir {{$info->tanggalAkhir}}</h6>
    </div>
    
    <div class="card-body">
        @if ( $tanggal >= $info->tanggalAwal && $tanggal <= $info->tanggalAkhir ) 
        <form action="/nilaiRapot/{{$nilaiRapot->id}}" method="POST" name="form1"  >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="usr">Nilai Pengetahuan :</label>
                <input  type="numbnr" class="form-control" min="0" max="100" name="nilaiPengetahuan" value="{{(int)$nilaiAkhirPengetahuan}}">
            </div>
            <div class="form-group">
                <label for="usr">Nilai Ketrampilan :</label>
                <input  type="numbnr" class="form-control" min="0" max="100" name="nilaiKetrampilan" value="{{(int)$nilaiAkhirKetrampilan}}">
            </div>
            <div class="form-group">
                <label for="usr">Deskripsi :</label>
                <textarea class="form-control" rows="5"  name="deskripsi" >{{$nilaiRapot->deskripsi}}</textarea>
            </div>
            <div class="form-group">
                <label for="usr">Nilai Sikap Spiritual :</label>
                <textarea class="form-control" rows="5" name="spritual" >{{$sikap->spritual}}</textarea>
            </div>
            <div class="form-group">
                <label for="usr">Nilai Sikap Sosial :</label>
                <textarea class="form-control" rows="5" name="sosial" >{{$sikap->sosial}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary" id="Submit" name="Submit">simpan nilai</button>
            <form method="post">
                <input type="hidden" name="_method" value="put" />
            </form>
        </form>
        @else 
        <h4>Maaf Penilaian nilai akhir belum pada jadwalnya!</h4>
        @endif
    </div>

</div>
    
@endsection