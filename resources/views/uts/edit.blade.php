@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Form Mengubah Nilai UTS UAS </h2>
        <h3>Nama : {{$siswa->nama}}</h3>
        <h3>Kelas : {{$kelas->kelas}}</h3>
        <h3>Matapelajaran : {{$nilai->mataPelajaran}}</h3> <br>
        <h6>Tanggal mulai penilaian UTS {{$infoUTS->tanggalAwal}}</h6>
        <h6>Tanggal akhir penilaian UTS {{$infoUTS->tanggalAkhir}}</h6> <br>
        <h6>Tanggal mulai penilaian UAS {{$infoUAS->tanggalAwal}}</h6>
        <h6>Tanggal akhir penilaian UAS {{$infoUAS->tanggalAkhir}}</h6>
    </div>
    <div class="card-body">
        
    <form action="/nilaiUtsUas/{{$nilai->id}}" method="POST" name="form1"  >
        {{ csrf_field() }}
        @if ( $tanggal >= $infoUTS->tanggalAwal && $tanggal <= $infoUTS->tanggalAkhir )  
        <div class="form-group">
            <label for="usr">Nilai UTS Pengetahuan :</label>
            <input type="numbnr" class="form-control" min="0" max="100" name="utsP" value="{{$nilai->utsP}}">
        </div>
        <div  class="form-group">
            <label for="usr">Nilai UTS Ketrampilan :</label>
            <input type="numbnr" class="form-control" min="0" max="100" name="utsK" value="{{$nilai->utsK}}">
        </div>
        <div hidden class="form-group">
            <label for="usr">Nilai UAS Pengetahuan :</label>
            <input type="numbnr" class="form-control" min="0" max="100" name="uasP" value="{{$nilai->uasP}}">
        </div>
        <div hidden class="form-group">
            <label for="usr">Nilai UAS Ketrampilan :</label>
            <input type="numbnr" class="form-control" min="0" max="100" name="uasK" value="{{$nilai->uasK}}">
        </div>

        <button type="submit" class="btn btn-primary" id="Submit" name="Submit">simpan nilai</button>
        <form method="post">
            <input type="hidden" name="_method" value="put" />
        </form>
        @elseif($tanggal >= $infoUAS->tanggalAwal && $tanggal <= $infoUAS->tanggalAkhir)
        <div hidden class="form-group">
            <label for="usr">Nilai UTS Pengetahuan :</label>
            <input type="numbnr" class="form-control" name="utsP" value="{{$nilai->utsP}}">
        </div>
        <div hidden class="form-group">
            <label for="usr">Nilai UTS Ketrampilan :</label>
            <input type="numbnr" class="form-control" name="utsK" value="{{$nilai->utsK}}">
        </div>
        <div class="form-group">
            <label for="usr">Nilai UAS Pengetahuan :</label>
            <input type="numbnr" class="form-control" name="uasP" value="{{$nilai->uasP}}">
        </div>
        <div class="form-group">
            <label for="usr">Nilai UAS Ketrampilan :</label>
            <input type="numbnr" class="form-control" name="uasK" value="{{$nilai->uasK}}">
        </div>

        <button type="submit" class="btn btn-primary" id="Submit" name="Submit">simpan nilai</button>
        <form method="post">
            <input type="hidden" name="_method" value="put" />
        </form>
        
        @endif
    </form>
    </div>
    
</div>
    
@endsection