@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Membuat Rancangan Subtema Baru</h1>
        <h5>Sebelum membuat rancangan subtema diharuskan untuk mencari mata pelajaran dan tema yang akan dibuat</h5>
    </div>
    <div class="card-body ">
        <form action="/subtema/create" method="GET" class="row">
            {{ csrf_field() }}
            <div class="form-group col-md-3">
                <label for="usr">Tema :</label>
                <select name="tema"  class="form-control" >
                    <option value="1" >1</option>
                    <option value="2" >2</option>
                    <option value="3" >3</option>
                    <option value="3" >4</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="usr">Mata Pelajaran :</label>
                <select name="mataPelajaran" class="form-control" >
                    @foreach ($mataPelajaran as $item)
                    <option value="{{$item->mataPelajaran}}" >{{$item->mataPelajaran}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3" >
                <label for="usr">jenis :</label>
                <select name="jenis" class="form-control" >
                    <option value="pengetahuan">Pengetahuan</option>
                    <option value="ketrampilan">Ketrampilan</option>
                </select>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary" id="Submit" name="Submit">Cari Data Tema</button>
            </div>
        </form>
    </div>
    

</div>
    
@endsection