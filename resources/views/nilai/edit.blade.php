@extends('layouts.app')
@section('content')
<div class="card">
    <div class=" card-header">
        <h2>Ubah Standar Nilai </h2> 
        
    <div class="card-body">
        <form action="/daftarnilai/{{$nilai->id}}" method="POST" name="form1" enctype="multipart/form-data" >
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="usr">kelas :</label>
                <input type="number" class="form-control" name="kelas" value="{{$nilai->kelas}}">
            </div>
            <div class="form-group">
                <label for="usr">semester :</label>
                <select class="form-control" name="semester"  id="">
                    <option value="ganjil" @if ($nilai->semester == 'ganjil') selected @endif>ganjil</option>
                    <option value="genap" @if ($nilai->semester == 'genap') selected @endif>genap</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usr">Mata Pelajaran :</label>
                <input type="text" class="form-control" min="0" max="100" name="judul" value="{{$nilai->mataPelajaran}}">
            </div>
            <div class="form-group">
                <label for="usr">Nilai:</label>
                <input type="number" class="form-control" min="0" max="100" name="kelas" value="{{$nilai->nilai}}">
            </div>
            
            <button type="submit" class="btn btn-primary" id="Submit" name="Submit">simpan jadwal</button>
            <form method="post">
                <input type="hidden" name="_method" value="put" />
            </form>
        </form>
    </div>

</div>
    
@endsection