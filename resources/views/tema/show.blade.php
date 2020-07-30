@extends('layouts.app')
@section('content')
<div class="card">
    <div class=" card-header">
        <h2>Daftar Nilai Tema Siswa</h2>        
        <h4>Nama : {{$siswa->nama}}</h4>
        <h4>Kelas : {{$siswa->kelas}}</h4> 
        <h4>Tahun ajaran : 2019-{{$siswa->tahunAjaran}}</h4>
        <h4>Semester : {{$siswa->semester}}</h4>
        <h4>Tema : {{$siswa->tema}} - {{$tema->judul}}</h4>
    </div>
    <div class="card-body">
        <h4>Tujuan Tema : <br> {!!$tujuanTema->isi!!}</h4>
        <h4>Nilai Sikap Spiritual : <br>{{$nilaiSikap->spiritual}}</h4>
        <h4>Nilai Sikap Sosial : <br>{{$nilaiSikap->sosial}}</h4>
        <a href="/nilaiSikap/{{$nilaiSikap->id}}/edit" class="btn btn-info">Ubah Nilai Sikap</a>
    </div>
    <div class="card-body">
        <table class="table bordered">
            <thead>
                <tr align="left">
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Subtema 1 <br> Pengetahuan</th>
                <th scope="col">Subtema 1 <br> Ketrampilan</th>
                <th scope="col">Subtema 2 <br> Pengetahuan</th>
                <th scope="col">Subtema 2 <br> Ketrampilan</th>
                <th scope="col">Subtema 3 <br> Pengetahuan</th>
                <th scope="col">Subtema 3 <br> Ketrampilan</th>
                <th scope="col">Rata-rata <br> nilai pengetahuan</th>
                <th scope="col"> Rata-rata <br> nilai ketrampilan </th>
                
                </tr>
            </thead>
            <tbody>
                @foreach ($nilai as $data)
                <tr align="left">
                    <th>{{$data->mataPelajaran}}</th>
                    <th>{{$data->p1}}</th>
                    <th>{{$data->k1}}</th>
                    <th>{{$data->p2}}</th>
                    <th>{{$data->k2}}</th>
                    <th>{{$data->p3}}</th>
                    <th>{{$data->k3}}</th>
                    <th>{{$data->pRata}}</th>
                    <th>{{$data->kRata}}</th>
                @endforeach                    
            </tbody>
        </table>
    </div>
    

</div>
    
@endsection