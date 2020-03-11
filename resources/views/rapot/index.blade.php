@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
    <h2>Daftar Rapot</h2>
    <h4>Kelas : {{$kelas->kelas}}</h4>
    <h4>Semester : {{$kelas->semester}}</h4>
    
    <form action="/nilaiRapot/lihat" method="GET"  class="form-inline" role="form">
        <div class="form-group col-md-2">
            <label for="sel1">Kelas : </label>
            <select name="kelas"  class="form-control" id="sel1">
                @foreach ($kelasSiswa as $data)
                <option @if ($data->kelas == $kelas->kelas) selected @endif value="{{$data->kelas}}" >{{$data->kelas}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-3" >
            <label for="sel1">Semester : </label>
            <select name="semester" class="form-control" id="sel1">
                <option value="ganjil">Ganjil</option>
                <option value="genap">Genap</option>
            </select>
        </div>
        <input type="submit" class="btn btn-info" value="cari nilai">
    </form>
    
    <div class="card-body">
        
        <table class="table bordered">
                <thead>
                    <tr align="center">
                    <th scope="col">Mata Pelajaran</th>
                    <th scope="col">Pengetahuan</th>
                    <th scope="col">Ketrampilan</th>
                    <th scope="col">Sikap</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($nilai as $item)
                    <tr align="left">
                        <th>{{$item->mataPelajaran}}</th>
                        <th>{{$item->nilaiKetrampilan}}</th>
                        <th>{{$item->nilaiPengetahuan}}</th>
                        <th>{{$item->deskripsi}}</th>
                    </tr>
                    @endforeach
                    
                    
                </tbody>
            </table>
    </div>

</div>
    
@endsection