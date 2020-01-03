@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Form Tambah Wali Kelas Baru</h2>
    </div>
    <div class="card-body">
        <form action="/waliKelas" method="POST" name="form1" enctype="multipart/form-data" >
            {{ csrf_field() }}
            
            
            <div class="form-group">
                <label for="comment">email :</label>
                <input type="email" name="email"  class="form-control" alt="">
            </div>
            <div class="form-group">
                <label for="usr">Password :</label>
                <input type="password" class="form-control" name="password" value="">
            </div>
            <div class="form-group">
                <label for="usr">Nama :</label>
                <input type="text" class="form-control" name="nama" value="">
            </div>
            <div class="form-group">
                <label for="comment">Tempat Lahir:</label>
                <input type="text" class="form-control" name="tempatLahir" value="">
            </div>
            <div class="form-group">
                <label for="comment">Tanggal Lahir:</label>
                <input type="date" class="form-control" name="tanggalLahir" value="">
            </div>
            <div class="form-group">
                <label for="comment">Kelas:</label>
                <input type="text" class="form-control" name="kelas" min="1" max="3" value="">
            </div>
            <div class="form-group">
                <label for="comment">Alamat :</label>
                <input type="text" class="form-control" name="alamat"  value="">
            </div>
            
            <div class="form-group">
                <div class="input-group">
                    <div class="">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload Foto Siswa:</span>
                    </div>
                    <div class="custom-file ">
                        <input name="fotoGuru" type="file" class="custom-file-input"
                            aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" id="Submit" name="Submit">simpan perubahan</button>
        </form>
    </div>

</div>
    
@endsection