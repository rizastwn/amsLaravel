@extends('layouts.app')
@section('content')
<div class="card">
    <div class=" card-header">
        <h2>Ubah Jadwal Akademik </h2> 
        
    <div class="card-body">
        <form action="/jadwalAkademik/{{$jadwal->id}}" method="POST" name="form1" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="usr">Kelas :</label>
                <input type="number" class="form-control" name="kelas" value="{{$jadwal->kelas}}">
            </div>
            <div class="form-group">
                <label for="usr">semester :</label>
                <input type="text" class="form-control" name="semester" value="{{$jadwal->semester}}">
            </div>
            <div class="form-group">
                <label for="usr">Nama Kegiatan:</label>
                <input type="text" class="form-control" name="namaKegiatan" value="{{$jadwal->namaKegiatan}}">
            </div>
            <div class="form-group">
                <label for="usr">Jenis Kegiatan:</label>
                <input type="text" class="form-control" name="jenis" value="{{$jadwal->jenis}}">
            </div>
            <div class="form-group">
                <label for="usr">Tanggal Mulai :</label>
                <input type="date" class="form-control" name="tanggalAwal" value="{{$jadwal->tanggalAwal}}">
            </div>
            <div class="form-group">
                <label for="usr">Tanggal Selesai :</label>
                <input type="date" class="form-control" name="tanggalAkhir" value="{{$jadwal->tanggalAkhir}}">
            </div>
            <button type="submit" class="btn btn-primary" id="Submit" name="Submit">simpan jadwal</button>
            <form method="post">
                <input type="hidden" name="_method" value="put" />
            </form>
        </form>
    </div>

</div>
    
@endsection