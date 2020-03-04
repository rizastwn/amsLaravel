@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Membuat Rancangan Subtema Baru</h1>
        <h5>Sebelum membuat rancangan subtema diharuskan untuk mengecek mata pelajaran dan tema yang akan dibuat</h5>
    </div>
    {{-- <div class="card-body ">
        <form action="/subtema/create" method="GET" class="row">
            {{ csrf_field() }}
            <div class="form-group col-md-4">
                <label for="usr">Tema :</label>
                <select name="tema"  class="form-control" >
                    @foreach ($temaKelas as $data)
                        <option value="{{$data->tema}}">{{$data->tema}} - {{$data->judul}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="usr">Mata Pelajaran  :</label>
                <select name="mataPelajaran" class="form-control" >
                    
                    @foreach ($mataPelajaran as $item)
                    <option @if ($item->mataPelajaran == $matpel) selected @endif value="{{$item->mataPelajaran}}" >{{$item->mataPelajaran}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4" >
                <label for="usr">jenis :</label>
                <select name="jenis" class="form-control" >
                    <option @if ($jenis =='pengetahuan') selected @endif value="pengetahuan">Pengetahuan</option>
                    <option @if ($jenis =='ketrampilan') selected @endif value="ketrampilan">Ketrampilan</option>
                </select>
            </div>
            <div class="form-group col-md-4" >
                <label for="usr">Semester :</label>
                <select name="semester" class="form-control" >
                    <option @if ($semester =='ganjil') selected @endif value="ganjil">Ganjil</option>
                    <option @if ($semester =='genap') selected @endif value="genap">Genap</option>
                </select>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary" id="Submit" name="Submit">Cek Subtema</button>
            </div>
        </form>
    </div> --}}
    <div class="card-body">
        <form action="/subtema" method="POST"  >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="usr">Tema :</label>
                <select class="form-control" name="tema" id="" >
                    @foreach ($temaKelas as $item)
                        <option value="{{$item->tema}}">{{$item->tema}} - {{$item->judul}} </option>
                    @endforeach
                </select>
            </div>
            <div  class="form-group">
                <label for="usr">Semester :</label>
                <select class="form-control" name="semester" id="" >
                    <option value="ganjil">ganjil</option>
                    <option value="genap">genap</option>
                </select>
            </div>
            <div  class="form-group">
                <label for="usr">Jenis :</label>
                <select class="form-control" name="jenis" id="" >
                    <option value="pengetahuan">pengetahuan</option>
                    <option value="ketrampilan">ketrampilan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usr">Mata Pelajaran :</label>
                <select class="form-control" name="mataPelajaran" id="" >
                    @foreach ($mataPelajaran as $item)
                    <option value="{{$item->mataPelajaran}}">{{$item->mataPelajaran}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="usr">Subtema :</label>
                <select class="form-control" name="subtema" class="form-control" >
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usr">judul :</label>
                <input type="text" class="form-control" name="judul" value="">
            </div>
            <div class="form-group">
                <label for="usr">Penjelasan  subTema:</label>
                <textarea class="form-control" name="deskripsi" id="article-ckeditor" cols="30" rows="10"></textarea>
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