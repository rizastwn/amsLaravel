@extends('layouts.app')
@section('content')
<div class="card">
    <div class=" card-header">
        <h2>Tambah Siswa Baru</h2> 
        
    <div class="card-body">
        <form action="/siswa" method="POST" name="form1" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="usr">Nomor Induk Siswa  :</label>
                <input type="number" class="form-control" name="nis" value="">
            </div>
            <div class="form-group">
                <label for="usr">Nama :</label>
                <input type="text" class="form-control" name="nama" value="">
            </div>
            <div class="form-group">
                <label for="usr">Tempat Lahir :</label>
                <input type="text" class="form-control" name="tempatLahir" value="">
            </div>
            <div class="form-group">
                <label for="usr">Tanggal Lahir :</label>
                <input type="date" class="form-control" name="tanggalLahir" value="">
            </div>
            <div class="form-group">
                <label for="comment">Kelas:</label>
                <input type="number" class="form-control" min="1" max="3" name="kelas" value="">
            </div>
            <div class="form-group">
                <label for="comment">Alamat :</label>
                <input type="text" class="form-control" name="alamat"  value="">
            </div>
            <div class="form-group">
                <label for="usr">Jenis Difabel :</label>
                <input type="text" class="form-control" name="difabel" value="">
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload Foto Siswa:</span>
                    </div>
                    <div class="custom-file ">
                        <input name="fotoSiswa" type="file" class="custom-file-input"
                            aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" id="Submit" name="Submit">simpan data siswa</button>
        </form>
    </div>

</div>
    
@endsection