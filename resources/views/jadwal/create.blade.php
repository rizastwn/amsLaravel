@extends('layouts.app')
@section('content')
<div class="card">
    <div class=" card-header">
        <h2>Buat Jadwal Akademik Baru</h2> 
        
    <div class="card-body">
        <form action="/jadwalAkademik" method="POST" name="form1" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="usr">Kelas :</label>
                <input type="number" class="form-control" name="kelas" value="">
            </div>
            <div class="form-group">
                <label for="usr">semester :</label>
                <input type="text" class="form-control" name="semester" value="">
            </div>
            <div class="form-group">
                <label for="usr">Nama Kegiatan:</label>
                <input type="text" class="form-control" name="namaKegiatan" >
            </div>
            <div class="form-group">
                <label for="usr">Jenis Kegiatan:</label>
                <input type="text" class="form-control" name="jenis" value="">
            </div>
            <div class="form-group">
                <label for="usr">Tanggal Mulai :</label>
                <input type="date" class="form-control" name="tanggalAwal" value="">
            </div>
            <div class="form-group">
                <label for="usr">Tanggal Selesai :</label>
                <input type="date" class="form-control" name="tanggalAkhir" value="">
            </div>
            <button type="submit" class="btn btn-primary" id="Submit" name="Submit">simpan data siswa</button>
        </form>
    </div>

</div>
    
@endsection