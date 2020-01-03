@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Form Edit Siswa</h2>
    </div>
    <div class="card-body">
        <form action="/siswa/{{$siswa->id}}" method="POST" name="form1" enctype="multipart/form-data" >
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="usr">Nomor Induk Siswa  :</label>
                <input type="number" class="form-control" name="nis" value="{{$siswa->nis}}">
            </div>
            <div class="form-group">
                <label for="usr">Nama :</label>
                <input type="text" class="form-control" name="nama" value="{{$siswa->nama}}">
            </div>
            <div class="form-group">
                <label for="usr">Tempat Lahir :</label>
                <input type="text" class="form-control" name="tempatLahir" value="{{$siswa->tempatLahir}}">
            </div>
            <div class="form-group">
                <label for="usr">Tanggal Lahir :</label>
                <input type="date" class="form-control" name="tanggalLahir" value="{{$siswa->tanggalLahir}}">
            </div>
            
            <div class="form-group">
                <label for="comment">Alamat :</label>
                <input type="text" class="form-control" name="alamat"  value="{{$siswa->alamat}}">
            </div>
            <div class="form-group">
                <label for="usr">Jenis Difabel :</label>
                <input type="text" class="form-control" name="difabel" value="{{$siswa->jenisDifabel}}">
            </div>
            
            <div class="form-group" @if ($siswa->status == 'siswa') hidden @endif>
                <label for="usr">Status Siswa :</label>
                <select class="form-control" name="status" id="">
                    <option @if ($siswa->status == 'siswa') selected @endif value="siswa">siswa</option>
                    <option @if ($siswa->status == 'alumni') selected @endif value="siswa">alumni</option>
                </select>
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
            <button type="submit" class="btn btn-primary" id="Submit" name="Submit">simpan data</button>
        <form method="post">
            <input type="hidden" name="_method" value="put" />
        </form>
        </form>
    </div>

</div>
    
@endsection