@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Form Edit Orang Tua</h2>
    </div>
    <div class="card-body">
        <form action="/orangtua/{{$orangtua->id}}" method="POST" name="form1" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="form-group">
            <label for="usr">Email  :</label>
            <input type="email" class="form-control" name="email" value="{{$orangtua->email}}">
        </div>
        <div class="form-group">
            <label for="usr">password  :</label>
            <input type="password" class="form-control" name="password" value="{{$orangtua->password}}">
        </div>
        <div class="form-group">
            <label for="usr">Nama  :</label>
            <input type="text" class="form-control" name="nama" value="{{$orangtua->name}}">
        </div>
        <div class="form-group">
            <label for="usr">Tempat Lahir :</label>
            <input type="text" class="form-control" name="tempatLahir" value="{{$orangtua->tempatLahir}}">
        </div>
        <div class="form-group">
            <label for="usr">Tanggal Lahir :</label>
            <input type="date" class="form-control" name="tanggalLahir" value="{{$orangtua->tanggalLahir}}">
        </div>
        <div class="form-group">
            <label for="comment">Alamat :</label>
            <input type="text" class="form-control" name="alamat"  value="{{$orangtua->alamat}}">
        </div>
        <div class="form-group">
            <label for="comment">Pekerjaan :</label>
            <input type="text" class="form-control" name="pekerjaan"  value="{{$orangtua->pekerjaan}}">
        </div>
        <div class="form-group">
            <label for="comment">Status:</label>
            <select class="form-control" name="status" id="">
                <option value="aktif" @if ($orangtua->status=="aktif") selected @endif>aktif</option>
                <option value="tidak aktif" @if ($orangtua->status=="tidak aktif") selected @endif>tidak aktif</option>
            </select> 
        </div>
            
        <div class="form-group">
            <div class="input-group">
                <div class="">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload Foto:</span>
                </div>
                <div class="custom-file ">
                    <input name="foto" type="file" class="custom-file-input"
                        aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" id="Submit" name="Submit">simpan data</button>
        <form method="post">
            <input type="hidden" name="_method" value="put" />
        </form></div>
</form>

</div>
    
@endsection