@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Form Mengubah Data Wali Kelas</h2>
    </div>
    <div class="card-body">
        <form action="/waliKelas/{{$waliKelas->id}}" method="POST" name="form1" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="usr">Nama :</label>
                <input type="text" class="form-control" name="nama" value="{{$waliKelas->name}}">
            </div>
            <div class="form-group">
                <label for="comment">Tempat Lahir:</label>
                <input type="text" class="form-control" name="tempatLahir" value="{{$waliKelas->tempatLahir}}">
            </div>
            <div class="form-group">
                <label for="comment">Tanggal Lahir:</label>
                <input type="date" class="form-control" name="tanggalLahir" value="{{$waliKelas->tanggalLahir}}">
            </div>
            <div class="form-group">
                <label for="comment">Kelas:</label>
                <input type="text" class="form-control"min="1" max="3" name="kelas" value="{{$waliKelas->kelas}}">
            </div>
            <div class="form-group">
                <label for="comment">Alamat :</label>
                <input type="text" class="form-control" name="alamat"  value="{{$waliKelas->alamat}}">
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
            <button type="submit" class="btn btn-primary" id="Submit" name="Submit">simpan pengumuman</button>
            <form method="post">
                <input type="hidden" name="_method" value="put" />
            </form>
        </form>
    </div>

</div>
    
@endsection