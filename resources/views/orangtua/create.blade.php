@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Form Tambah Orang Tua Baru</h2>
    <div class="card-body">
        <form action="/orangtua" method="POST" name="form1" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="comment">Nama Siswa :</label>
                <select  class="form-control" name="idSiswa"  id="">
                    <option>pilih siswa</option>
                    @foreach ($siswa as $data)
                    <option value="{{$data->id}}">{{$data->nama}}</option>
                    @endforeach
                </select>
                
            </div>
            <h2>Form biodata ayah</h2>
            <div class="form-group">
                <label for="comment">email :</label>
                <input type="email" class="form-control" name="emailAyah" value="">
            </div>
            <div class="form-group">
                <label for="comment">password :</label>
                <input type="password" class="form-control" name="passwordAyah" value="">
            </div>
            <div class="form-group">
                <label for="usr">Nama Ayah :</label>
                <input type="text" class="form-control" name="namaAyah" value="">
            </div>
            <div class="form-group">
                <label for="usr">Tempat Lahir Ayah:</label>
                <input type="text" class="form-control" name="tempatLahirAyah" value="">
            </div>
            <div class="form-group">
                <label for="usr">Tanggal Lahir Ayah:</label>
                <input type="date" class="form-control" name="tanggalLahirAyah" value="">
            </div>
            <div class="form-group">
                <label for="comment">Alamat Ayah:</label>
                <input type="text" class="form-control" name="alamatAyah"  value="">
            </div>
            <div class="form-group">
                <label for="comment">Pekerjaan Ayah:</label>
                <input type="text" class="form-control" name="pekerjaanAyah"  value="">
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload Foto Ayah:</span>
                    </div>
                    <div class="custom-file ">
                        <input name="fotoAyah" type="file" class="custom-file-input"
                            aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
                    </div>
                </div>
            </div>
<br>
            <h2>Form Biodata Ibu</h2>
            <div class="form-group">
                <label for="comment">email :</label>
                <input type="email" class="form-control" name="emailIbu" value="">
            </div>
            <div class="form-group">
                <label for="comment">password :</label>
                <input type="password" class="form-control" name="passwordIbu" value="">
            </div>
            <div class="form-group">
                <label for="comment">Nama Ibu :</label>
                <input type="text" class="form-control" name="namaIbu" value="">
            </div>
            <div class="form-group">
                <label for="usr">Tempat lahir Ibu:</label>
                <input type="text" class="form-control" name="tempatLahirIbu" value="">
            </div>
            <div class="form-group">
                <label for="usr">Tanggal Lahir Ibu:</label>
                <input type="date" class="form-control" name="tanggalLahirIbu" value="">
            </div>
            <div class="form-group">
                <label for="comment">Alamat ibu :</label>
                <input type="text" class="form-control" name="alamatIbu"  value="">
            </div>
            <div class="form-group">
                <label for="comment">Pekerjaan Ibu:</label>
                <input type="text" class="form-control" name="pekerjaanIbu"  value="">
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload Foto Ibu:</span>
                    </div>
                    <div class="custom-file ">
                        <input name="fotoIbu" type="file" class="custom-file-input"
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