@extends('layouts.app')
@section('content')
<div class="card">
    <div class=" card-header">
        <h2>Ubah Penjelasan tema </h2> 
        
    <div class="card-body">
        <form action="/daftarTema/{{$tema->id}}" method="POST" name="form1" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="usr">Tema :</label>
                <input type="number" class="form-control" name="tema" value="{{$tema->tema}}">
            </div>
            <div class="form-group">
                <label for="usr">kelas :</label>
                <input type="number" class="form-control" name="kelas" value="{{$tema->kelas}}">
            </div>
            <div class="form-group">
                <label for="usr">semester :</label>
                <select class="form-control" name="semester"  id="">
                    <option value="ganjil" @if ($tema->semester == 'ganjil') selected @endif>ganjil</option>
                    <option value="genap" @if ($tema->semester == 'genap') selected @endif>genap</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usr">judul :</label>
                <input type="text" class="form-control" name="judul" value="{{$tema->judul}}">
            </div>
            <div class="form-group">
                <label for="usr">Tujuan Tema:</label>
                <textarea class="form-control" name="isi" id="article-ckeditor" cols="30" rows="10">{{$tema->isi}}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary" id="Submit" name="Submit">simpan jadwal</button>
            <form method="post">
                <input type="hidden" name="_method" value="put" />
            </form>
        </form>
    </div>

</div>
    
@endsection