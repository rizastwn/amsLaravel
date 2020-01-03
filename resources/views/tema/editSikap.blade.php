@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
    <h2>Form Mengubah Nilai Tema </h2>
    <h3>Nama : {{$siswa->nama}}</h3>
    <h3>Kelas : {{$kelas->kelas}}</h3>
    <h3>Tema : {{$nilai->tema}}</h3>
    
    </div>
    
    <div class="card-body">
        <form action="/nilaiSikap/{{$nilai->id}}" method="POST" name="form1">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="usr">Nilai Sikap Spritual :</label>
                <textarea name="spiritual" class="form-control" id="" cols="30" rows="10">{{$nilai->spiritual}}</textarea>
            </div>
            <div class="form-group">
                <label for="usr">Nilai Sikap Sosial :</label>
                <textarea name="sosial" class="form-control" id="" cols="30" rows="10">{{$nilai->sosial}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary" id="Submit" name="Submit">simpan nilai</button>
            <form method="post">
                <input type="hidden" name="_method" value="put" />
            </form>
        </form>
        
    </div>

</div>
    
@endsection