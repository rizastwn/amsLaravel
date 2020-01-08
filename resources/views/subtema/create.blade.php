@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Membuat Rancangan Tema Baru</h2>
    </div>
    <div class="card-body">
        <form action="/subtema" method="POST" name="form1"  >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="usr">Tema :</label>
                <select name="tema"  class="form-control" id="sel1">
                    <option value="1" >1</option>
                    <option value="2" >2</option>
                    <option value="3" >3</option>
                    <option value="3" >4</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usr">Subtema :</label>
                <select name="subtema" class="form-control" id="sel1">
                    <option value="1" >1</option>
                    <option value="2" >2</option>
                    <option value="3" >3</option>
                    <option value="3" >4</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usr">Mata Pelajaran :</label>
                <select name="mataPelajaran" class="form-control" id="sel1">
                    @foreach ($mataPelajaran as $item)
                    <option value="{{$item->mataPelajaran}}" >{{$item->mataPelajaran}}</option>
                    @endforeach
                    
                </select>
            </div>
            <div class="form-group">
                <label for="usr">jenis :</label>
                <select name="jenis" class="form-control" id="sel1">
                    <option value="pengetahuan">Pengetahuan</option>
                    <option value="ketrampilan">Ketrampilan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usr">judul :</label>
                <input type="text" class="form-control" name="judul" value="">
            </div>
            <div class="form-group">
                <label for="usr">Penjelasan  subTema:</label>
                <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="usr">Tanggal Mulai :</label>
                <input type="date" class="form-control" name="tanggalAwal" value="">
            </div>
            <div class="form-group">
                <label for="usr">Tanggal Selesai :</label>
                <input type="date" class="form-control" name="tanggalAkhir" value="">
            </div>
            
            <button type="submit" class="btn btn-primary" id="Submit" name="Submit">simpan data siswa</button>
        </form>
    </div>

</div>
    
@endsection