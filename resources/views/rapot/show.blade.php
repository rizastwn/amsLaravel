@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h2> Nilai Rapot Siswa</h2>
        <h4>Nama : {{$siswa->nama}}</h4>
        <h4>Kelas : {{$siswa->kelas}}</h4>
        <h4>Semester : {{$siswa->semester}}</h4>
        <div class=" col-md-8 row">
            <div class="col-md-6">
                <a href="/nilaiRapot/{{$siswa->id}}?semester=ganjil" class="btn btn-info">lihat nilai semester ganjil</a>
            </div>
            <div class="col-md-6">
                <a href="/nilaiRapot/{{$siswa->id}}?semester=genap" class="btn btn-info">lihat nilai semester genap</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <h4>Penilaian Sikap Sosial : </h4> <h5> {{$sikap->sosial}}</h5>
        <h4>Penilaian Sikap Spritual :</h4>  <h5> {{$sikap->spiritual}}</h5>
        <a href="/nilaiAkhirSikap/{{$sikap->id}}/edit" class="btn btn-info">Ubah Nilai Sikap</a>
    </div>
    <div class="card-body">
    <table class="table bordered">
        <thead>
            <tr align="center">
            <th scope="col">Mata Pelajaran</th>
            <th scope="col">Nilai Pengetahuan</th>
            <th scope="col">Nilai Ketrampilan </th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Menu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilai as $data)
            <tr align="center">
                <th>{{$data->mataPelajaran}}</th>
                <th>{{$data->nilaiPengetahuan}}</th>
                <th>{{$data->nilaiKetrampilan}}</th>
                <th>{{$data->deskripsi}}</th>
                <th>
                    <a href="/nilaiRapot/{{$data->id}}/edit" class="btn btn-info">Ubah Nilai </a>
                </th>
            </tr>  
            @endforeach                    
        </tbody>
    </table>
    </div>

</div>
    
@endsection