@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
    <h2>Form Mengubah Nilai Akhir </h2>
    <h3>Nama : {{$siswa->nama}}</h3>
    <h3>Kelas : {{$siswa->kelas}}</h3>
    </div>
    
    <div class="card-body">
        <form action="/nilaiAkhirSikap/{{$nilai->id}}" method="POST" name="form1"  >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="usr">Nilai Sikap Spiritual :</label>
                <textarea class="form-control" rows="5" name="spritual" >{{$nilai->spritual}}</textarea>
            </div>
            <div class="form-group">
                <label for="usr">Nilai Sikap Sosial :</label>
                <textarea class="form-control" rows="5" name="sosial" >{{$nilai->sosial}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary" id="Submit" name="Submit">simpan nilai</button>
            <form method="post">
                <input type="hidden" name="_method" value="put" />
            </form>
        </form>
        
    </div>

</div>
    
@endsection