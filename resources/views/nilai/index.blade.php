@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
            <h2>Standar Nilai Mata Pelajaran</h5>

            <br>
        <form action="/standarNilai/lihat" method="GET"  class="form-inline" role="form">
            <div class="form-group col-md-2">
                <label for="sel1">Kelas : </label>
                <select name="kelas"  class="form-control" id="sel1">
                    <option value="1" @if ($kelas== 1 ) selected @endif >1</option>
                    <option value="2"  @if ($kelas== 2 ) selected @endif>2</option>
                    <option value="3"  @if ($kelas== 3 ) selected @endif>3</option>
                </select>
            </div>
            <div class="form-group col-md-3" >
                <label for="sel1">Semester : </label>
                <select name="semester" class="form-control" id="sel1">
                    <option value="ganjil"  @if ($semester== 'ganjil' ) selected @endif>Ganjil</option>
                    <option value="genap"  @if ($semester== 'genap' ) selected @endif>Genap</option>
                </select>
            </div>
            <input type="submit" class="btn btn-success" value="Lihat Jadwal">
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
            <tbody>
                @foreach ($nilai as $data)
                <tr align="justify">
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