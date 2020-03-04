@extends('layouts.app')
@section('content')
<div class="card">
    <div class=" card-header">
        <h2>Daftar Nilai Tema Siswa</h2>        
        <h4>Nama : {{$siswa->nama}}</h4>
        <h4>Kelas : {{$siswa->kelas}}</h4> 
        <h4>Tahun ajaran : {{$siswa->tahunAjaran}}</h4>
        <h4>Semester : {{$siswa->semester}}</h4>
        <h4>Tema : {{$siswa->tema}}</h4>
    </div>
    <div class="card-body">
        <h4>Nilai Sikap Spiritual : <br>{{$nilaiSikap->spiritual}}</h4>
        <h4>Nilai Sikap Sosial : <br>{{$nilaiSikap->sosial}}</h4>
        <a href="/nilaiSikap/{{$nilaiSikap->id}}/edit" class="btn btn-info">Ubah Nilai Sikap</a>
    </div>
    <div class="card-body">
        <table class="table bordered">
            <thead>
                <tr align="justify">
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">P1</th>
                <th scope="col">K1</th>
                <th scope="col">P2</th>
                <th scope="col">K2</th>
                <th scope="col">P3</th>
                <th scope="col">K3</th>
                <th scope="col">Rata-rata nilai pengetahuan</th>
                <th scope="col">Rata-rata nilai ketrampilan </th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Menu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilai as $data)
                <tr align="justify">
                    <th>{{$data->mataPelajaran}}</th>
                    <th>{{$data->p1}}</th>
                    <th>{{$data->k1}}</th>
                    <th>{{$data->p2}}</th>
                    <th>{{$data->k2}}</th>
                    <th>{{$data->p3}}</th>
                    <th>{{$data->k3}}</th>
                    <th>{{$data->pRata}}</th>
                    <th>{{$data->kRata}}</th>
                   <th>{{$data->deskripsi}}</th>
                    <th>
                        <a href="/nilaiTema/{{$data->id}}/edit" class="btn btn-info">Ubah Nilai </a>
                    </th>
                </tr>  
                @endforeach                    
            </tbody>
        </table>
    </div>
    

</div>
    
@endsection