@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Form Edit Siswa</h2>
        <h4>Nama : {{$siswa->nama}}</h4>
        <h4>Kelas : {{$siswa->kelas}}</h4>
        <h4>Status : {{$kelas->status}}</h4>
    </div>
    <div class="card-body">
        <form action="/naikKelas/{{$siswa->id}}" method="POST" name="form1" enctype="multipart/form-data" >
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="usr">Kelas Baru  :</label>
                <input type="number" min="1" max="3" class="form-control" name="kelas" value="{{$siswa->kelas}}">
                <br>
            <button type="submit" class="btn btn-primary" id="Submit" name="Submit">simpan data</button>
        
            <form method="post">
            <input type="hidden" name="_method" value="put" />
        </form>
        </form>
    </div>

</div>
    
@endsection