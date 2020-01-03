@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
    <h2>Daftar Nilai UTS dan UAS</h2>
    <h4>Kelas : {{$kelas->kelas}}</h4>
    <h4>Semester : {{$kelas->semester}}</h4>
    <form action="/nilaiUtsUas/lihat" method="GET"  class="form-inline" role="form">
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
        <input type="submit" class="btn btn-info" value="cari nilai">
    </form>
        
    
    <div class="card-body">
        
        <div class="col-md-10">
            <table class="table bordered">
                <thead>
                    <tr align="center">
                    <th scope="col">Mata Pelajaran</th>
                    <th scope="col">Nilai Ujian Tengah Semester</th>
                    <th scope="col">Nilai Ujian Akhir Semester</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nilai as $data)
                    <tr align="center">
                        <th>{{$data->mataPelajaran}}</th>
                        <th>{{($data->utsP+$data->utsP)/2}}</th>
                        <th>{{($data->uasP+$data->uasP)/2}}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
    
@endsection