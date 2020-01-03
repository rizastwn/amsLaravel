@extends('layouts.app')
@section('content')
<div class="card">
    <div class=" card-header">
        <h2>Buat Standar Nilai Baru Baru</h2> 
        
    <div class="card-body">
        <form action="/standarNilai" method="POST" name="form1" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="usr">kelas :</label>
                <input type="number" class="form-control" name="kelas" value="">
            </div>
            <div class="form-group">
                <label for="usr">semester :</label>
                <select class="form-control" name="semester"  id="">
                    <option value="ganjil">ganjil</option>
                    <option value="genap">genap</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usr">Mata Pelajaran :</label>
                <input type="text" class="form-control" name="mataPelajaran" value="">
            </div>
            <div class="form-group">
                <label for="usr">Nilai Tema:</label>
                <input type="number" class="form-control" name="nilai" min="1" max="100" value="">
            </div>
            
            <button type="submit" class="btn btn-primary" id="Submit" name="Submit">simpan data siswa</button>
        </form>
    </div>

</div>
    
@endsection