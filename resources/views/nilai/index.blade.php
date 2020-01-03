@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
            <h2>Standar Nilai Mata Pelajaran</h5>
            <h4>Kelas : {{$infonilai->kelas}}</h4>
            <h4>Semester : {{$infonilai->semester}}</h4>
            <br>
        <form action="/standarNilai/lihat" method="GET"  class="form-inline" role="form">
            <div class="form-group col-md-2">
                <label for="sel1">Kelas : </label>
                <select name="kelas"  class="form-control" id="sel1">
                    <option value="1" >1</option>
                    <option value="2">2</option>
                    <option value="3" >3</option>
                </select>
            </div>
            <div class="form-group col-md-3" >
                <label for="sel1">Semester : </label>
                <select name="semester" class="form-control" id="sel1">
                    <option value="ganjil">Ganjil</option>
                    <option value="genap">Genap</option>
                </select>
            </div>
            <input type="submit" class="btn btn-success" value="cari jadwal">
            <div class="col-md-3">
                <a href="/standarNilai/create" class="btn btn-info">buat jadwal baru</a>
            </div>
        </form>
    </div>

    <div class="row card-body ">
        <table class="table bordered">
            <thead>
                <tr align="center">
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Nilai</th>  
                <th scope="col">Menu</th>  
                </tr>
            </thead>
            <tbody >
                @foreach ($nilai as $data)
                <tr align="center">
                    <td>{{$data->mataPelajaran}}</td>
                    <td>{{$data->nilai}}</td>
                    
                    <td>
                        <form action="{{action('nilaiController@destroy', $data['id'])}}" method="post">
                            @csrf
                            <a href="/standarNilai/{{$data->id}}/edit" class="btn btn-info">ubah nilai</a>
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Hapus</button>
                          </form>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    
@endsection