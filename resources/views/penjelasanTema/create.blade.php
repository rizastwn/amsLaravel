@extends('layouts.app')
@section('content')
<div class="card">
    <div class=" card-header">
        <h2>Buat Tema Baru Baru</h2> 
        
    <div class="card-body">
        <form action="/daftarTema" method="POST" name="form1" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="usr">Tema :</label>
                <input type="number" class="form-control" name="tema" value="">
            </div>
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
                <label for="usr">judul :</label>
                <input type="text" class="form-control" name="judul" value="">
            </div>
            <div class="form-group">
                <label for="usr">Tujuan Tema:</label>
                <textarea class="form-control" name="isi" id="" cols="30" rows="10"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary" id="Submit" name="Submit">simpan data siswa</button>
        </form>
    </div>

</div>
    
@endsection